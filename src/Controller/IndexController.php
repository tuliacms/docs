<?php

declare(strict_types=1);

namespace Tulia\Docs\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Adam Banaszkiewicz
 */
final class IndexController extends AbstractController
{
    public function index(): Response
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

        return $this->render('homepage.html.twig');
    }

    public function localeRedirect(): RedirectResponse
    {
        return $this->redirectToRoute('homepage.localized', ['_locale' => 'en']);
    }
}
