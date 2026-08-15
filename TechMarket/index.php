<?php
session_name("TECHMARKET_SESSION");
session_start();

$url = isset($_GET['url'])? $_GET['url'] : 'home';
$url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));

$controlador = ucfirst($url[0]) . "Controller";
$archivo = "controllers/" . $controlador . ".php";

if(file_exists($archivo)){

    require_once $archivo;
    $controller = new $controlador();

    if (isset($url[1]) && method_exists($controller, $url[1])){
        $controller->{$url[1]}();
    }else{
        $controller->index();
    }
}else{
    echo "Error 404 - Pagina no encontrada";
}