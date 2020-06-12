<?php

namespace FileEye\MediaProbe\Command;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Block\Exif;
use FileEye\MediaProbe\Block\Ifd;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\MediaProbe;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Process\Process;
use Symfony\Component\Yaml\Yaml;

/**
 * A Symfony application command to dump media metadata.
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
            ->setDescription('Dump media file information.')
            ->addArgument(
                'file-path',
                InputArgument::REQUIRED,
                'Path to the media file'
            )
            ->addOption(
                'exiftool',
                null,
                InputOption::VALUE_NONE,
                'Dump via exiftool.'
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
            $output->write('Processing ' . $file . '... ');

            $test_dump_file = (string) $file . '.test-dump.yml';
            $input_yaml = Yaml::parse(file_get_contents($test_dump_file));

            // Dump via MediaProbe.
            $output->write('1');
            $yaml = $this->fileToTestDumpArray($file);

            if ($input->getOption('exiftool')) {
                // Dump via Exiftool.
                $output->write('2');
                $process = new Process(['exiftool', (string) $file, '-X', '-t', '-D']);
                try {
                    $process->run();
                    $yaml['exiftool'] = $process->getOutput();
                } catch (\Exception $e) {
                    $output->write(' error: ' . $e->getMessage());
                }

                $output->write('3');
                $process = new Process(['exiftool', (string) $file, '-X', '-t', '-D', '-n']);
                try {
                    $process->run();
                    $yaml['exiftool_raw'] = $process->getOutput();
                } catch (\Exception $e) {
                    $output->write(' error: ' . $e->getMessage());
                }
            }

            // Prepare output.
            $output_yaml = [];
            if (isset($input_yaml['skip'])) {
                $output_yaml['skip'] = $input_yaml['skip'];
            }
            $output_yaml = array_merge($output_yaml, $yaml);

            $fs->dumpFile($test_dump_file, Yaml::dump($output_yaml, 40));
            $output->writeln(' done.');
        }

        return(0);
    }

    protected function fileToTestDumpArray($file): array
    {
        $yaml = [];

        $media = Media::createFromFile((string) $file);
        $yaml['fileName'] = $file->getBaseName();
        $yaml['mimeType'] = $media->getMimeType();
        $yaml['fileContentHash'] = hash('sha256', $file->getContents());
        $yaml['elements'] = $media->toDumpArray();
        $yaml['log'] = [];
        foreach (['ERROR', 'WARNING', 'NOTICE'] as $level) {
            foreach ($media->dumpLog($level) as $record) {
                $yaml['log'][$level][] = [
                    'path' => isset($record['context']['path']) ? $record['context']['path'] : '*** missing ***',
                    'message' => $record['message'],
                ];
            }
        }
        $yaml['gdInfo'] = @getimagesize((string) $file);
        $yaml['exifReadData'] = @exif_read_data((string) $file);

        // Cleanup garbage explicitly, otherwise we may incur in memory issues.
        $media = null;
        gc_collect_cycles();

        return $yaml;
    }
}
