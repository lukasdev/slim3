<?php
    namespace DownsMaster\Controllers;
    use DownsMaster\Controllers\Controller;

    class ClientesController extends Controller{
        public function cadastraCliente($request, $response, $args){
            $posts = $request->getParsedBody();
            
            if(isset($posts['nome']) && isset($posts['salario'])){
                $inserir = array_values($posts);
                $insert = $this->db->prepare("INSERT INTO `clientes` SET `nome` = ?, `salario` = ?");
                if($insert->execute($inserir)){
                    $url = $this->router->pathFor('home');
                    return $response->withRedirect($url);
                }
            }
        }

        public function listaClientes($request, $response, $args){
            $clients = $this->db->prepare("SELECT * FROM `clientes`");
            $clients->execute();
            $clientes = $clients->fetchAll();

            $response = $response->withStatus(200);
            return $this->view->render($response, 'clientes.twig', [
                'clientes' => $clientes
            ]);
        }
    }