<?php
class Database{

private $host = "localhost";
private $db = "techmarket";
private $user = "root";
private $pass = "";

public function connect(){

    try {
        $conn = new PDO(
            "mysql:host={$this->host};dbname={$this->db};charset=utf8",
            $this->user,
            $this->pass
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    }catch(PDOException $e){
        die("Error: " . $e->getMessage());
    }
}
}