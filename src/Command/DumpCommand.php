<?php

namespace ExifEye\core\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Spec;
use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Entry\JpegContent;
use ExifEye\core\Entry\EntryBase;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tiff;
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
        $finder = new Finder();
        $finder->files()->in($input->getArgument('file-path'))->name('*.jpg')->name('*.JPG');

        foreach ($finder as $file) {
            ExifEye::clearExceptions();
            $yaml = $this->fileToTest($file);
            $output->write($yaml);
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
        $exceptions = ExifEye::getExceptions();
        if (count($exceptions) == 0) {
            $json['errors'] = [];
        } else {
            for ($i = 0; $i < count($exceptions); $i ++) {
                $json['errors']['entries'][$i]['class'] = get_class($exceptions[$i]);
                $json['errors']['entries'][$i]['message'] = $exceptions[$i]->getMessage();
            }
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
        $entries = $ifd->getEntries();
        foreach ($entries as $tag => $entry) {
            $this->entryToTest('$entry', $entry, $ifd, $json);
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

    protected function entryToTest($name, EntryBase $entry, Ifd $ifd, &$json)
    {
        $ifd_type = $ifd->getType();

        $tag_name = Spec::getTagName($ifd_type, $entry->getId());
        $tag_name = $tag_name ?: '[[[' . $entry->getId() . ']]]';

        $json['entries'][$tag_name]['class'] = get_class($entry);
        $json['entries'][$tag_name]['value'] = serialize($entry->getValue());
        $json['entries'][$tag_name]['text'] = $entry->getText();
    }
}
