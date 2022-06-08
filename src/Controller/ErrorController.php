<?php

declare(strict_types=1);

namespace Tulia\Docs\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * @author Adam Banaszkiewicz
 */
final class ErrorController extends AbstractController
{
    public function show(\Exception $exception): Response
    {
        if ($exception instanceof NotFoundHttpException) {
            return $this->render('error-page/404.html.twig');
        }

        return $this->render('error-page/500.html.twig');
    }
}
