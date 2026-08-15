<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechMarket Online / Carrito</title>
    <link rel="stylesheet" href="/TECHMARKET/assets/css/estilos.css">
</head>
<body>

    <div class="product-header">
        <h1>Carrito</h1>
        <a href="cliente">Volver</a>
    </div>

    <div id="listarCarrito" class="products-container"></div>
    <h2 id="total"></h2>

    <div class="opcion-box">
        <select id="metodo">
        <option>Paypal</option>
        <option>Visa</option>
        <option>Mastercard</option>
        </select>
        
        <div class="carro-button">
            <button onclick="pagar()">Pagar</button>
            <button onclick="vaciar()">Vaciar</button>
        </div>
    </div>

    <script src="assets/js/carrito.js"></script>
</body>
</html>