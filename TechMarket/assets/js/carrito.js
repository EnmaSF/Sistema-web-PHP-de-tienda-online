document.addEventListener("DOMContentLoaded", cargar);

function cargar(){
    fetch("carrito/listar")
    .then(r=>r.json())
    .then(data=>{
        let html="", total=0;
        data.forEach((p,i)=>{
            total+=parseFloat(p.precio);
            html+=`
            <div class="product-card">
                <img src="/techmarket/assets/uploads/${p.imagen}">
                <h3>${p.nombre}</h3>
                <p>S/ ${p.precio}</p>
                <button onclick="eliminar(${i})">Eliminar</button>
            </div>`
        });

        document.getElementById("listarCarrito").innerHTML=html;
        document.getElementById("total").innerHTML="Total: S/ "+total.toFixed(2);

    })
}

function eliminar(i){
    fetch("carrito/eliminar?index="+i)
    .then(r=>r.json())
    .then(d=>{alert(d.mensaje);cargar();});
}

function vaciar(){
    fetch("carrito/vaciar")
    .then(r=>r.json())
    .then(d=>{alert(d.mensaje);cargar();});
}

function pagar(){

    let metodo = document.getElementById("metodo").value;

    fetch("carrito/listar")
    .then(r=>r.json())
    .then(data=>{

        let total=0;
        data.forEach(p=> total+=parseFloat(p.precio));

        fetch("pago/procesar",{
            method:"POST",
            headers:{"Content-Type":"application/json"},
            body:JSON.stringify({total, metodo})
        })
        .then(r=>r.json())
        .then(d=>{

            alert(d.mensaje);

            if(d.success){
                vaciar();
            }

        });

    });
}