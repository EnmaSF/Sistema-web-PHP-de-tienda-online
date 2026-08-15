<?php
class CarritoController{
    public function __construct(){
        if(!isset($_SESSION['user'])){
            header("Location: auth/loginUser");
            exit;
        }
    }

    public function index(){
        require "views/carrito.php";
    }
    
    public function agregar(){
        $data = json_decode(file_get_contents("php://input"), true);
        
        $_SESSION['carrito'][] = $data;

        echo json_encode(["mensaje"=>"Producto agregado al carrito"]);
    }

    public function listar(){
        echo json_encode($_SESSION['carrito'] ?? []);
    }

    public function eliminar(){
        $index = $_GET['index'];
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
        echo json_encode(["mensaje"=>"Producto eliminado del carrito"]);
    }

    public function vaciar(){
        unset($_SESSION['carrito']);
        echo json_encode(["mensaje"=>"Carrito vaciado correctamente"]);
    }
}