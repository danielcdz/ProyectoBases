<!DOCTYPE html>
<html lang="en">
<body>
<title>MeetLimon-Hospedaje</title>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <img src="<?php echo base_url('/assets/img/logoGren.png'); ?>" width="140" height="230" class="display-4" alt=""> -->
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    
    <h1 class="display-4">Opciones de Hospedaje</h1>
    <h3 class="display-5">Filtros de búsqueda</h3>
    <form  action="<?php echo base_url()?>Inicio/filtrarHospedaje" method="POST">
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="validationDefault04">Provincia:</label>
            <select class="custom-select" id="inputProvincia" name="inputProvincia" >
              <option selected value="null"></option>
              <option  value="Limon">Limón</option>
              <option value="Cartago">Cartago</option>
              <option value="San Jose">San Jose</option>
              <option value="Alajuela">Alajuela</option>
              <option value="Heredia">Heredia</option>
              <option value="Puntarenas">Puntarenas</option>
              <option value="Guanacaste">Guanacaste</option>
            </select>
      </div>
      <!-- </div> -->

    

      <div class="form-group col-md-2">
        <label for="canton">Cantón</label>
        <input type="text" class="form-control" id="canton" name="canton"  >
        <span class="text-danger"> <?php echo form_error('canton');?> </span>
      </div>


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

  </div>

  <h4 class="display-5">Servicios</h4>
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

    </div>
    <button type="submit" class="btn btn-success">Buscar</button>
    <br>
    <br>
  </form>
  
</div>

<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php if(empty($listaHoteles)){?>
        <h3 class="display-5">No hay resultados</h3>
        <?php }else{?>
        <?php foreach ($listaHoteles as $item):?>
          <div class="col-md-4">
            <div class="mb-4 shadow-sm" >  
                  <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/hotel.png" class="card-img-top" alt="" >
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $item['Nombre'];?></h5>
                      <p class="card-text">Tipo: <?php echo $item['TipoEmpresa'];?></p>
                      <p class="card-text" title="Provincia,Cantón,Distrito,Barrio,Señas exactas" >Dirección: <?php echo $item['direccion'];?></p>
                      <p class="card-text">Teléfonos: <?php echo $item['telefonos'];?></p>
                      <p class="card-text">Correo: <?php echo $item['CorreoElectronico'];?></p>
                      <p class="card-text">Servicios disponibles: <?php echo $item['0'];?></p>
                      <!-- <p class="card-text">Precio máximo por noche: <?php echo $item['precioMax'];?></p>
                      <p class="card-text">Precio mínimo por noche: <?php echo $item['precioMin'];?></p> -->
                      <a  href="<?php echo base_url("Inicio/mostrarInfoHotel/".$item['CedulaJuridica'])?>" class="btn btn-success">Habitaciones disponibles</a> 
                  </div>
              </div>
          </div>
          <?php endforeach;?>
          <?php };?>
          
      </div>
    </div>
  </div>

<br>
</body>


<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; MeetLimon</small>
  </div>
</footer>

</html>