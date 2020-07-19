function selectValue(id) {
  document.getElementById("" + id).select();
};



function guardaOrdenDB() { 
  var precioTotalOrden = $("#showTotalPrecio").text();         //Obtengo el precio total original de la vista
  precioTotalOrden = precioTotalOrden.substr(8);           //Elimino la palabra "TOTAL: " de la vista, retorna el precio total
  $.ajax({
    url: "http://localhost/ginniLubricentro/Inicio/guardaOrdenPedido",
    type: "POST",
    data: { precioTotal: precioTotalOrden },
    success: function (respuesta) {
    }
  });
  var inputValue = document.getElementById("inputListaChecks").value;
  inputValue = inputValue.substr(1);
  var listaInputValue = inputValue.split(",");
  var contadorElementos = listaInputValue.length;
  var contador = 0;
  var listaTotal = "";
  while (contadorElementos > 0) {
    var id = listaInputValue[contador];
    id = id.replace(/"/gi, '');
    var descripcion = document.getElementById(id + "descripcion").innerHTML;
    var cantidad = document.getElementById("cantidad" + id).value;
    var precioUnitario = document.getElementById(id + "precio").innerHTML;
    var precioF = document.getElementById(id + "precioFila").innerHTML;
    listaTotal += "^" + id + "^" + descripcion + "^" + cantidad + "^" + precioUnitario + "^" + precioF; //Guardo los datos en un string para crear la consulta ajax
    contadorElementos--;
    contador++;
  }
  listaTotal = listaTotal.substr(1);
  $.ajax({
    url: "http://localhost/ginniLubricentro/Inicio/guardaOrdenPedidoDetalle",
    type: "POST",
    data: { obtieneListaTotal: listaTotal },
    success: function (respuesta) {
    }
  });

}

function obtieneDatosOrden(id, cantidad, cantidadVieja) {
  var palabraTotalPrecio = "Total: ¢" + 0.00;
  $("#showTotalPrecio").text(palabraTotalPrecio);
  $("#showTotalPrecio1").text(palabraTotalPrecio);
  if (cantidad.length === 0) {
    cantidad = 0;
  }
  if (cantidad >= 0) {
    $("#" + id).attr('name', cantidad);
    var id = id.substr(8);                                            //Elimino los primeros 8 caracteres del ID
    var precioTotalOrdenVista = $("#showTotalPrecio").text();         //Obtengo el precio total original de la vista
    var precioTotalOrden = precioTotalOrdenVista.substr(8);           //Elimino la palabra "TOTAL: " de la vista, retorna el precio total
    var idPrecio = id + "precio";                                       //Creo el id precio
    var idPrecioFila = id + "precioFila";
    var precioUnitario = document.getElementById(idPrecio).innerHTML; //Obtengo el precio de la columna de precio unitario
    var precioTotal = precioUnitario * cantidad;                        //Multiplico la cantidad ingresada por el precio unitario del producto

    precioTotalFila = (precioTotal * 1).toFixed(2);
    $("#" + idPrecioFila).text(precioTotalFila);
    var inputValue = document.getElementById("inputListaChecks").value;
    inputValue = inputValue.substr(1);
    var listaInputValue = inputValue.split(",");
    var contadorElementos = listaInputValue.length;
    var contador = 0;
    var precioTotalOrden1=0;
    while (contadorElementos > 0) {
      var id = listaInputValue[contador];
      id = id.replace(/"/gi, '');
      idpref=id + "precioFila";
      var precioF = document.getElementById(idpref).innerHTML;
      precioTotalOrden1=precioTotalOrden1+(precioF*1);
      contadorElementos--;
      contador++;
    }
    precioTotalOrden1 = precioTotalOrden1.toFixed(2);
    var palabraTotalPrecio = "Total: ¢" + precioTotalOrden1;//formatNumber.new(precioTotalOrden1);
    var palabraTotalPrecio1 = "Total: ¢" + formatNumber.new(precioTotalOrden1);
    $("#showTotalPrecio").text(palabraTotalPrecio);
    $("#showTotalPrecio1").text(palabraTotalPrecio1);
  }
};


var formatNumber = {
  separador: ".", // separador para los miles
  sepDecimal: ',', // separador para los decimales
  formatear:function (num){
  num +='';
  var splitStr = num.split('.');
  var splitLeft = splitStr[0];
  var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
  var regx = /(\d+)(\d{3})/;
  while (regx.test(splitLeft)) {
  splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
  }
  return this.simbol + splitLeft +splitRight;
  },
  new:function(num, simbol){
  this.simbol = simbol ||'';
  return this.formatear(num);
  }
 }

