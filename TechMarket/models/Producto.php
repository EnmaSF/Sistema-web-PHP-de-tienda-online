<?php
class Producto{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function listar(){
        $stmt = $this->conn->prepare("SELECT * FROM productos ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($nombre, $precio, $imagen){
        $stmt = $this->conn->prepare(
        "INSERT INTO productos(nombre, precio, imagen) 
        VALUES(:nombre, :precio, :imagen)"
        );

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        
        return $stmt->execute();
    }

    public function eliminar($id){

        $stmt = $this->conn->prepare("DELETE FROM productos WHERE id=:id");
        $stmt->bindParam(":id",$id);
        return $stmt->execute();
    }
}