<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Exito</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    

	<style type="text/css">
    nav {background-color: #28a745;}
    #titulo {color: white;}
    #administrativo,#actividad,#hospedaje {color: white;}
    a {color: white;}
	</style>
</head>
<body>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <img src="<?php echo base_url('/assets/img/logoGren.png'); ?>" width="140" height="230" class="display-4" alt=""> -->
    
    <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
    <hr class="my-4">
    <h1 class="display-4"><?php echo $listaMensaje['mensaje']?></h1>
    <p class="lead">Gracias por utilizar nuestra plataforma MeetLimon.
      </p>
      <a type="submit" href="<?php echo base_url($listaMensaje['url'])?>" class="btn btn-success">Continuar</a>
      <!-- <button type="submit" class="btn btn-primary">Volver al Inicio</button> -->
  </div>
</div>

</body>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-5">Contáctenos</h3>
    <hr class="my-4">
    <p class="lead">Teléfono: +506-2000000</p>
    <p class="lead">Correo: meet@limon.sa</p>
  </div>
</div>



<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; MeetLimon</small>
  </div>
</footer>

</html>