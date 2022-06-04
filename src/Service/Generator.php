<?php

declare(strict_types=1);

namespace Tulia\Docs\Service;

use Doctrine\RST\Builder;
use Doctrine\RST\Configuration;
use Doctrine\RST\Kernel;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

/**
 * @author Adam Banaszkiewicz
 */
final class Generator
{
    public function __construct(
        private bool $environment,
        private string $projectDir
    ) {
    }

    public function generate(): void
    {
        $fs = new Filesystem();
        $fs->remove($this->projectDir.'/output');

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
    }
}
