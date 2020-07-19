<!DOCTYPE html>
<html lang="en">

<title>Bienvenido a MeetLimon</title>
<body>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <img src="<?php echo base_url('/assets/img/logoGren.png'); ?>" width="140" height="230" class="display-4" alt=""> -->
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h1 class="display-4">MeetLimon</h1>
    <p class="lead">MeetLimon es una página que permite al usuario encontrar diversas actividades para realizar en la zona de Limón, además le muestra al usuario diferentes opciones de hospedaje en esta misma Provincia.
	  </p>
  </div>
</div>

<div class="row">
  <div class="col-sm-3">  
    </div>
    <div class="col-sm-3">
      <div class="card">
        <!-- <img src="<?php echo base_url('/assets/img/hotel.png'); ?>" class="card-img-top" alt=""> -->
        
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/hotel.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Hospedaje</h5>
          <p class="card-text">Lista de hoteles,cabinas, casas y otras opciones de hospedaje disponibles en la provincia de Limón.</p>
          <a href="<?php echo base_url()?>Inicio/mostrarHoteles" class="btn btn-success">Ver opciones disponibles</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <!-- <img src="<?php echo base_url('/assets/img/actividades.png'); ?>" class="card-img-top" alt=""> -->
        
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/actividades.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Actividad Recreativa</h5>
          <p class="card-text">Lista de actividades recreativas, en zonas verdes,playas,montaña disponibles en la bella provincia de Limón.</p>
          <a  href="<?php echo base_url()?>Inicio/mostrarActividades" class="btn btn-success">Ver opciones disponibles </a> 
        </div>
      </div>
  </div>
</div>

<br>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-5">Contáctenos</h3>
    <hr class="my-4">
    <p class="lead">Teléfono: +506-2000000</p>
    <p class="lead">Correo: meet@limon.sa</p>
  </div>
</div>

</body>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; MeetLimon</small>
  </div>
</footer>

</html>