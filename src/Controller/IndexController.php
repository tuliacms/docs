<?php

declare(strict_types=1);

namespace Tulia\Docs\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Adam Banaszkiewicz
 */
final class IndexController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
}
