<!DOCTYPE html>
<html lang="en">



<div class="jumbotron jumbotron-fluid">

  <div class="container">
  <hr class="my-4">
    <h2 class="display-4">Facturas en proceso</h2>
    
  <div class='table-wrapper-scroll-y my-custom-scrollbar'>
        <table class="table table-striped"  >
            <thead class="thead-light" id="headTabla">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Número de reserva</th>
                    <th scope="col">Cedula cliente</th>
                    <th scope="col">Número de noches</th>
                    <th scope="col">Importe total</th>
                    <th scope="col">Pago en efectivo</th>
                    <th scope="col">Pago con tarjeta</th>
                    <th scope="col">Cancelar factura</th>
                    
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
                <tr>
                    <td>1</td>
                    <td>143</td>                    
                    <td>702730589</td>
                    <td>4</td>
                    <td>$590</td>  
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="1" name="1">
                        <label class="custom-control-label" for="1"></label>
                    </div></td>
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="2" name="2">
                        <label class="custom-control-label" for="2"></label>
                    </div></td>  
                    <td><button class="btn btn-outline-danger"  ><span class="fa fa-location-arrow" aria-hidden="true"></span></button></td>
                      
          
                </tr>
                <tr>
                    <td>2</td>
                    <td>754</td>                    
                    <td>203650847</td>
                    <td>2</td>
                    <td>$150</td>  
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="3" name="3">
                        <label class="custom-control-label" for="3"></label>
                    </div></td>
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="4" name="4">
                        <label class="custom-control-label" for="4"></label>
                    </div></td>  
                    <td><button class="btn btn-outline-danger"  ><span class="fa fa-location-arrow" aria-hidden="true"></span></button></td>
                      
          
                    </tr>
                <tr>
                    
                    <td>3</td>
                    <td>120</td>                    
                    <td>302560897</td>
                    <td>6</td>
                    <td>$720</td>  
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="5" name="5">
                        <label class="custom-control-label" for="5"></label>
                    </div></td>
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="6" name="6">
                        <label class="custom-control-label" for="6"></label>
                    </div></td>  
                    <td><button class="btn btn-outline-danger"  ><span class="fa fa-location-arrow" aria-hidden="true"></span></button></td>
                      
          
                    </tr>
                <tr>
                    
                    <td>4</td>
                    <td>123</td>                    
                    <td>502490974</td>
                    <td>3</td>
                    <td>$280</td>  
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="7" name="7">
                        <label class="custom-control-label" for="7"></label>
                    </div></td>
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="8" name="8">
                        <label class="custom-control-label" for="8"></label>
                    </div></td>  
                    <td><button class="btn btn-outline-danger"  ><span class="fa fa-location-arrow" aria-hidden="true"></span></button></td>
                     

                    </tr>
                <tr>
                    
                <td>5</td>
                    <td>124</td>                    
                    <td>101520165</td>
                    <td>6</td>
                    <td>$720</td>  
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="9" name="9">
                        <label class="custom-control-label" for="9"></label>
                    </div></td>
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="1" name="1">
                        <label class="custom-control-label" for="1"></label>
                    </div></td>  
                    <td><button class="btn btn-outline-danger"  ><span class="fa fa-location-arrow" aria-hidden="true"></span></button></td>
                    </tr>
                <tr>
                    
                <td>6</td>
                    <td>100</td>                    
                    <td>302540999</td>
                    <td>9</td>
                    <td>$1100</td>  
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="1" name="1">
                        <label class="custom-control-label" for="1"></label>
                    </div></td>
                    <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="1" name="1">
                        <label class="custom-control-label" for="1"></label>
                    </div></td>  
                    <td><button class="btn btn-outline-danger"  ><span class="fa fa-location-arrow" aria-hidden="true"></span></button></td>
                    
                </tr>
                
            </tbody>
        </table>
        </div>

    
<br>
<br>
<br>

<hr class="my-4">
<h2 class="display-4">Facturas Canceladas</h2>
<h2 class="display-6">Filtros de búsqueda</h2>
<div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Dia</label>
      <input type="text" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Mes</label>
      <input type="text" class="form-control" id="inputPassword4">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Año</label>
      <input type="text" class="form-control" id="inputEmail4">
    </div>
    
    <div class="form-group col-md-3">
      <label for="inputPassword4">Rango fechas 1</label>
      <input type="text" class="form-control" id="inputPassword4">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Rango fechas 2</label>
      <input type="text" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Tipo habitacion</label>
      <input type="text" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Numero habitacion</label>
      <input type="text" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class='table-wrapper-scroll-y my-custom-scrollbar'>
        <table class="table table-striped"  >
            <thead class="thead-light" id="headTabla">
                <tr>
                <th scope="col">ID</th>
                    <th scope="col">Número de reserva</th>
                    <th scope="col">Cedula cliente</th>
                    <th scope="col">Número de noches</th>
                    <th scope="col">Importe total</th>
                    <th scope="col">Pago en efectivo</th>
                    <th scope="col">Pago con tarjeta</th>
                    <th scope="col">Cancelar factura</th>
                    
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
                                
            </tbody>
        </table>
       <center> <h2 class="display-6">No hay resultados</h2></center>
        </div>


  </div>
</div>

</body>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; MeetLimon</small>
  </div>
</footer>

</html>