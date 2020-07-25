<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema de Contactos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>


<style>
       #mensaje {color: #6BEA44;}
</style>

<body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="<?php echo base_url()?>Inicio/mostrarInicio"><h5>Contactos</h5></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">+ Agregar contacto</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0" action="<?php echo base_url()?>Inicio/mostrarFiltrados" method="POST">
      <input class="form-control mr-sm-2" type="text"  id="nombreFiltrar" name="nombreFiltrar"  placeholder="Buscar contacto" aria-label="Buscar contacto">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-6">Contactos registrados:</h1>
      <h4 id="mensaje" class="display-5"> <?php echo $msg;?></h4>
      <hr class="my-4">
    </div>


    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php foreach ($listaContactos as $item):?>
            <div class="col-md-4">
              <div class="card mb-3 shadow-sm">
                  <img src="<?php echo base_url('/assets/img/contacto2.png'); ?>" width="215" height="225" class="display-4" alt="">
                    <div class="card-body">
                        <h5  class="card-title">Nombre: <?php echo $item['nombre'];?></h5>
                        <h5  class="card-title">Apellido: <?php echo $item['apellido'];?></h5>   
                        <p class="card-text">Teléfono 1: <?php echo $item['telefono1'];?></p>
                        <p class="card-text">Teléfono 2: <?php echo $item['telefono2'];?></p>
                        <p class="card-text">Correo: <?php echo $item['correo'];?></p>
                        <p  class="card-text">Profesión: <?php echo $item['profesion'];?></p> 
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url("Inicio/eliminarContacto/".get_object_vars($item['_id'])['$id'])?>"><button type="button"  class="btn btn-sm btn-danger">Eliminar</button></a>
                             
                        <p id="id" hidden><?php echo get_object_vars($item['_id'])['$id'];?></p>    
                              <button   data-toggle="modal" data-target="<?php echo '#modal'.get_object_vars($item['_id'])['$id'];?>"  type="button" class="btn btn-sm btn-info">Editar</button>
                            </div>
                        </div>        
                    </div>  

                    <div class="modal fade"  id="<?php echo 'modal'.get_object_vars($item['_id'])['$id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Editar información contacto</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url("Inicio/editarContacto/".get_object_vars($item['_id'])['$id'])?>" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <strong><label for="validationDefault04">Nombre:</label></strong>
                                            <input type="text" class="form-control" id="nombreE" name="nombreE"  value="<?php echo $item['nombre'];?>"  required />
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <strong><label for="validationDefault04">Apellido:</label></strong>
                                            <input type="text" class="form-control" id="apellidoE" name="apellidoE"value="<?php echo $item['apellido'];?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <strong><label for="validationDefault04">Teléfono 1:</label></strong>
                                            <input type="text" class="form-control" id="telefono1E" name="telefono1E"   value="<?php echo $item['telefono1'];?>" required />
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <strong><label for="validationDefault04">Teléfono 2:</label></strong>
                                            <input type="text" class="form-control" id="telefono2E" name="telefono2E" value="<?php echo $item['telefono2'];?>" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <strong><label for="validationDefault04">Correo:</label></strong>
                                            <input type="email" class="form-control" id="correoE" name="correoE"   value="<?php echo $item['correo'];?>" required />
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <strong><label for="validationDefault04">Profesión:</label></strong>
                                            <input type="text" class="form-control" id="profesionE" name="profesionE"   value="<?php echo $item['profesion'];?>" required />
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <?php endforeach;?>
    
        </div>
    </div>

</div>



  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Registrar nuevo contacto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url()?>Inicio/registrarContacto" method="POST">
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <strong><label for="validationDefault04">Nombre:</label></strong>
                        <input type="text" class="form-control" id="nombre" name="nombre"    required />
                    </div>
                    <div class="col-md-5 mb-3">
                        <strong><label for="validationDefault04">Apellido:</label></strong>
                        <input type="text" class="form-control" id="apellido" name="apellido" required/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <strong><label for="validationDefault04">Teléfono 1:</label></strong>
                        <input type="text" class="form-control" id="telefono1" name="telefono1"    required />
                    </div>
                    <div class="col-md-5 mb-3">
                        <strong><label for="validationDefault04">Teléfono 2:</label></strong>
                        <input type="text" class="form-control" id="telefono2" name="telefono2"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <strong><label for="validationDefault04">Correo:</label></strong>
                        <input type="email" class="form-control" id="correo" name="correo"    required />
                    </div>
                    <div class="col-md-5 mb-3">
                        <strong><label for="validationDefault04">Profesión:</label></strong>
                        <input type="text" class="form-control" id="profesion" name="profesion"    required />
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </div>


</html>