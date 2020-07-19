
llenarVistaSCP();

function llenarVistaSCP(){
    $.ajax({
        url:"http://localhost/ginniLubricentro/Inicio/consultaSCP_seleccionados",
        type:"POST",
        success:function(respuesta){

            var registros=eval(respuesta);
            
            for (var i=0;i<registros.length;i++){
                var id = registros[i]["id"];
                document.getElementById(id).checked = true;
            };             
        }
    });
}



































