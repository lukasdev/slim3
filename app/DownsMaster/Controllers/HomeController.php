<?php
    namespace DownsMaster\Controllers;

    class HomeController{
        public function index($request, $response, $args){
            echo 'Estou na home via controller';
        }
    }