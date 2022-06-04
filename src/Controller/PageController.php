<?php

declare(strict_types=1);

namespace Tulia\Docs\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Adam Banaszkiewicz
 */
final class PageController extends AbstractController
{
    public function __construct(
        private string $docOutputDir
    ) {
    }

    public function page(string $page, Request $request): Response
    {
        $pagepath = "{$this->docOutputDir}/{$request->attributes->get('_locale')}/{$page}.html";

        if (false === file_exists($pagepath)) {
            throw new NotFoundHttpException('Page not found.');
        }

        return $this->render('page.html.twig', [
            'page' => file_get_contents($pagepath)
        ]);
    }
}
