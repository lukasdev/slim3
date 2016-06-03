<?php
    namespace DownsMaster\Controllers;
    use DownsMaster\Controllers\Controller;

    class HomeController extends Controller{
        public function index($request, $response, $args){
            return $this->view->render($response, 'home.twig', []);
        }
    }