<!DOCTYPE html>
<html lang="en">



<div class="jumbotron jumbotron-fluid">

  <div class="container">
  <hr class="my-4">
    <h2 class="display-4">Facturas registradas</h2>
    
  <div class='table-wrapper-scroll-y my-custom-scrollbar'>
        <table class="table table-striped"  >
            <thead class="thead-light" id="headTabla">
                <tr>
                    <th scope="col">Número factura</th>
                    <th scope="col">Número de noches</th>
                    <th scope="col">Tipo de habitación</th>
                    <th scope="col">Número de reserva</th>
                    <th scope="col">Número de habitación</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto total</th>
                    
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
               
                
                <?php foreach ($listaFacturas as $item):?>
                    <tr>
                        <td><?php echo $item['numeroFactura'];?></td>
                        <td><?php echo $item['numeroNoches'];?></td>   
                        <td><?php echo $item['tipoHabitacion'];?></td>
                        <td><?php echo $item['numReserva'];?></td>  
                        <td><?php echo $item['numeroHabitacion'];?></td>  
                        <td><?php echo $item['fecha'];?></td>  
                        <td><?php echo $item['MontoTotal'];?></td>  
                        
                    </tr>
                   
                <?php endforeach;?>
                
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