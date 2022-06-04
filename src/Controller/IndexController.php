<?php

declare(strict_types=1);

namespace Tulia\Docs\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Adam Banaszkiewicz
 */
final class IndexController extends AbstractController
{
    public function index(Request $request): Response
    {
        $output = $this->getParameter('kernel.project_dir').'/output';

        if (!is_dir($output)) {
            return $this->render('empty.html.twig');
        }

        $finder = new Finder();
        $finder->in($output);

        if (!$finder->hasResults()) {
            return $this->render('empty.html.twig');
        }

        $locale = $request->attributes->get('_locale');
        $tocFilepath = $output.'/'.$locale.'/current/toc.txt';
        $toc = $this->parseToc($tocFilepath);

        return $this->render('homepage.html.twig', [
            'toc' => $toc,
        ]);
    }

    public function localeRedirect(): RedirectResponse
    {
        return $this->redirectToRoute('homepage.localized', ['_locale' => 'en']);
    }

    private function parseToc(string $tocFilepath): array
    {
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
