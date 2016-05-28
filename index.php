<?php
    require 'vendor/autoload.php';
    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);

    $container = $app->getContainer();
    $container['algumacoisa'] = 'alguma coisa no container';
    
    $container['HomeController'] = function($container) use ($app){
        return new DownsMaster\Controllers\HomeController($container);
    };

    $app->get('/post/{categoria}/{slug}', function($request, $response, $args){
        var_dump($request->getAttribute('categoria'));
        var_dump($request->getAttribute('slug'));
        echo '<br />'.$this->teste;
    });

    $app->post('/contato', function($request, $response, $args){
       /*
        Um codigo complexo aqui foi executado
       */

        return $response->withStatus(200)->write('Success');
        #return $response->withRedirect($this->router->pathFor('home'));
    });

    $app->get('/', 'HomeController:index')->setName('home');

    $app->get('/contato', function($request, $response, $args){
        $pathContato = $this->router->pathFor('contato');

        echo '<form action="'.$pathContato.'" method="post">';
        echo '<input type="submit" name="teste" value="Enviar" />';
        echo '</form>';
    })->setName('contato');

    $app->run();