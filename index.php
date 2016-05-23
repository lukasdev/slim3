<?php
    require 'vendor/autoload.php';
    $app = new \Slim\App();


    $app->post('/contato', function($request, $response, $args){
       /*
        Um codigo complexo aqui foi executado
       */

        return $response->withRedirect($this->router->pathFor('home'));
    });

    $app->get('/', function($request, $response, $args){
        //print_r($request->getParams());
        echo 'Estou na home';
    })->setName('home');

    $app->get('/contato', function($request, $response, $args){
        $pathContato = $this->router->pathFor('contato');

        echo '<form action="'.$pathContato.'" method="post">';
        echo '<input type="submit" name="teste" value="Enviar" />';
        echo '</form>';
    })->setName('contato');

    $app->run();