

//FUNCION QUE MUESTRA LOS PRODUCTOS AL MOMENTO DE BUSCAR UN PRODUCTO.
function mostrarDatos(valor){

    if (valor.length>3){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/mostrarProducto",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){

            var registros=eval(respuesta);

            html="";
            for (var i=0;i<registros.length;i++){

                html+="<tr>";
                html+="<th scope='row'>"+registros[i]["id"]+"</th>";
                html+="<td scope='row'>"+registros[i]["descripcion"]+"</td>";
                html+="<td scope='row'>"+registros[i]["cantidad"]+"</td>";
             
                html+="<td scope='row'>"+registros[i]["precio"]+"</td>";
                   
   
                html+="<td><buttom class='btn' id='"+registros[i]["id"]+"'  onclick='agregaCarrito(this.id)'><i class='fa fa-plus'></i></buttom></td>";
                html+="</tr>";
            };
            $("#listaProductos").html(html);

        }
    });
    }
}

$('#inputNombre').keyup(function(){
    var text=$('#inputNombre').val();
    mostrarDatos(text);
});
 
cargarCarritoGuardado();

function cargarCarritoGuardado(){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/consultaCarrito",
        type:"POST",
        data:{buscar:0},
        success:function(respuesta){
            if(respuesta.length==0){
                
            }
            else{

                var cadena = ",";
                respuesta=respuesta.split(",");
                for (var i=1;i<respuesta.length;i++){

                    cadena += '"';
                    cadena += respuesta[i];
                    cadena += '"';
                    cadena += ',';
                };
                cadena = cadena.substring(0, cadena = cadena.length - 1);
                cadena = cadena.substring(0, cadena = cadena.length - 1);

                $("#inputListaChecks").val(cadena);
            }
            cargarDatosCarrito();

        }
    });

}

function cargarDatosCarrito(){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/consultaCarritoDatos",
        type:"POST",
        success:function(respuesta){
            var registros = eval(respuesta);
            var total = 0;
            html="";
            for (var i=0;i<registros.length;i++){
                html += "<tr>";
                html += "<th scope='row'><h5>" + registros[i]["codigo_producto"] + "</h5></th>";
                html += "<td scope='row'><h5 id='" + registros[i]["codigo_producto"] + "descripcion'>" + registros[i]["descripcion"] + "</h5></td>";    
                html += "<td scope='row'><h5  id='" + registros[i]["codigo_producto"] + "precio'>" + registros[i]["precio"] + "</h5></td>";
                cantidad= registros[i]['cantidad'];
                html += "<td><div class='col-4'><input class='form-control' type='number' id='cantidad" + registros[i]["codigo_producto"] +  "'value='"+ cantidad + "' style='width:100px' onchange='obtieneDatosOrden(this.id,this.value,this.name)' name='0' min='0' onclick='selectValue(this.id)'/></div></td>";      
                precio=registros[i]['precio_total_linea'];
                precioFloat = parseFloat(precio) ;
                total = total + precioFloat;
                html +="<td scope='row'><h5 id='" + registros[i]["codigo_producto"] + "precioFila'>"+precio+"</h5></td>";    
                html += "</tr>";
            };
            var palabraTotalPrecio = "Total: ¢" + total;
            var palabraTotalPrecio1 = "Total: ¢" + formatNumber.new(total);
            $("#showTotalPrecio").text(palabraTotalPrecio);
            $("#showTotalPrecio1").text(palabraTotalPrecio1);

            $("#listaProductosSeleccionados").html(html);
        }
    });
}

function cargarMecanicos(){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/consultaMecanicos",
        type:"POST",
        success:function(respuesta){

            var registros=eval(respuesta);

            document.getElementById("inputMecanico").value = registros[0]['mecanico'];
        }
    });
}

function agregaCarrito(id){
    var toPost = JSON.stringify(id);
    var inputValue=document.getElementById("inputListaChecks").value;

    var listaInputValue=inputValue.split(",");
    var contadorElementos=listaInputValue.length;
    var contador=0;
    var repetido=false;
    while(contadorElementos>0){
        if(listaInputValue[contador]==toPost){
            repetido=true;
            alertify.error('¡Producto ya ingresado!');
            break;
        }
        contador++;
        contadorElementos--;
    }
    if(repetido==false){
        alertify.success('Nuevo producto ingresado');
        var listaCompleta=inputValue+","+toPost;
        $("#inputListaChecks").val(listaCompleta);
    }


};



function creaConsulta(){    
    var listaCompleta=document.getElementById("inputListaChecks").value;
    if(listaCompleta.length>0){
    $("#validacionAgregaCarrito").html("");
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/mostrarProducto1",
        type:"POST",
        data:{buscar:listaCompleta},
        success:function(respuesta){
            var registros=eval(respuesta);
            html="";
            cantidad = 0;
            for (var i=0;i<registros.length;i++){
                html += "<tr>";
                html += "<th scope='row'><h5>" + registros[i]["id"] + "</h5></th>";
                html += "<td scope='row'><h5 id='" + registros[i]["id"] + "descripcion'>" + registros[i]["descripcion"] + "</h5></td>";    
                html += "<td scope='row'><h5  id='" + registros[i]["id"] + "precio'>" + registros[i]["precio"] + "</h5></td>";
                if(document.getElementById("cantidad"+registros[i]['id'])!=null){
                    cantidad=document.getElementById("cantidad"+registros[i]["id"]).value;
                    html += "<td><div class='col-4'><input class='form-control' type='number' id='cantidad" + registros[i]["id"] +  "'value='"+ cantidad + "' style='width:100px' onchange='obtieneDatosOrden(this.id,this.value,this.name)' name='0' min='0' onclick='selectValue(this.id)'/></div></td>";      
                }
                else{
                html += "<td><div class='col-4'><input class='form-control' type='number' value='0' id='cantidad" + registros[i]["id"] + "' style='width:100px' onchange='obtieneDatosOrden(this.id,this.value,this.name)' name='0' min='0' onclick='selectValue(this.id)'/></div></td>";
                }
                if(document.getElementById(registros[i]['id']+"precioFila")!=null){
                    precio=document.getElementById(registros[i]["id"]+"precioFila").innerHTML;

                    html +="<td scope='row'><h5 id='" + registros[i]["id"] + "precioFila'>"+precio+"</h5></td>";
                 }
                else{
                    html +="<td scope='row'><h5 id='" + registros[i]["id"] + "precioFila'>0.00</h5></td>";
                }
                html += "</tr>";
            };
            $("#listaProductosSeleccionados").html(html);
        }
    });
}
else{
    var mensaje="¡No existen productos que mostrar, debe agregar al carrito!";
    $("#validacionAgregaCarrito").html(mensaje);
}
};


// function eliminarProducto(idProducto){
//     $.ajax({
//         url:"http://localhost/ginniLubricentro/Inicio/eliminarProducto",
//         type:"POST",
//         data:{buscar:idProducto},
//         success:function(respuesta){
//             alertify.error('¡Producto eliminado!');
//             cargarCarritoGuardado();
//             creaConsulta();
//         }
//     });
// }







