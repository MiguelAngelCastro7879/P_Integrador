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

<?php session_start(); include("script/verificacion.php"); include("nav.php");

   if(isset($_SESSION['trabajador']))
  {
  
?>

        <br>
        <form action="script/constancia.php" method="post" enctype="multipart/form-data">
          <div class="container">
            <div class="row">
              <div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <label for="cliente">Cliente: </label>
                            <?php 

                                include "script/database_trabajador.php";
                                $db=new DatabaseT();
                                $db->conectarDB();
                                echo "<select class='form-control' name='cliente' required>";
                                $busqueda_t= "SELECT cuentas.nombre, clientes.cve FROM cuentas inner join clientes on clientes.cuenta=cuentas.cve ";
                                $areas=$db->seleccionar($busqueda_t); 
                                foreach($areas as $value)
                                {
                                  echo "<option value='$value->cve'> $value->nombre</option>";
                                }
                                echo "</select>";
                                $db->desconectarDB();

                            ?>
                  </div>
              </div>
              <div class="col-md-5 col-sm-5">
                  <div class="form-group">
                  <label for="fecha">Fecha:</label>
                  <input type="date" class="form-control" name="fecha" id="fecha" required>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <label for="direccion">Direccion: </label>
                    <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Escriba la direccion" required>
                  </div>
              </div>
              <div class="col-md-5 col-sm-5">
                  <div class="form-group">
                    <label for="ciudades">Ciudad: </label>
                            <?php 

                                $db=new DatabaseT();
                                $db->conectarDB();
                                echo "<select class='form-control' name='ciudades' required>";
                                $busqueda_t= "SELECT * FROM ciudades";
                                $ciudad=$db->seleccionar($busqueda_t); 
                                foreach($ciudad as $value)
                                {
                                  echo "<option value='$value->cve'> $value->nombre</option>";
                                }
                                echo "</select>";
                                $db->desconectarDB();

                            ?>
                  </div>
              </div>
            </div>
            <!-- LISTO -->
            <hr>
            <div class="row" >
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <div class="btn-group">
                      <div class="dropdown">
                        <label for="areas">Area (s):</label>
                        <button class="btn btn-light dropdown-toggle" type="button" name="areas" id="areas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Selecciona el area
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php 
                                $db=new DatabaseT();
                                $db->conectarDB();
                                $busqueda_t= "SELECT * FROM `areas` ";
                                $areas=$db->seleccionar($busqueda_t); 
                                foreach($areas as $value)
                                {
                                  echo "<a class='dropdown-item'><input type='checkbox' name='area[]' value='$value->cve'> $value->nombre</a>";
                                }
                                $db->desconectarDB();

                            ?>
                        </div>
                      </div>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-sm-12">
                  <div class="form-group form-inline">
                    <label for="metodo_utilizado">Metodo utilizado: &nbsp </label>
                    <select class="form-control" name="metodo_utilizado" required>
                      <option value="aspersión">Aspersión</option>
                      <option value="nebulizacion">Nebulizacón</option>
                      <option value="otro">Otro</option>
                    </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <div class="dropdown">
                      <label for="pyc">Producto (s):</label>
                      <button class="btn btn-light dropdown-toggle" type="button" name="productos" id="pyc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Seleccione y rellene
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="row">
                          <div class="col-4">
                            <a class="dropdown-item">Producto</a>
                          </div>
                          <div class="col-6">
                            <a class="dropdown-item">Concentracion</a>
                          </div>
                        </div>
                            <?php 

                                $db=new DatabaseT();
                                $db->conectarDB();
                                $busqueda_t= "SELECT * FROM `productos` ";
                                $areas=$db->seleccionar($busqueda_t); 
                                foreach($areas as $value)
                                {
                                  echo "<div class='row'>
                                          <div class='col-4'>
                                            <a class='dropdown-item'><input type='checkbox' name='producto[]' value='$value->cve'> $value->nombre </a>
                                          </div>
                                          <div class='col-6'>
                                            <a class='dropdown-item'><input type='text' name='$value->cve' placeholder='Concentración'> </a>
                                          </div>
                                        </div>";
                                }
                                $db->desconectarDB();

                            ?>
                      </div>  
                    </div>
                  </div>
              </div>
              <div class="col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <div class="btn-group">
                    <div class="dropdown">
                        <label for="plagas">Plaga (s):</label>
                        <button class="btn btn-light  dropdown-toggle" type="button" name="plagas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Selecciona las plagas
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php 

                                $db=new DatabaseT();
                                $db->conectarDB();
                                $busqueda_t= "SELECT * FROM `plaga` ";
                                $plagas=$db->seleccionar($busqueda_t); 
                                foreach($plagas as $value)
                                {
                                  echo "<a class='dropdown-item'><input type='checkbox' name='plaga[]' value='$value->cve'> $value->nombre</a>";
                                }
                                $db->desconectarDB();

                            ?>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                  <div class="form-group  ">
                    <div class="dropdown">
                      <label for="inicio">Hora de inicio: </label>
                      <input type="time" name="inicio" class="form-control" required >  
                    </div>
                  </div>
              </div>
              <div class="col-md-6 col-sm-12">
                  <div class="form-group ">
                    <div class="dropdown">
                      <label for="termino">Hora de termino: </label>
                      <input type="time" name="termino" class="form-control" required  >  
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 col-sm-12">
                  <div class="form-group ">
                      <label for="reentrada">Tiempo de reentrada: </label>
                      <input type="text" name="reentrada" class="form-control" placeholder="Escriba el tiempo de reentrada" required >  
                  </div>
              </div>
              <div class="col-md-5 col-sm-12 col-12">
                <div class="form-group">
                  <div class="btn-group">
                    <div class="dropdown">
                        <label for="plagas">Tecnico (s) : </label> <br>
                        <button class="btn btn-light  dropdown-toggle" type="button" name="tecnicos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Selecciona los tecnicos
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php 

                                $db=new DatabaseT();
                                $db->conectarDB();
                                $busqueda_t= "SELECT trabajadores.cve,cuentas.nombre FROM cuentas inner join `trabajadores` on cuentas.cve=trabajadores.cuenta ";
                                $trabajadores=$db->seleccionar($busqueda_t);
                                foreach($trabajadores as $value)
                                {
                                  echo "<a class='dropdown-item'><input type='checkbox' name='trabajador[]' value='$value->cve'> $value->nombre</a>";
                                }
                                $db->desconectarDB();

                            ?>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-2 col-sm-4">
                Area limpia: 
                <div class="custom-control custom-radio">
                  <input type="radio" id="si" name="area_limpia" class="custom-control-input">
                  <label class="custom-control-label" for="si">Si</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="no" name="area_limpia" class="custom-control-input">
                  <label class="custom-control-label" for="no">No</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 col-sm-8">
                  <div class="form-group ">
                      <label for="observaciones">Observaciones: </label>
                      <textarea name="observaciones" class="form-control" cols="30" rows="3" placeholder="Escriba las observaciones" ></textarea>
                  </div>
              </div>
              <div class="col-md-4 col-sm-12">
                  <div class="form-group "> <br>
                      <label for="costo">Costo: </label>
                      <input type="text" name="costo" class="form-control" placeholder="Escriba el costo del servicio "  >  
                  </div>
              </div>
            </div>
            <div class="row  justify-content-center">
              <div class="col-6"><button type="success" class="btn btn-warning btn-lg btn-block">Guardar constancia</button>
              </div>
            </div>


          </div>
          </div>
        </form>
          
        <br>
<?php 
  } 
  else 
  { 
    header("Location: index.php");
  }
?>

  
        <br><br><br>
        <?php  include("footer.php");?>
        <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"  crossorigin="anonymous"></script> 
        <script src="bootstrap/js/bootstrap.min.js"crossorigin="anonymous"></script>
        
  
    </body>
</html>