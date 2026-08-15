<!DOCTYPE html>
<html>
<head>
    <title>TechMarket/Login admin</title>
    <link rel="stylesheet" href="/TECHMARKET/assets/css/estilos.css">
</head>
<body class="center-page">

<h2>Iniciar sesión como administrador</h2>

<form id="loginAdmin">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
</form>

<br>

<button onclick="window.location='../home'">Volver al inicio</button>

<script>
document.getElementById("loginAdmin")
.addEventListener("submit",e=>{
    e.preventDefault();

    fetch("loginAdminPost",{
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({
            username:e.target.username.value,
            password:e.target.password.value
        })
    })
    .then(r=>r.json())
    .then(d=>{
        if(d.redirect){
            window.location=d.redirect;
        }else{
            alert(d.mensaje);
        }
    });
});
</script>

</body>
</html>