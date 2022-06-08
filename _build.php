<?php

declare(strict_types=1);

use Symfony\Component\Filesystem\Filesystem;

require_once './vendor/autoload.php';

echo 'Copying files to "/_build" directory...'.PHP_EOL;

$fs = new Filesystem();
$fs->mirror(__DIR__.'/bin', __DIR__.'/_build/bin');
$fs->mirror(__DIR__.'/config', __DIR__.'/_build/config');
$fs->mirror(__DIR__.'/output', __DIR__.'/_build/output');
$fs->mirror(__DIR__.'/public', __DIR__.'/_build/public');
$fs->mirror(__DIR__.'/src', __DIR__.'/_build/src');
$fs->mirror(__DIR__.'/templates', __DIR__.'/_build/templates');
$fs->mirror(__DIR__.'/translations', __DIR__.'/_build/translations');
$fs->copy(__DIR__.'/.htaccess', __DIR__.'/_build/.htaccess');
$fs->copy(__DIR__.'/.env.prod', __DIR__.'/_build/.env');
$fs->copy(__DIR__.'/composer.json', __DIR__.'/_build/composer.json');
$fs->copy(__DIR__.'/composer.lock', __DIR__.'/_build/composer.lock');
$fs->copy(__DIR__.'/symfony.lock', __DIR__.'/_build/symfony.lock');

$fs->remove(__DIR__.'/_build/public/docs/node_modules');

echo 'Files copied.'.PHP_EOL;
