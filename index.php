<?php
    require 'vendor/autoload.php';
    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);

    $container = $app->getContainer();

    $container['HomeController'] = function($container) use ($app){
        return new DownsMaster\Controllers\HomeController();
    };

    $app->run();