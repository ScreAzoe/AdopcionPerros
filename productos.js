'use strict'

function actualizarCarrito(idProducto){
    if(estaEnCarrito(idProducto)){
        return;
    }
    let productoDOM= document.querySelector('#'+idProducto);
    let imagen= productoDOM.querySelector("img").src;
    productoDOM=productoDOM.querySelector("div.renglon-cuerpo");
    let nombre= productoDOM.querySelector("p[name='nombre']").innerHTML;
    let precio= parseFloat(productoDOM.querySelector("p strong[name='precio']").innerHTML);
    let elemento= document.createElement("tr");
    elemento.setAttribute("id", idProducto);
    elemento.innerHTML= agregarElementoCarrito(idProducto,imagen, nombre, precio);
    let carrito= document.querySelector("#carritoCompras table tbody");
    carrito.appendChild(elemento);
    calcularTotal();
}

function estaEnCarrito(idProducto){
    let elemento=document.querySelector("#carritoCompras #"+idProducto);
    return elemento!=null;

}

function quitarElementoCarrito(idProducto){
    
    let carrito=document.querySelector("#carritoCompras tbody");
    let elemento= carrito.querySelector("#"+idProducto);
    console.log(elemento);
    carrito.removeChild(elemento);
    calcularTotal();
}
function agregarElementoCarrito(idProducto, imagen, nombre, precio){
    return ` 
                <td align="center">
                    <img src="`+imagen+`" style="width: 70px; height: 50px">
                </td>
                <td align="center">
                    <input type="text" name="producto" id="name_id" value="`+nombre+`" readonly >
                </td>
                <td align="center">
                    $<input type="number" name="precio" id="precio_id" value=`+precio+`  readonly> MXN
                </td>
                <td align="center">
                    <input pattern="^[0-9]+" oninput="calcularSubtotal('`+idProducto+`',`+precio+`)" type="number" name="cantidad" id="cantidad_id" min="1" max="100" step="1" value=`+1+` title="Debe de pedir al menos un pieza"> 
                </td>
                <td align="center">
                    <input type="number" name="total" id="total_id" value=`+precio+` readonly > MXN
                </td>
                <td align="center">
                    <button onclick="quitarElementoCarrito('`+idProducto+`')"> x </button>
                </td>
                `;
}

function calcularSubtotal(idProducto, precio){
    let elemento=document.querySelector("#carritoCompras #"+idProducto);
    let cantidad= elemento.querySelector("td input[name='cantidad']").value
    elemento.querySelector("td input[name='total']").value=  cantidad*precio;
    calcularTotal();
}

function calcularTotal(){
    let carrito= document.querySelectorAll("#carritoCompras td input[name='total']");
    var suma=0;
    var i;
    for(i=0; i<carrito.length; i++){
        suma+=parseFloat(carrito[i].value);
        console.log(suma)
    }
    document.querySelector("#totalGlobal").value=suma;
    var boton= document.querySelector("#botonPagar");

    if(suma<=0){
        boton.disabled=true;
    }
    else{
        boton.disabled=false;

    }
}