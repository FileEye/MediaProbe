<?php

namespace ExifEye\core\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Spec;
use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Entry\JpegContent;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * A Symfony application command to dump images metadata.
 */
class DumpCommand extends Command
{
    /** @var string */
    private $filePath;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('dump')
            ->setDescription('Dump image information.')
            ->addArgument(
                'file-path',
                InputArgument::REQUIRED,
                'Path to the image file'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fs = new Filesystem();

        $finder = new Finder();
        $finder->files()->in($input->getArgument('file-path'))->name('*.jpg')->name('*.JPG')->notName('*-thumb*');

        foreach ($finder as $file) {
            ExifEye::clearLogger();
            $yaml = $this->fileToTest($file);
            $output->write($yaml);
            $fs->dumpFile((string) $file . '.test.yml', $yaml);
        }
    }

    protected function fileToTest($file)
    {
        $basename = substr($file, 0, - strlen(strrchr($file, '.')));
        $thumb_filename = $basename . '-thumb.jpg';
        $test_filename = $basename . '.php';
        $test_name = str_replace('-', '_', $basename);
        $indent = 0;
        $json = [];

        $jpeg = new Jpeg((string) $file);
        $json['jpeg'] = $file->getBaseName();
        $this->jpegToTest('$jpeg', $jpeg, $json);

/*        foreach (ExifEye::logger()->getHandlers() as $handler) {
            if ($handler instanceof Monolog\Handler\TestHandler) {
                dump($handler->getRecords());
                $json['log'] = $handler->getRecords();
                break;
            }
        }*/
        $handler = ExifEye::logger()->getHandlers()[0];
        $json['errors'] = [];
        $json['warnings'] = [];
        foreach ($handler->getRecords() as $record) {
            switch ($record['level_name']) {
                case 'WARNING':
                    $key = 'warnings';
                    break;
                case 'ERROR':
                    $key = 'errors';
                    break;
                default:
                    continue;
            }
            $json[$key][] = [
                'message' => $record['message'],
            ];
        }

        return Yaml::dump($json, 20);
    }

    protected function jpegToTest($name, Jpeg $jpeg, &$json)
    {
        $exif = $jpeg->getExif();
        if ($exif == null) {
            $json['blocks'] = [];
        } else {
            $this->exifToTest('$exif', $exif, $json);
        }
    }

    protected function exifToTest($name, $content, &$json)
    {
        if ($content instanceof Exif) {
            $tiff = $content->getTiff();
            if ($tiff instanceof Tiff) {
                $this->tiffToTest('$tiff', $tiff, $json);
            } else {
                $json['blocks'] = [];
            }
        }
    }

    protected function tiffToTest($name, Tiff $tiff, &$json)
    {
        $ifd = $tiff->getIfd();
        if ($ifd instanceof Ifd) {
            $json['blocks'][$ifd->getName()]['class'] = get_class($ifd);
            $this->ifdToTest('$ifd', 0, $ifd, $json['blocks'][$ifd->getName()]);
            $n = 1;
            while ($ifd = $ifd->getNextIfd()) {
                $json['blocks'][$ifd->getName()]['class'] = get_class($ifd);
                $this->ifdToTest('$ifd', $n, $ifd, $json['blocks'][$ifd->getName()]);
                $n ++;
            }
        } else {
            $json['blocks'][$ifd->getName()] = [];
        }
    }

    protected function ifdToTest($name, $number, Ifd $ifd, &$json)
    {
        $tags = $ifd->xxGetSubBlocks();
        foreach ($tags as $tag) {
            $this->tagToTest('$tag', $tag, $ifd, $json);
        }
        $sub_ifds = $ifd->getSubIfds();
        $n = 0;
        foreach ($sub_ifds as $type => $sub_ifd) {
            $json['blocks'][$sub_ifd->getName()]['class'] = get_class($sub_ifd);
            $this->ifdToTest('$ifd', $n, $sub_ifd, $json['blocks'][$sub_ifd->getName()]);
            $n ++;
        }
/*        $n = 1;
        while ($ifd = $ifd->getNextIfd()) {
            $json['blocks'][$ifd->getName()]['class'] = get_class($ifd);
            $this->ifdToTest('$ifd', $n, $ifd, $json['blocks'][$ifd->getName()]);
            $n ++;
        }*/
    }

    protected function tagToTest($name, Tag $tag, Ifd $ifd, &$json)
    {
        $ifd_type = $ifd->getId();

        $tag_id = $tag->getId();
        $tag_name = $tag->getName();
        $entry = $tag->getEntry();

        $json['tags'][] = [
            'id' => $tag_id,
            'name' => $tag_name,
            'entry' => [
                'class' => get_class($entry),
                'format' => Format::getName($entry->getFormat()),
                'components' => $entry->getComponents(),
                'value' => base64_encode(serialize($tag->getEntry()->getValue())),
                'clear_value' => serialize($tag->getEntry()->getValue()),
                'text' => $tag->getEntry()->toString(),
            ],
        ];
    }
}
