<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMarket/Registro productos</title>
    <link rel="stylesheet" href="/TECHMARKET/assets/css/estilos.css">
</head>
<body>
    <div class="product-header">
        <h1>Registro de productos</h1>
        <button onclick="cerrarSesion()">Cerrar Sesión</button>
    </div>
    
    <form id="formProducto" class="product-form" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="number" name="precio" placeholder="Precio" required>
        <input type="file" name="imagen" required>
        <button>Guardar</button>
    </form>

    <div id="listarProductos" class="products-container"></div>

    <script>
    function cerrarSesion(){
        if(confirm("¿Deseas cerrar sesión?")){
            window.location = "auth/logout";
        }
    }
    </script>

    <script src="assets/js/admin.js"></script>
</body>
</html>
