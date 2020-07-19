<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Panel Administrativo</title>
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
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?php echo base_url()?>PanelAdministrativo/administrativo"><h5 id="titulo">Panel Administrativo</h5></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a id="hospedaje" class="nav-link" href="<?php echo base_url()?>PanelAdministrativo/registrarHospedaje">Registrar Hospedaje</a>
      </li> 
      <li class="nav-item">
        <a id="actividad" class="nav-link" href="<?php echo base_url()?>PanelAdministrativo/registrarActividad">Registrar Actividad</a>
      </li> 
     
    </ul>
  </div> 

  <div class="d-flex justify-content-end">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a id="administrativo" class="nav-link" href="<?php echo base_url()?>PanelAdministrativo/salir">Salir</a>
      </li> 
    
     
    </ul>
  </div>  
  </div>

  
</nav>