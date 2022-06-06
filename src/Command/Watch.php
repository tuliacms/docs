<?php

declare(strict_types=1);

namespace Tulia\Docs\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Spatie\Watcher\Watch as SpatieWatcher;
use Tulia\Docs\Service\Generator;

/**
 * @author Adam Banaszkiewicz
 */
#[AsCommand(name: 'docs:watch')]
final class Watch extends Command
{
    public function __construct(
        private string $docSourceDir,
        private Generator $generator
    ) {
        parent::__construct(null);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Start listening...');

        $this->generate($output);

        SpatieWatcher::path($this->docSourceDir)
            ->onAnyChange(function () use ($output) {
                $this->generate($output);
            })
            ->start();

        return Command::SUCCESS;
    }

    private function generate(OutputInterface $output): void
    {
        $this->generator->generate();
        $date = (new \DateTime)->format('Y-m-d H:i:s');
        $output->writeln("[$date] Regenerated...");
    }
}
