<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ErrorController extends AbstractController
{
    public function show(FlattenException $exception, Environment $env):  Response
    {
        $view = "bundles/twigBundle/Exception/error{$exception->getStatusCode()}.html.twig";

        if(!$env->getLoader()->exists($view)){
            $view = "bundles/TwigBundle/Exception/error.html";
        }

        return $this->render($view);
    }
}