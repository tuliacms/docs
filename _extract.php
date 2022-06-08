<?php

declare(strict_types=1);

$zip = new ZipArchive;
$res = $zip->open('tulia-docs-build.zip');

if ($res === TRUE) {
    $zip->extractTo(__DIR__.'/'.date('Y-m-d H:i:s').' - '.uniqid());
    $zip->close();
    echo 'Extracted!';
} else {
    echo 'Something goes wrong :(';
}
