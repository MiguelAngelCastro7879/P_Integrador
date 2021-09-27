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

    <form action="php/guardar_cita.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div><h2>¡¡¡AGENDA TU CITA AHORA!!!</h2></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 d-none d-sm-block">
                    <img src="imagenes/anuncio.jpg" class="img-fluid" >
                </div>
                <div class="col-md-6 col-sm-12">
                    <form action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="fecha">Fecha:</label>
                                    <input class="form-control" type="date" name="fecha" id="fecha">
                                </div>
                                <div class="col-6">
                                    <label for="hora">Hora:</label>
                                    <input class="form-control" type="time" name="hora" id="hora">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad: </label>
                            <select name="ciudad" id="ciudad" class="form-control">
                            <?php 
                                $busqueda_t= "SELECT * FROM `ciudades` ";
                                $plagas=$db->seleccionar($busqueda_t); 
                                foreach($plagas as $value)
                                {
                                  echo "<option value='$value->cve'>$value->nombre</option>";
                                }
                                $db->desconectarDB();

                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion:</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Escribe tu dirección">
                        </div>
                        <div class="form-group">
                          <label for="problema">Problema:</label>
                          <textarea class="form-control" name="problema" id="problema" rows="6" placeholder="Escriba el problema que tiene"></textarea>
                        </div>
                                      Solicitar certificado
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input class="form-check-input" type="radio" name="certificado" id="si" value="si">
                                          <label class="form-check-label" for="certificado">si</label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                          <input class="form-check-input" type="radio" name="certificado" id="no" value="no">
                                          <label class="form-check-label" for="certificado">no</label>
                                     </div>
                        <br>

                        <br>
                        <?php
                           if(isset($_SESSION["cliente"]))
                           {
                            echo "<div class='form-group'>
                                <button type='submit reset' class='btn btn-block btn-danger'>Agendar cita </button>
                                </div>";
                           }
                           
                           else if(isset($_SESSION["trabajador"]))
                           {
                            echo "<div class='form-group'>
                                <button type='submit reset' class='btn btn-block btn-danger' disabled>Agendar cita </button>
                                </div>
                                <div class='alert alert-danger' role='alert'>
                                  Para agendar una cita debes ingresar con una cuenta de cliente
                                </div>";
                           }

                        ?>
                    </form>
                </div>
            </div>
        </div>
    </form>


    <br><br><br>    
    <?php include("footer.php"); ?>
        <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"  crossorigin="anonymous"></script> 
        <script src="bootstrap/js/bootstrap.min.js"crossorigin="anonymous"></script>
  
    </body>
</html>