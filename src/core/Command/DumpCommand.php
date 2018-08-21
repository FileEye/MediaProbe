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
            // $output->write($yaml);
            $fs->dumpFile((string) $file . '.dump.yml', $yaml);
        }
    }

    protected function fileToDump($file)
    {
        $yaml = [];

        $image = Image::loadFromFile((string) $file);
        $yaml['fileName'] = $file->getBaseName();
        $yaml['mimeType'] = $image->getMimeType();
        $yaml['elements'] = $image->toDumpArray();
        $yaml['log'] = [];
        foreach (['ERROR', 'WARNING', 'NOTICE'] as $level) {
            foreach ($image->dumpLog($level) as $record) {
                $yaml['log'][$level][] = [
                    'path' => isset($record['context']['path']) ? $record['context']['path'] : '*** missing ***',
                    'message' => $record['message'],
                ];
            }
        }
        return Yaml::dump($yaml, 40);
    }
}
