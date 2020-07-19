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
    
  </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php foreach ($listaHoteles as $item):?>
          <div class="col-md-4">
            <div class="mb-4 shadow-sm" >  
                  <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/hotel.png" class="card-img-top" alt="" >
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $item['Nombre'];?></h5>
                      <p class="card-text">Dirección: <?php echo $item['direccion'];?></p>
                      <p class="card-text">Teléfonos: <?php echo $item['telefonos'];?></p>
                      <p class="card-text">Correo: <?php echo $item['CorreoElectronico'];?></p>
                      <!-- <p class="card-text">Servicios disponibles: <?php echo $item['servicios'];?></p> -->
                      <!-- <p class="card-text">Precio máximo por noche: <?php echo $item['precioMax'];?></p>
                      <p class="card-text">Precio mínimo por noche: <?php echo $item['precioMin'];?></p> -->
                      <a  href="<?php echo base_url("Inicio/mostrarInfoHotel/".$item['CedulaJuridica'])?>" class="btn btn-success">Habitaciones disponibles</a> 
                  </div>
              </div>
          </div>
          <?php endforeach;?>
          
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