<!DOCTYPE html>
<html lang="en">
<body>  

<title>MeetLimon-Actividades</title>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <img src="<?php echo base_url('/assets/img/logoGren.png'); ?>" width="140" height="230" class="display-4" alt=""> -->
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h1 class="display-4">Actividades Recreativas</h1>
    <h3 class="display-5">Filtros de búsqueda</h3>
    <form action="<?php echo base_url()?>Inicio/filtrarActividades" method="POST">
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="validationDefault04">Nombre de la empresa</label>
      <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa"  >
      <span class="text-danger"> <?php echo form_error('nombreEmpresa');?> </span>
    </div>
    <div class="form-group col-md-2">
   <label for="validationDefault04">Provincia:</label>
        <select class="custom-select" id="inputProvincia" name="inputProvincia" >
        <option  selected value="null"></option>
          <option  value="Limon">Limón</option>
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
      <input type="text" class="form-control" id="canton" name="canton" >
       <span class="text-danger"> <?php echo form_error('canton');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="validationDefault04">Tipo de actividad</label>
      <input type="text" class="form-control" id="tipo" name="tipo"  >
      <span class="text-danger"> <?php echo form_error('tipo');?> </span>
    </div>
    <div class="form-group col-md-2">
      <label for="validationDefault04" >Precio</label>
      <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio en colones" title="Precio en colones" >
      <span class="text-danger"> <?php echo form_error('precio');?> </span>
    </div>
</div>
    <button type="submit" class="btn btn-success">Buscar</button>
    <br>
    
  </form>
    
  </div>
</div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
      <?php if(empty($listaActividades)){?>
        <h3 class="display-5">No hay resultados</h3>
        <?php }else{?>
      <?php foreach ($listaActividades as $item):?>
          <div class="col-md-4">
            <div class="mb-4 shadow-sm" >  
                  <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/actividades.png" class="card-img-top" alt="" >
                  <div class="card-body">
                  <h5 class="card-title"><?php echo $item['nombreEmpresa'];?></h5>
                  
                    <p class="card-text">Descripcion: <?php echo $item['descripcion'];?></p>
                      <p class="card-text">Dirección: <?php echo $item['direccion'];?></p>
                      <p class="card-text">Teléfonos: <?php echo $item['NumeroTelefono'];?></p>
                      <!-- <p class="card-text">Correo: <?php echo $item['correo'];?></p> -->
                      <p class="card-text">Nombre de la persona a contactar: <?php echo $item['contacto'];?></p>
                      <p class="card-text">Precio: ₡ <?php echo $item['precio'];?></p>
                      <a  href="<?php echo base_url("Inicio/mostrarReservacionActividad/".$item['idActividad'])?>" class="btn btn-success">Reservar</a> 
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