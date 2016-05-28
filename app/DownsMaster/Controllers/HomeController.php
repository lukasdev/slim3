<?php
    namespace DownsMaster\Controllers;
    use DownsMaster\Controllers\Controller;

    class HomeController extends Controller{
        public function index($request, $response, $args){
            $clientes = [
                0 => [
                    'nome' => 'Fulano de Tal',
                    'salario' => 1500
                ],
                1 => [
                    'nome' => 'Ciclano da Silva',
                    'salario' => 1800
                ],
                2 => [
                    'nome' => 'Beltrano dos Santos',
                    'salario' => 2800
                ]                
            ];
            return $this->view->render($response, 'home.twig', [
                'clientes' => $clientes
            ]);
        }
    }