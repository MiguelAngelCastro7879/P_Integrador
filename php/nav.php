
        <!--NAVEGACION Y LOS MODAL PARA INICIAR SESION, CREAR CUENTA DE CLIENTE Y DE EMPLEADO-->
        <div>
            <!--Barra de navegacion--> 
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

                  <div class="nav-item ml-auto "> 
                    <a href="https://www.facebook.com/Oler-Fumigaciones-172965636145/">
                        <img src="../imagenes/social-facebook-icon_34352.png" width="40" height="40">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=528713161843&text=Hola!%20Somos%20una%20empresa%20de%20fumigaciones%20reconocida%20en%20toda%20la%20regi%C3%B3n%20Laguna%20">
                        <img src="../imagenes/whatsapp_icon-icons.com_53606.png" width="40" height="40" alt="">
                    </a>&nbsp
  <?php

  if(isset($_SESSION['trabajador']))
  {
    echo "<div class='btn-group dropleft float-right'>
    <button type=button' class='btn btn-danger dropdown-toggle navcolor' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      <img src='../imagenes/usuario.png' width='50' height='50' alt='".$_SESSION['trabajador']."'>
    </button>
    <div class='dropdown-menu'>
        <a class='dropdown-item'>".$_SESSION['trabajador']. "</a>
        <div class='dropdown-divider'></div>
        <a class='dropdown-item' href='#                     '>Ver perfil</a>
        <a class='dropdown-item' href='../script/cerrar_sesion.php'>[CERRAR SESION]</a>
    </div>
  </div>";
  }
  else if(isset($_SESSION['cliente']))
  {
    echo "<div class='btn-group dropleft float-right'>
    <button type=button' class='btn btn-danger dropdown-toggle navcolor' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      <img src='../imagenes/usuario.png' width='50' height='50' alt='".$_SESSION['cliente']."'>
    </button>
    <div class='dropdown-menu'>
        <a class='dropdown-item'>".$_SESSION['cliente']. "</a>
        <div class='dropdown-divider'></div>
        <a class='dropdown-item' href='#                     '>Ver perfil</a>
        <a class='dropdown-item' href='../script/cerrar_sesion.php'>[CERRAR SESION]</a>
    </div>
  </div>";
  }
   ?> 
                  </div> <!--elementos alineados a la derecha -->
 
              </nav>
 
        </div>