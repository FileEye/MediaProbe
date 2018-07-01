<?php

namespace ExifEye\core\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Image;
use ExifEye\core\Format;
use ExifEye\core\Spec;
use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
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
        $finder->files()->in($input->getArgument('file-path'))->name('*.jpg')->name('*.JPG')->name('*.tiff');

        foreach ($finder as $file) {
            $yaml = $this->fileToDump($file);
            $output->write($yaml);
            $fs->dumpFile((string) $file . '.dump.yml', $yaml);
        }
    }

    protected function fileToDump($file)
    {
        $basename = substr($file, 0, - strlen(strrchr($file, '.')));
        $indent = 0;
        $json = [];

        $image = Image::loadFromFile((string) $file);
        $json['fileName'] = $file->getBaseName();
        $json['mimeType'] = $image->getMimeType();
        $json['elements'] = $image->getElement("*")->toDumpArray();

        $json['errors'] = [];
        $json['warnings'] = [];
        $json['notices'] = [];
        foreach ($image->dumpLog() as $log_levels) {
            foreach ($log_levels as $record) {
                switch ($record['level_name']) {
                    case 'NOTICE':
                        $key = 'notices';
                        break;
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
                    'path' => isset($record['context']['path']) ? $record['context']['path'] : '*** missing ***',
                    'message' => $record['message'],
                ];
            }
        }

        return Yaml::dump($json, 40);
    }
}
