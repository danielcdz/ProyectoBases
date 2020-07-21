<!DOCTYPE html>
<html lang="en">

<div class="jumbotron jumbotron-fluid">
    <div class="container">
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h1 class="display-4">Registrar Reservación</h1>
    <p class="lead">Ingrese la información requerida para registrar una nueva Reservación </p>
    <form action="<?php echo base_url()?>PanelHospedaje/validarReservacion" method="POST">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="identificacion">Identificación del cliente</label>
      <input type="number" class="form-control" id="identificacion" name="identificacion" required>
      <span class="text-danger"> <?php echo form_error('identificacion');?> </span>
    </div>
    
    <div class="form-group col-md-2">
      <label for="numeroHabitacion">ID de habitación</label>
      <input type="number" class="form-control" id="numeroHabitacion" name="numeroHabitacion" placeholder="" required>
      <span class="text-danger"> <?php echo form_error('numeroHabitacion');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="cantPersonas">Cantidad de personas</label>
      <input type="number" class="form-control" id="cantPersonas" name="cantPersonas" required>
      <span class="text-danger"> <?php echo form_error('cantPersonas');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Posee vehículo</label>
      <select class="custom-select" name="inputVehiculo">
        <option value="si">Si</option>
        <option value="no">No</option>
        </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Fecha y Hora de ingreso</label>
      <input type="datetime-local" class="form-control" id="inputFechaIngreso" name="inputFechaIngreso" required/>
    </div>

    <div class="form-group col-md-3">
      <label for="inputPassword4">Fecha y Hora de salida</label>
      <input type="datetime-local" class="form-control" id="inputFecha" name="inputFecha" required/>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-success">Registrar</button>
    </div>

</div>


</body>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; MeetLimon</small>
  </div>
</footer>

</html>