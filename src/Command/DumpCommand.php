<?php

namespace FileEye\MediaProbe\Command;

use FileEye\MediaProbe\Block\Jpeg\Exif;
use FileEye\MediaProbe\Block\Tiff\Ifd;
use FileEye\MediaProbe\Block\Jpeg\Jpeg;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Dumper\DefaultDumper;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Model\BlockBase;
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
                'Path to the media file(s)'
            )
            ->addArgument(
                'dump-path',
                InputArgument::REQUIRED,
                'Path to the media dump(s)'
            )
            ->addOption(
                'exiftool',
                null,
                InputOption::VALUE_NONE,
                'Dump exiftool XML results too.'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $sourcePath = $input->getArgument('file-path');
        $dumpPath = $input->getArgument('dump-path');

        $fs = new Filesystem();

        $finder = new Finder();
        $finder->files()->in($sourcePath)->name('*');

        foreach ($finder as $file) {
            $output->write('Processing ' . $file . '... ');

            $dumpFilePrefix = $dumpPath . '/' . $file->getRelativePathName();
            $input_yaml = Yaml::parse(@file_get_contents($dumpFilePrefix . '.dump.yml'));

            // Dump via MediaProbe.
            $output->write('1');
            try {
                $yaml = $this->fileToTestDumpArray($file);
            } catch (\Exception $e) {
                $output->writeln(' error: ' . $e->getMessage());
                continue;
            }

            if ($input->getOption('exiftool')) {
                // Dump via Exiftool.
                $output->write('2');
                $process = new Process(['exiftool', (string) $file, '-X', '-t', '-D']);
                try {
                    $process->run();
                    $fs->dumpFile($dumpFilePrefix . '.exiftool.xml', $process->getOutput());
                } catch (\Exception $e) {
                    $output->write(' error: ' . $e->getMessage());
                }

                $output->write('3');
                $process = new Process(['exiftool', (string) $file, '-X', '-t', '-D', '-n']);
                try {
                    $process->run();
                    $fs->dumpFile($dumpFilePrefix . '.exiftool-raw.xml', $process->getOutput());
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

            $fs->dumpFile($dumpFilePrefix . '.dump.yml', Yaml::dump($output_yaml, 40));
            $output->writeln(' done.');
        }

        return(0);
    }

    protected function fileToTestDumpArray($file): array
    {
        $yaml = [];

        $media = Media::parseFromFile((string) $file);
        $yaml['fileName'] = $file->getBaseName();
        $yaml['mimeType'] = $media->getMimeType();
        $yaml['fileContentHash'] = hash('sha256', $file->getContents());
        $yaml['elements'] = $media->asArray(new DefaultDumper());
        $yaml['log'] = [];
        foreach (['ERROR', 'WARNING', 'NOTICE', 'INFO'] as $level) {
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
