<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TECHMARKET/assets/css/estilos.css">
    <title>TechMarket/Login cliente</title>
</head>
<body class="center-page">
    <h2>Iniciar sesión como cliente</h2>

    <form id="loginUser">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
    </form>

    <div class="login-links">
        <a href="registerUser">Registrarse</a>
        <button onclick="window.location='../home'">Volver al inicio</button>
    </div>

    <script>
    document.getElementById("loginUser")
    .addEventListener("submit",e=>{
        e.preventDefault();
        fetch("loginUserPost",{
            method:"POST",
            headers:{"Content-Type":"application/json"},
            body:JSON.stringify({
                username:e.target.username.value,
                password:e.target.password.value
            })
        })
        .then(r=>r.json())
        .then(d=>{
            if(d.redirect) window.location=d.redirect;
            else alert(d.mensaje);
        });
    });
    </script>
</body>
</html>