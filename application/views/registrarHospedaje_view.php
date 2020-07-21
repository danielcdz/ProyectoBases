<!DOCTYPE html>
<html lang="en">



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <img src="<?php echo base_url('/assets/img/logoGren.png'); ?>" width="140" height="230" class="display-4" alt=""> -->
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h1 class="display-4">Registrar servicio de Hospedaje</h1>
    <p class="lead">Ingrese la información requerida para registrar el servicio de Hospedaje </p>
    <form  action="<?php echo base_url()?>PanelAdministrativo/validarRegistroHospedaje" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombreHotel">Nombre del Hotel</label>
      <input type="text" class="form-control" id="nombreHotel" name="nombreHotel"  value="<?php echo set_value('nombreHotel'); ?>"required>
      <span class="text-danger"> <?php echo form_error('nombreHotel');?> </span>
    </div>
    <div class="form-group col-md-6">
      <label for="cedulaJuridica">Cédula Jurídica</label>
      <input type="number" class="form-control" id="cedulaJuridica" name="cedulaJuridica" value="<?php echo set_value('cedulaJuridica'); ?>"required>
      <span class="text-danger"> <?php echo form_error('cedulaJuridica');?> </span>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="telefono1">Teléfono 1</label>
      <input type="number" class="form-control" id="telefono1" name="telefono1"value="<?php echo set_value('telefono1'); ?>" required>
      <span class="text-danger"> <?php echo form_error('telefono1');?> </span>
    </div>
    <div class="form-group col-md-6">
      <label for="telefono2">Teléfono 2</label>
      <input type="number" class="form-control" id="telefono2" name="telefono2"value="<?php echo set_value('telefono2'); ?>" required>
      <span class="text-danger"> <?php echo form_error('telefono2');?> </span>
    </div>
    <div class="form-group col-md-6">
      <label for="correo">Correo </label>
      <input type="email" class="form-control" id="correo" name="correo"value="<?php echo set_value('correo'); ?>" required>
    </div>
  </div>
  <h5>Dirección</h5>
  <div class="form-row">
    <div class="form-group col-md-2">
    <label for="validationDefault04">Provincia:</label>
        <select class="custom-select" id="inputProvincia" name="inputProvincia" value="<?php echo set_value('inputProvincia'); ?>"required>
          
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
      <label for="canton">Cantón</label>
      <input type="text" class="form-control" id="canton" name="canton"value="<?php echo set_value('canton'); ?>" required>
      <span class="text-danger"> <?php echo form_error('canton');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="distrito">Distrito</label>
      <input type="text" class="form-control" id="distrito" name="distrito" value="<?php echo set_value('distrito'); ?>"required>
      <span class="text-danger"> <?php echo form_error('distrito');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="barrio">Barrio</label>
      <input type="text" class="form-control" id="barrio" name="barrio"value="<?php echo set_value('barrio'); ?>" required>
      <span class="text-danger"> <?php echo form_error('barrio');?> </span>
    </div>
    <div class="form-group col-md-4">
      <label for="sennas">Señas exactas</label>
      <input type="text" class="form-control" id="sennas" name="sennas" value="<?php echo set_value('sennas'); ?>"required>
      <span class="text-danger"> <?php echo form_error('sennas');?> </span>
    </div>
  </div>
  <h5>Redes Sociales(url)</h5>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="facebook">Facebook</label>
      <input type="text" class="form-control" id="facebook" name="facebook"value="<?php echo set_value('facebook'); ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="instagram">Instagram</label>
      <input type="text" class="form-control" id="instagram" name="instagram"value="<?php echo set_value('instagram'); ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="twitter">Twitter</label>
      <input type="text" class="form-control" id="twitter" name="twitter"value="<?php echo set_value('twitter'); ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="airbnb">Airbnb</label>
      <input type="text" class="form-control" id="airbnb" name="airbnb"value="<?php echo set_value('airbnb'); ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="youtube">Youtube</label>
      <input type="text" class="form-control" id="youtube" name="youtube"value="<?php echo set_value('youtube'); ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="sitioWeb">URL sitio web(en caso de tener)</label>
    <input type="text" class="form-control" id="sitioweb" name="sitioWeb"value="<?php echo set_value('sitioWeb'); ?>" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="tipo">Tipo</label>
      <select id="tipo"  name="tipo" class="form-control">
        <option selected>Hotel</option>
        <option>Hostal</option>
        <option>Casa</option>
        <option>Departamento</option>
        <option>Cuarto compartido</option>
        <option>Cabaña</option>
      </select>
    </div>
    <div class="form-group col-md-8">
      <label for="referenciaGPS">Referencia GPS</label>
      <input type="text" class="form-control" id="referenciaGPS" name="referenciaGps" value="<?php echo set_value('referenciaGps'); ?>"required>
      <span class="text-danger"> <?php echo form_error('referenciaGps');?> </span>
    </div>
    
  </div>
  <h5>Servicios</h5>
  <div class="form-row">
  <!-- <div class="form-group col-md-6"> -->
    
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="restaurante"  name="restaurante" value="1">
            <label class="custom-control-label" for="restaurante">Restaurante</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="piscina" name="piscina"  value="1">
            <label class="custom-control-label" for="piscina">Piscina</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="bar" name="bar"  value="1">
            <label class="custom-control-label" for="bar">Bar</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="rancho"  name="rancho" value="1">
            <label class="custom-control-label" for="rancho">Rancho</label>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="casino" name="casino" value="1">
            <label class="custom-control-label" for="casino">Casino</label>
        </div>
    </div>
  <!-- </div> -->
    
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