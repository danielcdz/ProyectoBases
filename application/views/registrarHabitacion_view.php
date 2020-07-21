<!DOCTYPE html>
<html lang="en">

<div class="jumbotron jumbotron-fluid">
    <div class="container">
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h1 class="display-4">Registrar Habitación</h1>
    <p class="lead">Ingrese la informacion requerida para registrar una nueva habitación </p>
    <form action="<?php echo base_url()?>PanelHospedaje/validarRegistroHabitacion" method="POST">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
      <span class="text-danger"> <?php echo form_error('nombre');?> </span>
    </div>
    <div class="form-group col-md-4">
      <label for="tipo">Tipo</label>
      <input type="text" class="form-control" id="tipo" name="tipo" required>
      <span class="text-danger"> <?php echo form_error('tipo');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="numero">Número</label>
      <input type="number" class="form-control" id="numero" name="numero" required>
      <span class="text-danger"> <?php echo form_error('numero');?> </span>
    </div>
    
    <div class="form-group col-md-2">
      <label for="precio">Precio por noche</label>
      <input type="number" class="form-control" id="precio"  name="precio"  required>
      <span class="text-danger"> <?php echo form_error('precio');?> </span>
    </div>
    
  </div>
  <div class="form-row">
      
    <!-- <div class="form-group col-md-6">
      <label for="inputPassword4">Comodidades</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Wifi,A/C,Agua caliente...">
    </div> -->
  <div class="form-group col-md-12">
      <label for="descripcion">Descripción</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" required>
    </div>
</div>
<h5>Comodidades</h5>
<div class="form-row">
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="wifi" name="wifi" value="1">
            <label class="custom-control-label" for="wifi">Wifi</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="ac" name="ac" value="1">
            <label class="custom-control-label" for="ac">A/C</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="ventilador" name="ventilador" value="1" >
            <label class="custom-control-label" for="ventilador">Ventilador</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="aguaCaliente" name="aguaCaliente" value="1">
            <label class="custom-control-label" for="aguaCaliente">Agua Caliente</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="tv" name="tv"  value="1">
            <label class="custom-control-label" for="tv">Tv</label>
        </div>
    </div>
 

  </div>
  <h5>Fotografias(url)</h5>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="foto">1</label>
      <input type="text" class="form-control" id="foto" name="foto" required>
      <span class="text-danger"> <?php echo form_error('foto');?> </span>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">2</label>
      <input type="text" class="form-control" id="foto1" name="foto1">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">3</label>
      <input type="text" class="form-control" id="foto2" name="foto2" >
    </div>
    
  </div>


  <button type="submit" class="btn btn-success">Registrar</button>
  </form>
    </div>

</div>


</body>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; MeetLimon</small>
  </div>
</footer>

</html>