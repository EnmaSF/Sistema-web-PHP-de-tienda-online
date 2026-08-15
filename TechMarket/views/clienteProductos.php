<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMarket/Shop</title>
    <link rel="stylesheet" href="/TECHMARKET/assets/css/estilos.css">
</head>
<body>
    <div class="product-header">
        <h1>TechMarket Online</h1>
        <button onclick="cerrarSesion()">Cerrar Sesión</button>
    </div>

    <div class="product-actions">
        <a href="carrito" class="btn">Ver carrito</a>
    </div>

    <div id="listarProductos" class="products-container"></div>

    <script>
    function cerrarSesion(){
        if(confirm("¿Deseas cerrar sesión?")){
            window.location = "auth/logout";
        }
    }
    </script>

    <script src="assets/js/app.js"></script>
</body>
</html>
