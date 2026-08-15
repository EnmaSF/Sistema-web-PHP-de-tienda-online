<!DOCTYPE html>
<html>
<head>
    <title>TechMarket/Registro cliente</title>
    <link rel="stylesheet" href="/TECHMARKET/assets/css/estilos.css">
</head>
<body class="center-page">

<h2>Registrarse</h2>

<form id="registerUser">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrar</button>
</form>

<br>
<button onclick="window.location='loginUser'">Iniciar sesión como cliente</button>

<script>
document.getElementById("registerUser")
.addEventListener("submit",e=>{
    e.preventDefault();

    let username = e.target.username.value.trim();
    let password = e.target.password.value.trim();

    if(username === "" || password === ""){
        alert("Todos los campos son obligatorios");
        return;
    }

    fetch("registerUserPost",{
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({username,password})
    })
    .then(r=>r.json())
    .then(d=>{
        alert(d.mensaje);
        if(d.mensaje.includes("correctamente")){
            window.location="loginUser";
        }
    });
});
</script>

</body>
</html>