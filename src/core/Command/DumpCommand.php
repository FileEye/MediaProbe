<?php

namespace FileEye\ImageProbe\core\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\Image;
use FileEye\ImageProbe\core\Collection;
use FileEye\ImageProbe\core\Block\BlockBase;
use FileEye\ImageProbe\core\Block\Exif;
use FileEye\ImageProbe\core\Block\Jpeg;
use FileEye\ImageProbe\core\Block\Ifd;
use FileEye\ImageProbe\core\Block\Tag;
use FileEye\ImageProbe\core\Block\Tiff;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * A Symfony application command to dump images metadata.
 */
class DumpCommand extends Command
{
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
            $output->writeln($file);
            $yaml = $this->fileToDump($file);
            // $output->write($yaml);
            $fs->dumpFile((string) $file . '.dump.yml', $yaml);
        }

        return(0);
    }

    protected function fileToDump($file)
    {
        $yaml = [];

        $image = Image::createFromFile((string) $file);
        $yaml['fileName'] = $file->getBaseName();
        $yaml['mimeType'] = $image->getMimeType();
        $yaml['fileContentHash'] = hash('sha256', $file->getContents());
        $yaml['gdInfo'] = @getimagesize((string) $file);
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

        // Cleanup garbage explicitly, otherwise we may incur in memory
        // issues.
        $image = null;
        gc_collect_cycles();

        return Yaml::dump($yaml, 40);
    }
}
