<head>
	<meta charset="utf-8">
	<title>Panel Hospedaje</title>
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
    #cliente,#facturacion,#habitacion,#reservacion ,#salir{color: white;}
    a ,#icono{color: white;}
	</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?php echo base_url()?>PanelHospedaje/mostrarInicio"><h5 id="titulo">Panel de Hospedaje</h5></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <div class="dropdown">
        <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menú
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url()?>PanelHospedaje/registrarCliente">Registrar Cliente</a>
          <a class="dropdown-item" href="<?php echo base_url()?>PanelHospedaje/registrarHabitacion">Registrar Habitación</a>
          <a class="dropdown-item" href="<?php echo base_url()?>PanelHospedaje/registrarReservacion">Registrar Reservación</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url()?>PanelHospedaje/moduloFacturacion">Módulo Facturación</a>
          <a class="dropdown-item" href="<?php echo base_url()?>PanelHospedaje/registrarCliente">Reportes</a>
         
        </div>
      </div>  
      
   
    </ul>
  </div> 

  <div class="d-flex justify-content-end">
    <a id='icono'> <span class="fa fa-user-circle-o" aria-hidden="true"></span></a>
  </div>

  <div class="d-flex justify-content-end">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
    <div class="dropdown">
        <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $lista['nombreEmpresa'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url()?>Inicio/mostrarInicio">Cerrar Sesión</a>
          
         
        </div> 
     
    </ul>
  </div>  
  </div>
  
</nav>
