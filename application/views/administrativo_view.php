<!DOCTYPE html>

<div class="jumbotron jumbotron-fluid">

  <div class="container">
  <hr class="my-4">
    <h2 class="display-4">Servicios de hospedaje registrados</h2>
    
  <div class='table-wrapper-scroll-y my-custom-scrollbar'>
        <table class="table table-striped"  >
            <thead class="thead-light" id="headTabla">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cédula Jurídica</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfonos</th>
                    <th scope="col">Correo</th>
                    
                </tr>
            </thead>


            <tbody id="cuerpoTabla">
            <?php foreach ($listaHoteles as $item):?>
                    <tr>
                        <td><?php echo $item['Nombre'];?></td>
                        <td><?php echo $item['CedulaJuridica'];?></td>                    
                        <td><?php echo $item['direccion'];?></td>
                        <td><?php echo $item['telefonos'];?></td>
                        <td><?php echo $item['CorreoElectronico'];?></td>  
                        
                    </tr>
                   
                <?php endforeach;?>
                
               
                
            </tbody>
        </table>
        </div>

    
<br>
<br>
<br>

<hr class="my-4">
<h2 class="display-4">Actividades recreativas registradas</h2>
  <div class='table-wrapper-scroll-y my-custom-scrollbar'>
        <table class="table table-striped"  >
            <thead class="thead-light" id="headTabla">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de la empresa</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Tipo de actividad</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">

            <?php foreach ($listaActividades as $item):?>
                    <tr>
                        <td><?php echo $item['idActividad'];?></td>
                        <td><?php echo $item['nombreEmpresa'];?></td>   
                        <td><?php echo $item['NumeroTelefono'];?></td>
                        <td><?php echo $item['direccion'];?></td>  
                        <td><?php echo $item['tipoActividad'];?></td>  
                        
                    </tr>
                   
                <?php endforeach;?>
                

                
            </tbody>
        </table>
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