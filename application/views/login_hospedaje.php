<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Hospedaje</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input{
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

    </style>
<body class="text-center">
    <!-- <form class="form-signin">
  <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
  <hr>
  <h1 class="h3 mb-3 font-weight-normal">Panel de Hospedaje</h1>
  <label for="inputEmail" class="sr-only">Nombre de usuario</label>
  <input id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
  <label for="inputPassword" class="sr-only">Contraseña</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Clave" required>
  
  <a  href="<?php echo base_url()?>LoginHospedaje/validarInicio" class="btn btn-success"><h6>Ingresar </h6></a> 
  <p class="mt-5 mb-3 text-muted">&copy; MeetLimon</p>
</form> -->


<form   class="form-signin" action="<?php echo base_url()?>LoginHospedaje/validarInicio" method="POST">
  <img src="https://juxl9zsvlzaqrmii2zyu1q-on.drv.tw/proyecto1/assets/img/logoGren.png" width="140" height="230" class="display-4" alt="">
  <hr>
  <h1 class="h3 mb-3 font-weight-normal">Panel de hospedaje</h1>
  <label for="inputEmail" class="sr-only">Cédula Jurídica</label>
  <input id="cedula" name="cedula" class="form-control" placeholder="Número de cédula" required autofocus  >
  <span class="text-danger"> <?php echo form_error('cedula');?> </span>
 
  <!-- <label for="inputPassword" class="sr-only">Contraseña</label>
  <input type="password" id="clave" name="clave" class="form-control" placeholder="Clave" required>
  <span class="text-danger"> <?php echo form_error('clave');?> </span> -->
  <!-- <button class="btn btn-lg btn-success btn-block" type="submit" href="inicio_view.php">Ingresar</button> -->
  <!-- <a type="submit" class="btn btn-success"><h6>Ingresar </h6></a>  -->
  <br>
  <button type="submit" class="btn btn-success"> Ingresar</button>
  <p class="mt-5 mb-3 text-muted">&copy; MeetLimon</p>
</form>


</body>

</html>