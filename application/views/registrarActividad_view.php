<!DOCTYPE html>
<html lang="en">


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <img src="<?php echo base_url('/assets/img/logoGren.png'); ?>" width="140" height="230" class="display-4" alt=""> -->
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h1 class="display-4">Registrar Actividad Recreativa</h1>
    <p class="lead">Ingrese la información requerida para registrar la actividad recreativa </p>
    <form action="<?php echo base_url()?>PanelAdministrativo/validarRegistroActividad" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="validationDefault04">Nombre de la empresa</label>
      <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa"  required>
      <span class="text-danger"> <?php echo form_error('nombreEmpresa');?> </span>
    </div>
    <div class="form-group col-md-6">
      <label for="validationDefault04">Nombre de la persona a contactar</label>
      <input type="text" class="form-control" id="nombrePersona" name="nombrePersona" required>  
      <span class="text-danger"> <?php echo form_error('nombrePersona');?> </span>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="validationDefault04">Teléfono 1</label>
      <input type="text" class="form-control" id="telefono1" name="telefono1" required>
      <span class="text-danger"> <?php echo form_error('telefono1');?> </span>
    </div>
    <div class="form-group col-md-6">
      <label for="correo">Correo </label>
      <input type="text" class="form-control" id="correo" name="correo" required>
    </div>
  </div>
  <h5>Dirección</h5>
  <div class="form-row">
    <div class="form-group col-md-2">
   <label for="validationDefault04">Provincia:</label>
        <select class="custom-select" id="inputProvincia" name="inputProvincia" required>
          
          <option selected value="Limon">Limón</option>
          <option value="Cartago">Cartago</option>
          <option value="San Jose">San Jose</option>
          <option value="Alajuela">Alajuela</option>
          <option value="Heredia">Heredia</option>
          <option value="Puntarenas">Puntarenas</option>
          <option value="Guanacaste">Guanacaste</option>
        </select>
    </div>
    <div class="form-group col-md-2">
      <label for="validationDefault04">Cantón</label>
      <input type="text" class="form-control" id="canton" name="canton" required>
       <span class="text-danger"> <?php echo form_error('canton');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="validationDefault04">Distrito</label>
      <input type="text" class="form-control" id="distrito" name="distrito"  required>
      <span class="text-danger"> <?php echo form_error('distrito');?> </span>
    </div>
    <div class="form-group col-md-6">
      <label for="validationDefault04">Señas exactas</label>
      <input type="text" class="form-control" id="sennas" name="sennas"   required>
      <span class="text-danger"> <?php echo form_error('sennas');?> </span>
    </div>
  </div>
 
  <div class="form-row">
    <!-- <div class="form-group col-md-4">
      <label for="inputState">Tipo</label>
      <select id="inputState" class="form-control">
        <option selected>Hotel</option>
        <option>Hostal</option>
        <option>Casa</option>
        <option>Departamento</option>
        <option>Cuarto compartido</option>
        <option>Cabaña</option>
      </select>
    </div> -->
    <div class="form-group col-md-2">
      <label for="validationDefault04">Tipo de actividad</label>
      <input type="text" class="form-control" id="tipo" name="tipo"  required>
      <span class="text-danger"> <?php echo form_error('tipo');?> </span>
    </div>
    <div class="form-group col-md-8">
      <label for="validationDefault04">Descripción de la actividad</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="" required>
      <span class="text-danger"> <?php echo form_error('descripcion');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="validationDefault04" >Precio</label>
      <input type="text" class="form-control" id="precio" name="precio" value="$" required>
      <span class="text-danger"> <?php echo form_error('precio');?> </span>
    </div>
  </div>
  <div class="form-group">
    
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