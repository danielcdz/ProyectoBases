
function onInputCodigo(){
    var nombre=$('#inputCodigo').val();
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/mostrarCodigo",
        type:"POST",
        data:{buscar:nombre},
        success:function(respuesta){
            var registros=eval(respuesta);
            html="";
            for (var i=0;i<registros.length;i++){
                html+="<option value='"+registros[i]["id"]+"'</option>";
            };
            document.getElementById("listaCodigos").innerHTML = html;
        }
    });
    var tipo = "1";
    mostrarDatosCodigo(nombre,tipo);
}



function onInputNombre(){
    var nombre=$('#inputNombre').val();
    if (nombre.length>4){
        $.ajax({
            url:"http://localhost/ginniLubricentro/Inicio/mostrarNombre",
            type:"POST",
            data:{buscar:nombre},
            success:function(respuesta){
                var registros=eval(respuesta);
                html="";
                for (var i=0;i<registros.length;i++){
                    html+="<option value='"+registros[i]["nombre"]+"'</option>";
                };
                document.getElementById("listaClientes").innerHTML = html;
            }
        });
        var tipo="2";
        mostrarDatosNombre(nombre,tipo);
    }
}

function onInputCedula(){
    var nombre=$('#inputCedula').val();
    if (nombre.length>2){
        $.ajax({
            url:"http://localhost/ginniLubricentro/Inicio/mostrarCedula",
            type:"POST",
            data:{buscar:nombre},
            success:function(respuesta){
                var registros=eval(respuesta);
                html="";
                for (var i=0;i<registros.length;i++){
                    html+="<option value='"+registros[i]["identificacion"]+"'</option>";
                };
                document.getElementById("listaCedulas").innerHTML = html;
            }
        });
        var tipo = "3";
        mostrarDatosCedula(nombre,tipo);
    }
}


function mostrarDatosCodigo(valor,tipo){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/mostrarCodigoEspecifico",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){
            var registros=eval(respuesta);
            html="";
            for (var i=0;i<registros.length;i++){
                document.getElementById("inputNombre").value = registros[i]["nombre"] ;                
                document.getElementById("tipoCedula").value = registros[i]["tipo_id"] ;               
                document.getElementById("inputCorreo").value = registros[i]["correo"] ;
                document.getElementById("inputCedula").value = registros[i]["identificacion"] ;
            };
        }
    });
    
}

function mostrarDatosCedula(valor,tipo){
    if (valor.length>4){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/mostrarCedula",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){
            var registros=eval(respuesta);
            html="";
            for (var i=0;i<registros.length;i++){               
                document.getElementById("inputCodigo").value = registros[i]["id"] ;
                document.getElementById("inputNombre").value = registros[i]["nombre"] ;               
                document.getElementById("tipoCedula").value = registros[i]["tipo_id"] ;                
                document.getElementById("inputCorreo").value = registros[i]["correo"] ;
            };
        }
    });
    }
}

function mostrarDatosNombre(valor,tipo){
    if (valor.length>4){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/mostrarNombre",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){
            var registros=eval(respuesta);
            html="";
            for (var i=0;i<registros.length;i++){               
                document.getElementById("inputCodigo").value = registros[i]["id"] ;
                document.getElementById("inputCedula").value = registros[i]["identificacion"] ;               
                document.getElementById("tipoCedula").value = registros[i]["tipo_id"] ;
                document.getElementById("inputCorreo").value = registros[i]["correo"] ;
            };
        }
    });
    }
}


