<!DOCTYPE html>
<html>
    <head>
        <title>OLER FUMIGACIONES</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos/oler.css">
        <meta charset="utf-8">
    </head>
    <body>
   
    
        <!--NAVEGACION Y LOS MODAL PARA INICIAR SESION, CREAR CUENTA DE CLIENTE Y DE EMPLEADO-->
        
    <?php session_start();include("script/verificacion.php"); include("nav.php");?>

<br>
        <div class="container">
            <div class="row justify-content-center" >
                <div><h2>Registro de citas</h2></div>
            </div>
            <br>
            <div class="row "> 
              <div class="col-md-5 col-sm-12 mr-auto">
                <div class="container">
                    Agendar nueva cita &nbsp <a type="button" class="btn btn-danger" href="agendar_citas.php">Agendar</a>
                </div>
              </div>
 
              <div class="col-1">&nbsp </div>
            </div>
            <br>
<?php
 if (isset($_SESSION["trabajador"]))
 {
  echo "<div class='table-responsive'>
  <table class='table'>
      <thead class='thead-dark'>
        <tr>
          <th scope='col'>Registro</th>
          <th scope='col'>Cliente </th>
          <th scope='col'>Fecha de servicio</th>
          <th scope='col'>Hora de servicio</th>
          <th scope='col'>Direccion</th>
          <th scope='col'>Problema</th>
          <th scope='col'>Ciudad</th>
          <th scope='col'>Certificado</th>
        </tr>
      </thead>
      <tbody>";
      include "script/database_trabajador.php";
    $db=new DatabaseT();
    $db->conectarDB();
    $busqueda_t= "SELECT * FROM registro_citas";
    $constancia=$db->seleccionar($busqueda_t);
    foreach($constancia as $value)
    {
      echo "<tr>
      <th scope='row'>".$value->reg."</th>
      <td>".$value->Cliente."</td>
      <td>".$value->fecha_servicio."</td>
      <td>".$value->hora_servicio."</td>
      <td>".$value->direccion."</td>
      <td>".$value->problema."</td>
      <td>".$value->ciudad."</td>
      <td>".$value->certificado."</td>
      </tr>";
    }
    echo "</tbody>
    </table>
    </div>";
    $db->desconectarDB();
 }
?>     <?php
 if (isset($_SESSION["cliente"]))
 {
  echo "<div class='table-responsive'>
  <table class='table'>
      <thead class='thead-dark'>
        <tr>
          <th scope='col'>Registro</th>
          <th scope='col'>Problema</th>
          <th scope='col'>Fecha de servicio</th>
          <th scope='col'>Hora de servicio</th>
          <th scope='col'>Direccion</th>
          <th scope='col'>Ciudad</th>
        </tr>
      </thead>
      <tbody>";
    $busqueda_t= "SELECT * FROM registros_citas_2 WHERE id_cuenta= ".$_SESSION['cve'];
    $constancia=$db->seleccionar($busqueda_t);
    foreach($constancia as $value)
    {
      echo "<tr>
      <th scope='row'>".$value->reg."</th>
      <td>".$value->problema."</td>
      <td>".$value->fecha_servicio."</td>
      <td>".$value->hora_servicio."</td>
      <td>".$value->direccion."</td>
      <td>".$value->ciudad."</td>
      </tr>";
    }
    echo "</tbody>
    </table>
    </div>";
    $db->desconectarDB();
 }
?> 
        </div>
        <br><br><br>
        <?php include("footer.php");?>
        <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"  crossorigin="anonymous"></script> 
        <script src="bootstrap/js/bootstrap.min.js"crossorigin="anonymous"></script>
    </body>
</html>