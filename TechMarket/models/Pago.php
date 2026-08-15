<?php
class Pago{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function procesar($total,$metodo){
        $stmt = $this->conn->prepare(
            "INSERT INTO pagos(total, metodo) VALUES(:total, :metodo)"
        );

        $stmt->bindParam(":total", $total);
        $stmt->bindParam(":metodo", $metodo);
        return $stmt->execute();
    }
}