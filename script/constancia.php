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
            <nav class="navbar navbar-light navbar-expand-lg sticky-top justify-content-between navcolor" role="tablist" >
                <a class="navbar-brand" href="../index.php">
                  <img src="../IMAGENES/oler.png" width="60" height="60" alt="">&nbsp&nbsp OLER
                </a> <!--logo y nombre de empresa-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                  <div class="navbar-nav ">
                    <a class="nav-item nav-link " href="../index.php" id="inicio-tab">INICIO </a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="citas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CITAS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="citas">
                              <a class="dropdown-item" href="../agendar_citas.php">Agendar citas</a>
                              <a class="dropdown-item" href="../registro_citas.php">Ver registro de citas</a>
                            </div>
                        </li>
                    </ul>
                    
                    <a class="nav-item nav-link" href="../servicios.php" id="inicio-tab">SERVICIOS </a>
                  </div> <!--elementos alineados a la izquierda (Inicio, citas y constancia-->

                  <div class="nav-item ml-auto"> 
                    <a href="https://www.facebook.com/Oler-Fumigaciones-172965636145/">
                        <img src="../imagenes/social-facebook-icon_34352.png" width="40" height="40">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=528713161843&text=Hola!%20Somos%20una%20empresa%20de%20fumigaciones%20reconocida%20en%20toda%20la%20regi%C3%B3n%20Laguna%20">
                        <img src="../imagenes/whatsapp_icon-icons.com_53606.png" width="40" height="40" alt="">
                    </a>&nbsp
                  </div>
            </nav>
<br><br><br>
<div class="container">
<?php 
$constancia_registada=0;
include "database_trabajador.php";
$db=new DatabaseT();
$db->conectarDB();
extract($_POST);
$cita_b="SELECT reg from cita  where cliente=$cliente and fecha_servicio='$fecha' and direccion='$direccion'";
$cita=$db->seleccionar($cita_b);
foreach($cita as $value)
{
        $constancia_b="INSERT INTO `constancia_servicio`(`h_inicio`, `h_termino`, `m_empleado`, `cita`, `area_limpia`, `observaciones`, `t_reentrada`, `costo`) VALUES ('$inicio','$termino','$metodo_utilizado',$value->reg,'$area_limpia','$observaciones','$reentrada','$costo')";
        $db->ejecutaSQL($constancia_b);
        $reg="SELECT reg from constancia_servicio where cita=$value->reg";
        $cons=$db->seleccionar($reg);
        foreach($cons as $constancia)
        {
            foreach($_POST['area'] as $area)
            {	
                $insert_area="INSERT into servicio_area values ($constancia->reg,$area)";
                $db->ejecutaSQL($insert_area);
            }
            foreach($_POST['trabajador'] as $trabajador)
            {	
                $insert_tecnico="INSERT into tecnico_servicio values ($constancia->reg,$trabajador)";
                $db->ejecutaSQL($insert_tecnico);
            }
            foreach($_POST['plaga'] as $plaga)
            {	
                $insert_plaga="INSERT into servicio_plaga values ($constancia->reg,$plaga)";
                $db->ejecutaSQL($insert_plaga);
            }
            foreach($_POST['producto'] as $productos)
            {	
                    $busqueda_t= "SELECT * FROM `productos` where cve=$productos ";
                    $p=$db->seleccionar($busqueda_t); 
                    foreach($p as $si)
                    { 
                        $insert_producto="INSERT into servicio_producto (servicio, producto, concentracion) values ($constancia->reg,$productos,'".$_POST[$si->cve]."')";
                        $db->ejecutaSQL($insert_producto);
                    }

               
            }
            $constancia_registada++;
        }
}
if($constancia_registada==1)
{
    echo "<div class='alert alert-success'> <br><br><br> <h1>CONSTANCIA REGISTRADA</h1> <br> Puedes ver las constancias <a href='../servicios.php'>AQUÍ</a><br><br><br>  </div>"; 

}else
{
    echo "<div class='alert alert-danger'> <br><br><br> <h1>ERROR AL REGISTRAR LA CONSTANCIA </h1><br>(Esto se puede deber a que no existe una cita de esta constancia) <br> Puedes ver las constancias <a href='../servicios.php'>AQUÍ</a><br><br><br>  </div>";
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