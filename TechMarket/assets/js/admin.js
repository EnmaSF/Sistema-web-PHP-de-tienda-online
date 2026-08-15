document.addEventListener("DOMContentLoaded", cargar);

function cargar(){
    fetch("producto/listar")
    .then(r=>r.json())
    .then(data=>{
        let html="";
        data.forEach(p=>{
            html+=`
            <div class="product-card">
                <img src="assets/uploads/${p.imagen}">
                <h3>${p.nombre}</h3>
                <p>S/ ${p.precio}</p>
                <button onclick="eliminar(${p.id})">Eliminar</button>
            </div>`;
        });

        document.getElementById("listarProductos").innerHTML=html;
    });
}

document.getElementById("formProducto")
.addEventListener("submit",e=>{
    e.preventDefault();

    fetch("producto/guardar",{
        method:"POST",
        body:new FormData(e.target)
    })
    .then(r=>r.json())
    .then(d=>{
        alert(d.mensaje);
        cargar();
    });
});

function eliminar(id){
    if(confirm("¿Eliminar producto?")){
        fetch("producto/eliminar?id="+id)
        .then(r=>r.json())
        .then(d=>{
            alert(d.mensaje);
            cargar();
        });
    }
}