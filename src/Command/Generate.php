<?php

declare(strict_types=1);

namespace Tulia\Docs\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Style\SymfonyStyle;
use Tulia\Docs\Service\Generator;

/**
 * @author Adam Banaszkiewicz
 */
#[AsCommand(name: 'docs:generate')]
final class Generate extends Command
{
    public function __construct(
        private Generator $generator
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->text('Generating all docs...');

        $this->generator->generate();

        $io->text('Documentation generated successfully.');

        return Command::SUCCESS;
    }
}
