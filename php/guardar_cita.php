<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../estilos/oler.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
  </head>
  <body>
        <!--NAVEGACION Y LOS MODAL PARA INICIAR SESION, CREAR CUENTA DE CLIENTE Y DE EMPLEADO-->
        <?php session_start();include("nav.php");include '../script/database_cliente.php'; ?>
    <div align="center" class="container">
     <?php 
    $db=new DatabaseC();
    $db->conectarDB();
    extract($_POST);
    $query="SELECT cve from clientes where cuenta=".$_SESSION['cve'];
    $clave=$db->seleccionar($query);
    foreach($clave as $cve)
    {
        
    $insert="CALL guardar_cita('$problema','$fecha','$hora',$cve->cve,'$direccion',$ciudad,'$certificado')";
    $db->ejecutaSQL($insert);
            echo "<div class='alert alert-success'> <br><br><br> <h1>CITA AGENDADA</h1> <br> Puedes ver tu registro de citas <a href='../registro_citas.php'>AQUÍ</a><br><br><br>  </div>";
       
    }
    
        ?>
      
     

    </div>
    
    <br><br><br>
    
    <footer class="footer" style="background-color: black; color: white;">
            <div class="container">
                <br><br>
                <div class="row justify-content-center">
                    <div class="col-md-3 offset-md-2 d-none d-sm-block">
                        <img  src="../IMAGENES/oler.png" width="200" height="200">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <br> <h2>OLER FUMIGACIONES SA DE CV </h2>
                        
                        <p>Visitanos en nuestras instalaciones nos ubicamos en <br> Av Hacienda de la Laguna 489, Exhacienda la Perla, Torreón, Coah. <br>
                             Llamanos: 871 718 5011 <br> Correo electronico: <a>olerfumigaciones@hotmail.com</a></p>
                    </div>
                </div>
                <br><br>
            </div>
          </footer>
        <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"  crossorigin="anonymous"></script> 
        <script src="../bootstrap/js/bootstrap.min.js"crossorigin="anonymous"></script>
   </body>
</html>