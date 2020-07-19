<!DOCTYPE html>
<html lang="en">
<body>
<title>MeetLimon-Hospedaje</title>

<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <img src="<?php echo base_url('/assets/img/logoGren.png'); ?>" width="140" height="230" class="display-4" alt="">
     -->
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h5 class="display-5">Habitaciones disponibles: </h5>
    

  </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
      <?php foreach ($listaHabitaciones as $item):?>
          <div class="col-md-4">
            <div class="mb-4 shadow-sm" >
                  <!-- <img src="<?php echo base_url('/assets/img/actividades.png'); ?>" class="card-img-top" alt=""> -->    
                  <img src=<?php echo $item['0'];?>  class="card-img-top" alt="" width="100%" height="225">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $item['Nombre'];?></h5>
                      <p class="card-text">Número de habitación: <?php echo $item['NumHabitacion'];?></p>
                      <p class="card-text">Descripcion: <?php echo $item['Descripcion'];?></p>
                      <p class="card-text">Tipo: <?php echo $item['Tipo'];?></p>
                      <!-- <p class="card-text">Comodidades: <?php echo $item['Nombre'];?></p> -->
                      <p class="card-text">Precio por noche: <?php echo $item['Precio'];?></p>

                      <a  href= "<?php echo base_url("Inicio/mostrarReservar/".$item['ID_Habitacion'])?>" class="btn btn-success">Reservar</a> 
                  </div>
              </div>
          </div>
        <?php endforeach;?>
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