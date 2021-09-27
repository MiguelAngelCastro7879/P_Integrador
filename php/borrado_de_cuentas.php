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

    <div align="center" class="container">
    <?php
    session_start();
        include "../script/database_cliente.php";
        $cliente=new DatabaseC();
    if(isset($_SESSION["cliente"]))
    {
        $cliente->conectarDB();
        $query="SELECT * from claves where cuenta=".$_SESSION["cve"];
        $datos=$cliente->seleccionar($query);
        foreach($datos as $value)
        {
          $borrar_constancia="UPDATE constancia_servicio SET cita=null where reg=$value->constancia";
          $cliente->ejecutaSQL($borrar_constancia);
          $borrar_cita="DELETE FROM `cita` WHERE cita.reg = $value->cita";
          $cliente->ejecutaSQL($borrar_cita);
          $borrar_cliente="DELETE FROM `clientes` WHERE clientes.cve = $value->cliente";
          $cliente->ejecutaSQL($borrar_cliente);
          $borrar_cuenta="DELETE FROM `cuentas` WHERE cuentas.cve = $value->cuenta";
          $cliente->ejecutaSQL($borrar_cuenta);

        }
        $cliente->desconectarDB(); 


    }
     else if(isset($_SESSION["trabajador"]))
        {
            $cliente->conectarDB();
            $query="SELECT * from claves_trabajadores where cuenta=".$_SESSION["cve"];
            $datos=$cliente->seleccionar($query);
            foreach($datos as $value)
            {
              $borrar_constancia="UPDATE tecnico_servicio SET tecnico=null where tecnico=$value->trabajador";
              $cliente->ejecutaSQL($borrar_constancia);
              $borrar_trabajador="DELETE FROM `trabajadores` WHERE trabajadores.cve = $value->trabajador";
              $cliente->ejecutaSQL($borrar_trabajador);
              $borrar_cuenta="DELETE FROM `cuentas` WHERE cuentas.cve = $value->cuenta";
              $cliente->ejecutaSQL($borrar_cuenta);
    
            }
            $cliente->desconectarDB();
    
    
        }
        $cliente->cerrarsesion();
        header("Location: ../index.php");
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
        
        <div class="modal fade" id="iniciarsesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Iniciar sesión</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="php/verificar_inicio_sesion.php" method="post">
                      <div class="modal-body">
                              <label for="Correo">Correo</label>
                              <input type="email" class="form-control" name="correo" placeholder="Escriba su correo">
                              <label for="contraseña">Contraseña</label>
                              <input type="password" class="form-control" name="contraseña" placeholder="Escriba una contraseña">
                              <a href=""><br>¿Olvidaste tu contraseña?</a>
                      </div>
                      <div class="modal-footer">
                        <button type="success" class="btn btn-success btn-lg btn-block">Iniciar Sesión</button>
                      </div>
                    </form>
                    </div>
                  </div>
              </div>
   </body>
</html>