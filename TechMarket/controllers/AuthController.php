<?php
require_once "config/database.php";

class AuthController{

    private $conn;

    public function __construct(){
        $this->conn = (new Database())->connect();
    }

    public function loginAdmin(){
        require "views/loginAdmin.php";
    }

    public function loginUser(){
        require "views/loginUser.php";
    }

    public function registerUser(){
        require "views/registerUser.php";
    }

    public function loginAdminPost(){

        $data = json_decode(file_get_contents("php://input"), true);

        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');

        if(empty($username) || empty($password)){
            echo json_encode(["mensaje"=>"Complete todos los campos"]);
            return;
        }

        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE username=:u");
        $stmt->bindParam(":u",$username);
        $stmt->execute();

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$admin){
            echo json_encode(["mensaje"=>"Usuario no encontrado"]);
            return;
        }

        if(password_verify($password, $admin['password'])){
            $_SESSION['admin'] = $admin['username'];
            echo json_encode(["redirect"=>"../producto"]);
        }else{
            echo json_encode(["mensaje"=>"Credenciales incorrectas"]);
        }
    }

    public function loginUserPost(){

        $data = json_decode(file_get_contents("php://input"), true);

        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');

        if(empty($username) || empty($password)){
            echo json_encode(["mensaje"=>"Complete todos los campos"]);
            return;
        }

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username=:u");
        $stmt->bindParam(":u",$username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            $_SESSION['user'] = $user['username'];
            echo json_encode(["redirect"=>"../cliente"]);
        }else{
            echo json_encode(["mensaje"=>"Credenciales incorrectas"]);
        }
    }

    public function registerUserPost(){

        $data = json_decode(file_get_contents("php://input"), true);

        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');

        if(empty($username) || empty($password)){
            echo json_encode(["mensaje"=>"Todos los campos son obligatorios"]);
            return;
        }

        if(strlen($password) < 4){
            echo json_encode(["mensaje"=>"La contraseña debe tener al menos 4 caracteres"]);
            return;
        }

        $check = $this->conn->prepare("SELECT id FROM users WHERE username=:u");
        $check->bindParam(":u",$username);
        $check->execute();

        if($check->rowCount() > 0){
            echo json_encode(["mensaje"=>"El usuario ya existe"]);
            return;
        }

        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "INSERT INTO users(username,password) VALUES(:u,:p)"
        );

        $stmt->bindParam(":u",$username);
        $stmt->bindParam(":p",$passHash);
        $stmt->execute();

        echo json_encode(["mensaje"=>"Usuario registrado correctamente"]);
    }

    public function logout(){

        $esAdmin = isset($_SESSION['admin']);
        $esUser  = isset($_SESSION['user']);

        session_unset();
        session_destroy();

        if($esAdmin){
            header("Location: ../auth/loginAdmin");
        }else{
            header("Location: ../auth/loginUser");
        }

        exit;
    }
}