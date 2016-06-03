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
        $view = new \Slim\Views\Twig($folder.'/app/public/views',[
            'cache' => false
        ]);

        $view->addExtension(new \Slim\Views\TwigExtension(
            $container->router,
            $container->request->getUri()
        ));

        return $view;
    };

    $container['db'] = function($container){
        return new PDO('mysql:host=localhost;dbname=videoaulas', 'root', '');
    };

    $container['HomeController'] = function($container) use ($app){
        return new DownsMaster\Controllers\HomeController($container);
    };
    $container['ClientesController'] = function($container) use ($app){
        return new DownsMaster\Controllers\ClientesController($container);
    };

    $app->post('/', 'ClientesController:cadastraCliente');
    $app->get('/', 'HomeController:index')->setName('home');

    $app->get('/clientes', 'ClientesController:listaClientes')->setName('clientes');
    $app->run();