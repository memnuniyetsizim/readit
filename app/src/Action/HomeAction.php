<?php

namespace App\Action;

use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

final class HomeAction
{
    private $view;
    private $logger;

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function dispatch($request, $response, $args)
    {
        $this->view->render($response, 'home.twig');

        return $response;
    }
}
