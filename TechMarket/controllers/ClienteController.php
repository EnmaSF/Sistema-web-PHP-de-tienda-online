<?php
class ClienteController{
    public function index(){

        if(!isset($_SESSION['user'])){
            header("Location: auth/loginUser");
            exit;
        }

        require "views/clienteProductos.php";
    }
}