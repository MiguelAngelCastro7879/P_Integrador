
        <!--NAVEGACION Y LOS MODAL PARA INICIAR SESION, CREAR CUENTA DE CLIENTE Y DE EMPLEADO-->
        <div>
            <!--Barra de navegacion--> 
            <nav class="navbar navbar-light navbar-expand-lg sticky-top justify-content-between navcolor" role="tablist" >
                <a class="navbar-brand" href="index.php">
                  <img src="IMAGENES/oler.png" width="60" height="60" alt="">&nbsp&nbsp OLER
                </a> <!--logo y nombre de empresa-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                  <div class="navbar-nav ">
                    <a class="nav-item nav-link " href="index.php" id="inicio-tab">INICIO </a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="citas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CITAS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="citas">
                              <a class="dropdown-item" href="agendar_citas.php">Agendar citas</a>
                              <a class="dropdown-item" href="registro_citas.php">Ver registro de citas</a>
                            </div>
                        </li>
                    </ul>
                    
                    <a class="nav-item nav-link" href="servicios.php" id="inicio-tab">SERVICIOS </a>
                  </div> <!--elementos alineados a la izquierda (Inicio, citas y constancia-->

                  <div class="nav-item ml-auto "> 
                    <a href="https://www.facebook.com/Oler-Fumigaciones-172965636145/">
                        <img src="imagenes/social-facebook-icon_34352.png" width="40" height="40">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=528713161843&text=Hola!%20Somos%20una%20empresa%20de%20fumigaciones%20reconocida%20en%20toda%20la%20regi%C3%B3n%20Laguna%20">
                        <img src="imagenes/whatsapp_icon-icons.com_53606.png" width="40" height="40" alt="">
                    </a>&nbsp
<?php
  if(isset($_SESSION['trabajador']))
  {
    echo "<div class='btn-group dropleft float-right'>
    <button type=button' class=' btn btn-danger dropdown-toggle navcolor' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      <img src='imagenes/usuario.png' width='50' height='50' alt='".$_SESSION['trabajador']."'>
    </button>
    <div class='dropdown-menu'>
        <a class='dropdown-item'>".$_SESSION['trabajador']. "</a>
        <div class='dropdown-divider'></div>
        <a class='dropdown-item' data-toggle='modal' data-target='#editarcuenta'>Editar perfil</a>
        <a class='dropdown-item' href='script/cerrar_sesion.php'>[CERRAR SESION]</a>
    </div>
    </div>";
  }
  else if(isset($_SESSION['cliente']))
  {
    echo "<div class='btn-group dropleft float-right'>
    <button type=button' class='btn btn-danger dropdown-toggle navcolor' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      <img src='imagenes/usuario.png' width='50' height='50' alt='".$_SESSION['cliente']."'>
    </button>
    <div class='dropdown-menu'>
        <a class='dropdown-item'>".$_SESSION['cliente']. "</a>
        <div class='dropdown-divider'></div>
        <a class='dropdown-item' data-toggle='modal' data-target='#editarcuenta'>Editar perfil</a>
        <a class='dropdown-item' href='script/cerrar_sesion.php'>[CERRAR SESION]</a>
    </div>
    </div>";
  }
  else{

?> <!--BOTÒN DE PERFIL--> 
  

                  
                   <div class="nav-item float-right">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Crear cuenta
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#crearcuenta_c">Crear cuenta de cliente</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#crearcuenta_e">Crear cuenta de empleado</a>
                      </div>
                    </div> <!--crear cuentas-->
                    
                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#iniciarsesion"> Iniciar Sesion</button> <!--inicio sesions-->

                 
 <?php } ?> 
                  </div> <!--elementos alineados a la derecha -->
 
              </nav>
 
        </div>
        
        <div class="modal fade" id="editarcuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
         <?php

         include "script/database_cliente.php";
         $db=new DatabaseC();
         $db->conectarDB();
         if(isset($_SESSION["trabajador"]))
         { 
          $busqueda="SELECT * from cuentas inner join trabajadores on trabajadores.cuenta=cuentas.cve where cuentas.cve=".$_SESSION["cve"] ;
          $datos=$db->seleccionar($busqueda);
          foreach($datos as $value)
          {
           ?>
                      <h5 class="modal-title" id="exampleModalLabel">Editar datos de Empleado</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="php/edicion_de_cuentas.php" method="post">
                      <div class="modal-body">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre completo" required <?php echo "value='$value->nombre'"?> >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="Correo">Correo</label>
                                  <input type="email" class="form-control" name="correo" placeholder="Escriba su correo" required <?php echo "value='$value->correo'"?> >
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" name="celular" placeholder="Escriba su numero de celular"required <?php echo "value='$value->telefono'"?>>
                                  </div>
                              </div>               
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="success" name="cc" class="btn btn-primary mr-auto" >Guardar datos</button>
                  </form>
                  
                        <form action="php/borrado_de_cuentas.php" method="post">
                           <button type="success" class="btn btn-danger " >Borrar cuenta</button>
                        </form>
                     </div>
         <?php }}
         else if (isset($_SESSION["cliente"]))
         {
           $busqueda="SELECT * from cuentas inner join clientes on clientes.cuenta=cuentas.cve where cuentas.cve=".$_SESSION["cve"] ;
           $datos=$db->seleccionar($busqueda);
           foreach($datos as $value)
           {
           ?>
           
           <h5 class="modal-title" id="exampleModalLabel">Editar datos de Cliente</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    
                    </div>
                <form action="php/edicion_de_cuentas.php" method="post">
                      <div class="modal-body">              
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre completo" <?php echo "value='$value->nombre'"?> > 
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="Correo">Correo</label>
                                  <input type="email" class="form-control" name="correo" placeholder="Escriba su correo" <?php echo "value='$value->correo'"?> >
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="celular">Celular</label>
                                  <input type="text" class="form-control" name="celular" placeholder="Escriba su numero de celular" <?php echo "value='$value->telefono'"?>>
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Escriba su direccion"<?php echo "value='$value->direccion'"?>>
                                  </div>
                                </div>     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="success" name="cc" class="btn btn-primary mr-auto" >Guardar datos</button>
                  </form>
                  
                  <form action="php/borrado_de_cuentas.php" method="post">
                        <button type="success" class="btn btn-danger " >Borrar cuenta</button>
                </form>
                      </div>
         <?php }} ?>
                  </div>
                </div>
   </div>