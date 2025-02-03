<?php

namespace FileEye\MediaProbe\Command;

use FileEye\MediaProbe\Utility\SpecCompiler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * A Symfony application command to compile the MediaProbe specification YAML files.
 */
class CompileCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('compile')
            ->setDescription('Converts the MediaProbe specification YAML files into a spec.php file.')
            ->addArgument(
                'spec-dir',
                InputArgument::OPTIONAL,
                'Path to the directory of the .yaml specification files'
            )
            ->addArgument(
                'resource-dir',
                InputArgument::OPTIONAL,
                'Path to the directory of the mapper class file'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $compiler = new SpecCompiler();
        $compiler->compile($input->getArgument('spec-dir'), $input->getArgument('resource-dir'));
        $output->writeln('Compile OK');
        return(0);
    }
}
