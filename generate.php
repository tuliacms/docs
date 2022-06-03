#!/usr/bin/env php
<?php
require __DIR__.'/vendor/autoload.php';

use Doctrine\RST\Builder;
use Doctrine\RST\Configuration;
use Doctrine\RST\Kernel;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

(new Application('Tulia Docs Compiler', '1.0'))
    ->register('compile')
    ->setCode(function(InputInterface $input, OutputInterface $output) {
        $io = new SymfonyStyle($input, $output);
        $io->text('Compiling all docs...');

        $configuration = new Configuration();
        $configuration->setCustomTemplateDirs([
            __DIR__ . '/templates'
        ]);
        $configuration->setTheme('default');

        $kernel = new Kernel($configuration);
        $builder = new Builder($kernel);
        $builder->build(__DIR__.'/content-test', __DIR__.'/output');

        $finder = new Finder();
        $finder->files()
            ->in(__DIR__.'/content-test')
            ->name('toc.txt');

        $fs = new Filesystem();

        foreach ($finder as $file) {
            $fs->copy(
                $file->getPathname(),
                str_replace(__DIR__.'/content-test', __DIR__.'/output', $file->getPathname()),
                true
            );
        }

        return 0;
    })
    ->getApplication()
    ->setDefaultCommand('compile', true)
    ->run();
