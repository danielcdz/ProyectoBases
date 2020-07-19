<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <title>Bienvenido a MeetLimon</title> -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    

	<style type="text/css">
    nav {background-color: #28a745;}
    #titulo {color: white;}
    #administrativo,#hospedaje {color: white;}
    #iniciarSesion{color: yellow
    
    ;}
    a {color: white;}
	</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?php echo base_url()?>Inicio/mostrarInicio"><h5 id="titulo">MeetLimon</h5></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <div class="dropdown">
        <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="registrarHospedaje_view.php">Registrar Hospedaje</a>
          <a class="dropdown-item" href="registrarActividad_view.php">Registrar Actividad</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Reservaciones</a>
        </div>
      </div>          -->
      <li class="nav-item">
        <a id="administrativo" class="nav-link" href="<?php echo base_url()?>Inicio/mostrarLoginAdministrativo">Panel Administrativo</a>
      </li> 
      
      <li class="nav-item">
        <a id="hospedaje" class="nav-link" href="<?php echo base_url()?>Inicio/mostrarLoginHospedaje">Panel de Hospedaje</a>
      </li> 
      <li class="nav-item">
        <a id="iniciarSesion" class="nav-link" href="<?php echo base_url()?>Inicio/mostrarLoginUsuario"> <?php if($lista['nombreUsuario']!='vacio') echo $lista['nombreUsuario'];else {echo('Iniciar Sesión');}?></a>
      </li> 
      <li class="nav-item">
        <a id="iniciarSesion" class="nav-link" href="<?php echo base_url()?>Inicio/cerrarSesion"><?php if($lista['nombreUsuario']=='vacio') echo '';else {echo('Cerrar Sesión');}?></a>
      </li> 
    </ul>
  </div> 

  <div class="d-flex justify-content-end">
    <!-- <img src="<?php echo base_url('/assets/img/insta.png'); ?>" width="35" height="35" class="display-4" alt=""> -->
   <a href="https://www.instagram.com/?hl=es-la"> <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/insta.png" width="35" height="35" class="display-4" alt=""></a>
  </div>
  <div class="d-flex justify-content-end">
    <!-- <img src="<?php echo base_url('/assets/img/facebook.png'); ?>" width="35" height="35" class="display-4" alt=""> -->
    
    
    <a href="https://es-la.facebook.com/"> <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/facebook.png" width="35" height="35" class="display-4" alt=""> </a>
  </div>
  <div class="d-flex justify-content-end">
    <!-- <img src="<?php echo base_url('/assets/img/twiter.png'); ?>" width="35" height="35" class="display-4" alt=""> -->
    
   
    <a  href="https://twitter.com/?lang=es"> <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/twiter.png" width="35" height="35" class="display-4" alt=""> </a>
  </div>
</nav>

</html>