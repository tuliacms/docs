<?php

declare(strict_types=1);

namespace Tulia\Docs\Command;

use Doctrine\RST\Builder;
use Doctrine\RST\Configuration;
use Doctrine\RST\Kernel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

/**
 * @author Adam Banaszkiewicz
 */
#[AsCommand(name: 'docs:generate')]
final class Generate extends Command
{
    public function __construct(
        private bool $environment,
        private string $projectDir
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->text('Compiling all docs...');

        $configuration = new Configuration();
        $configuration->setCustomTemplateDirs([
            $this->projectDir . '/templates/documentation-templates'
        ]);
        $configuration->setTheme('default');

        $kernel = new Kernel($configuration);
        $builder = new Builder($kernel);
        $builder->build($this->projectDir.'/content', $this->projectDir.'/output');

        $finder = new Finder();
        $finder->files()
            ->in($this->projectDir.'/content')
            ->name('toc.txt');

        $fs = new Filesystem();

        foreach ($finder as $file) {
            $fs->copy(
                $file->getPathname(),
                str_replace($this->projectDir.'/content', $this->projectDir.'/output', $file->getPathname()),
                true
            );
        }

        return Command::SUCCESS;
    }
}
