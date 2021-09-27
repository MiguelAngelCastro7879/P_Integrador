<!DOCTYPE html>
<html>
    <head>
        <title>OLER FUMIGACIONES</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos/oler.css">
        <meta charset="utf-8">
    </head>
    <body>
    <?php session_start(); include("nav.php");?>

<!--P1-->
        </div>
          <!--Carrouselde imagenes-->
          <br>
          <div class="col-md-12  text-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="imagenes/fumigaciones.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="IMAGENES/contact.jpg"  alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="IMAGENES/fumigaciones.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <!--¿QUIENES SOMOS?-->
          <br>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-10 col-sm-10 card">
                <br>
                <h4  >¿QUIENES SOMOS?</h4>
                <p>
                  Somos una empresa en control de plagas en la que trabajan expertos en el control de roedores, aracnidos
                  chinches, roedores y de cualquier plaga completamente capacitados con las herramientas necesarias para 
                  realizar trabajos de campo, empresariales y particulares. Nosotros contamos con mas de 30 años de 
                  experiencia validados gracias a empresas reconocidas como Lala y Chilchota
                </p>
                <div class="text-center col-md-8 col-sm-8 offset-md-2" >
                  <img src="IMAGENES/contacto.jpg" class="img-fluid">
                </div><br>
              </div>
            </div>
          </div>
          
              <!--Servicios-->
          <br>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-10 col-sm-10 card ">
                <div class="container">
                  <div class="row">
                    <br>
                    <div class="col-md-6 col-sm-12">
                      <br>
                      <img class="img-fluid" src="imagenes/servicios.jpg" width="400" height="400">
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <br>
                      <h4> Nosotros tratamos con todo, realizamos servicios de control de:</h4>
                      <ul>
                        <li>Garrapatas</li>
                        <li>Aracnidos</li>
                        <li>Cucarachas</li>
                        <li>Roedores</li>
                        <li>Pulgas</li>
                        <li>Entre otras plagas más</li>
                      </ul>
                      <h4>Además realizamos sanitización y limpieza contra el COVID-19</h4><BR></BR>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php 
  if(isset($_SESSION['trabajador']))
  { 
  } 
  else if(isset($_SESSION['cliente']))
  {
  }
  else
  {
?>
          <!--Registrate-->
          <br>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-10 col-sm-10 card ">
                <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-sm-7"> 
                      <br>
                      <h2>¿Cansado de las plagas?</h2>
                      <h4>¡¡Registrate para poder contacttarnos y que nosotros nos encarguemos!!</h4>
                      <br>
                    </div>
                    <div class="col-md-4 col-sm-5">
                      <br><br><br>
                      <button type="button" class="btn btn-block btn-danger"  data-toggle="modal" data-target="#crearcuenta_c">REGISTRARSE</button>
                      <br>
                    </div>
                  </div>
                </div>
               </div>
            </div>
         </div>
          <!--Contenedor3-->        
          <br>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-10 col-sm-10 card ">
                <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-sm-7"> 
                      <br>
                      <h2>¿YA TIENES CUENTA?</h2>
                      <h4>¡¡¡Agenda tu cita y contactanos, nosotros vamos a ayudarte con las molestas plagas!!!</h4>
                      <br>
                    </div>
                    <div class="col-md-4 col-sm-5">
                      <br><br><br>
                      <button type="button" class="btn btn-block btn-danger"  data-toggle="modal" data-target="#iniciarsesion">INICIA SESIÓN</button>
                      <br>
                    </div>
                  </div>
                </div>
               </div>
            </div>
         </div>
<?php } ?>
            </div><br><br><br>
<?php include("footer.php");?>

          
              <!-- Modal para Iniciar sesion-->
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
                      </div>
                      <div class="modal-footer">
                        <button type="success" class="btn btn-success btn-lg btn-block">Iniciar Sesión</button>
                      </div>
                    </form>
                    </div>
                  </div>
              </div>
              <!-- Modal para crear -->
              <div class="modal fade" id="crearcuenta_e" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Crear Cuenta de Empleado</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="php/guardar_perfil_trabajador.php" method="post">
                      <div class="modal-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre completo" required>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="Correo">Correo</label>
                                  <input type="email" class="form-control" name="correo" placeholder="Escriba su correo" required >
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="contraseña">Contraseña</label>
                                    <input type="password" class="form-control" name="contraseña" placeholder="Escriba una contraseña" required >
                                  </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-5">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" name="celular" placeholder="Escriba su numero de celular"required>
                                  </div>
                                <div class="form-group col-md-3">
                                  <label for="Edad">Edad</label>
                                  <input type="text" class="form-control" name="edad" placeholder="Escriba su edad"required>
                                </div>
                                <div class="form-group col-md-4">
                                    
                                        <label for="sexo">Sexo</label>
                                        <div id="sexo"><div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="sexo" id="hombre" value="hombre"required>
                                          <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="sexo" id="mujer" value="mujer"required>
                                          <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                        </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="cedula"><br>Cedula (este campo es opcional)</label>
                                    <input type="text" class="form-control" name="cedula" placeholder="Escriba su cedula">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="codigo">Codigo de activacion <br>(este codigo se le brindó en la oficina)</label>
                                    <input type="text" class="form-control" name="verificado" placeholder="Escriba el codigo de verificacion"required>
                                  </div>
                                </div>                  
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="success" class="btn btn-primary">Crear Cuenta</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal para crear cuenta de clientes-->
              <div class="modal fade bd-example-modal-lg" id="crearcuenta_c" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Crear Cuenta de Cliente</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    
                    </div>
                  <form action="php/guardar_perfil_cliente.php" method="post">
                      <div class="modal-body">              
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre completo">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="Correo">Correo</label>
                                  <input type="email" class="form-control" name="correo" placeholder="Escriba su correo">
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="contraseña">Contraseña</label>
                                    <input type="password" class="form-control" name="contraseña" placeholder="Escriba una contraseña">
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="celular">Celular</label>
                                  <input type="text" class="form-control" name="celular" placeholder="Escriba su numero de celular">
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="t_cliente">Tipo de cliente</label>
                                      <div><div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="t_cliente" id="empresa" value="empresa">
                                          <label class="form-check-label" for="inlineRadio1">Empresa</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="t_cliente" id="particular" value="particular">
                                          <label class="form-check-label" for="inlineRadio2">Particular</label>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Escriba su direccion">
                                  </div>
                                </div>     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="success" name="cc" class="btn btn-primary" >Crear cuenta</button>
                      </div>
                  </form>
                  </div>
                </div>
              </div> 

        <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"  crossorigin="anonymous"></script> 
        <script src="bootstrap/js/bootstrap.min.js"crossorigin="anonymous"></script>
    </body>
</html>