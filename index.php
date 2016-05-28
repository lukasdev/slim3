<?php
    require 'vendor/autoload.php';
    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);

    $container = $app->getContainer();
    $container['view'] = function($container){
        $folder = __DIR__;
        $view = new \Slim\Views\Twig($folder.'/app/views',[
            'cache' => false
        ]);

        $view->addExtension(new \Slim\Views\TwigExtension(
            $container->router,
            $container->request->getUri()
        ));

        return $view;
    };

    $container['HomeController'] = function($container) use ($app){
        return new DownsMaster\Controllers\HomeController($container);
    };


    $app->get('/', 'HomeController:index');
    $app->run();