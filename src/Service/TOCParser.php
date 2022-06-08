<?php

declare(strict_types=1);

namespace Tulia\Docs\Service;

/**
 * @author Adam Banaszkiewicz
 */
final class TOCParser
{
    public function __construct(
        private string $docOutputDir
    ) {
    }

    public function parseFile(string $locale, string $version = 'current'): array
    {
        $tocFilepath = $this->docOutputDir.'/'.$locale.'/'.$version.'/toc.txt';

        if (!is_file($tocFilepath)) {
            return [];
        }

        $lines = file($tocFilepath, FILE_IGNORE_NEW_LINES);

        $toc = [];
        $secionIndex = 0;

        foreach ($lines as $line) {
            if (!$line) {
                $secionIndex++;
                continue;
            }

            $section = strncmp($line, '    ', 4) === 0;

            if (!$section) {
                [$headline, $icon] = explode('||', $line);
                $toc[$secionIndex]['headline'] = $headline;
                $toc[$secionIndex]['icon'] = $icon;
                $toc[$secionIndex]['links'] = [];
            } else {
                [$link, $label] = explode('||', $line);
                $toc[$secionIndex]['links'][trim($link)] = $label;
            }
        }

        return $toc;
    }
}
