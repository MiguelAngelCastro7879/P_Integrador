<!DOCTYPE html>
<html>
    <head>
        <title>OLER FUMIGACIONES</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos/oler.css">
        <meta charset="utf-8">
    </head> 
    <body>
<?php session_start();include("script/verificacion.php"); include("nav.php");  ?>

<br>        
        <div class="container">
            <div class="row justify-content-center" >
                <div><h2>Servicios</h2></div>
            </div>
            <br>
            <div class="row "> 
<!-- iNICIO DE LA PARTE PARA GENERAR SERVICIO ( SOLO PARA TRABAJADORES) -->
              <div class="col-md-3 col-sm-12 mr-auto">    
<?php
  if(isset($_SESSION['trabajador']))
  { 
            echo "<div class='container'>
                  Generar servicio <a href='generar_constancia.php'><button type='button' class='btn btn-danger'>Generar</button></a>
                </div>";
  
?>
              </div>
<!-- FIN DE LA PARTE PARA GENERAR UN SERVICIO -->
              <div class="col-md-4 mr-auto">
                <form action="#" method="post">
                <label for="buscar">Seleccione un campo</label>
                  <select class="form-control" name="buscar" id="" >
                    <option value="trabajadores">Trabajadores</option>
                    <option value="plagas">Plagas</option>
                    <option value="productos">Productos</option>
                    <option value="areas">Areas</option>
                    <option value="fechas">Fecha</option>
                    <option value="clientes">Clientes</option>
                  </select> <br>
                  <button class='btn btn-primary' type="success">Buscar</button>
                </form>
               </div>
               <div class="col-4">
                <form action="#" method="get">
                  <?php
    $campo=0;              
    if($_POST)
    {
      if($_POST["buscar"]=="plagas")
      { 
        echo " <label for='busqueda'>Seleccione una opcion</label>
          <select class='form-control' name='busqueda' >";
        $datos= "SELECT * FROM `plaga` ";
        $plaga=$db->seleccionar($datos); 
        foreach($plaga as $value)
        {
          echo "<option value='$value->nombre'> $value->nombre </option>";
        }    
        echo "</select>";
        $campo=0;
      }
      else if($_POST["buscar"]=="areas")
      {    
        echo " <label for='busqueda'>Seleccione una opcion</label>
          <select class='form-control' name='busqueda' >";
        $datos= "SELECT * FROM `areas` ";
        $areas=$db->seleccionar($datos); 
        foreach($areas as $value)
        {
          echo "<option value='$value->nombre'> $value->nombre </option>";
        }   
        echo "</select>";
        $campo=1;
      }
      else if($_POST["buscar"]=="trabajadores")
      {     
        echo " <label for='busqueda'>Seleccione una opcion</label>
          <select class='form-control' name='busqueda' >";
        $datos= "SELECT trabajadores.cve,cuentas.nombre FROM cuentas inner join `trabajadores` on cuentas.cve=trabajadores.cuenta  ";
        $trabajadore=$db->seleccionar($datos); 
        foreach($trabajadore as $value)
        {
          echo "<option value='$value->nombre'> $value->nombre </option>";
        }    
        echo "</select>";
        $campo=2;
      }
      else if($_POST["buscar"]=="productos")
      {     
        echo " <label for='busqueda'>Seleccione una opcion</label>
          <select class='form-control' name='busqueda' >";
        $datos= "SELECT * FROM `productos` ";
        $producto=$db->seleccionar($datos); 
        foreach($producto as $value)
        {
          echo "<option value='$value->nombre'> $value->nombre </option>";
        }  
        echo "</select>";
        $campo=3;
      }
      else if($_POST["buscar"]=="fechas")
      {
        echo "<label for='fecha'>Seleccione una fecha</label>
        <input type='date' name='fecha' class='form-control'>"; 
        $campo=4;
      }
      else if($_POST["buscar"]=="clientes")
      {     
        echo " <label for='busqueda'>Seleccione una opcion</label>
          <select class='form-control' name='busqueda' >";
        $datos= "SELECT clientes.cve,cuentas.nombre FROM cuentas inner join `clientes` on cuentas.cve=clientes.cuenta  ";
        $cliente=$db->seleccionar($datos); 
        foreach($cliente as $value)
        {
          echo "<option value='$value->nombre'> $value->nombre </option>";
        }    
        echo "</select>";
        $campo=5;
      }
       echo "<input type='hidden' name='valor_campo' value='$campo'>" ;
    }
  }?>
          <?php if($_POST) {echo "<br><button class='btn btn-success' type='success'>Buscar</button>";} ?>

                </form>
               </div>
              </div>
            <br>
            
            <!--  -->
<!-- INICIO DE PHP PARA MOSTRAR TABLAS -->
<?php 
  if(isset($_SESSION['trabajador']))
  { 
        echo "<div class='table-responsive'>
                <table class='table'>
                    <thead class='thead-dark'>
                      <tr>
                        <th scope='col'>folio</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Fecha de servicio</th>
                        <th scope='col'>Direccion</th>
                        <th scope='col'>Ciudad</th>
                        <th scope='col'>Hora de incicio</th>
                        <th scope='col'>Hora de termino</th>
                        <th scope='col'>Metodo empleado</th>
                        <th scope='col'>Area_limpia</th>
                        <th scope='col'>Observaciones</th>
                        <th scope='col'>Tiempo de reentrada</th>
                        <th scope='col'>Plaga</th>
                        <th scope='col'>Areas</th>
                        <th scope='col'>Tecnicios</th>
                        <th scope='col'>Productos</th>
                      </tr>
                    </thead>
                    <tbody>";
    include "script/database_trabajador.php";
    $db=new DatabaseT();
    $db->conectarDB();
    extract($_GET);
    
      // $campo= $_POST["buscar"];
    // $comprobacion=$campo;
    if($_GET)
    {
    // print_r($_GET["valor_campo"]);
      if($_GET["valor_campo"]==0)
      {     
        $busqueda_t= "call buscar_plaga('$busqueda')";    
      }
      else if($_GET["valor_campo"]==1)
      {     
        $busqueda_t= "call buscar_area('$busqueda')";    
      }
      else if($_GET["valor_campo"]==2)
      {     
        $busqueda_t= "call buscar_trabajador('$busqueda')";    
      }
      else if($_GET["valor_campo"]==3)
      {     
        $busqueda_t= "call buscar_producto('$busqueda')";    
      }
      else if($_GET["valor_campo"]==4)
      {     
        $busqueda_t= "SELECT * FROM constancia where fecha_servicio='$fecha' ";    
      }
      else if($_GET["valor_campo"]==5)
      {     
        $busqueda_t= "SELECT * FROM constancia where Nombre='$busqueda' ";    
      }
    }
    else
    {
      $busqueda_t="SELECT * FROM constancia";
    }
    $constancia=$db->seleccionar($busqueda_t);
    foreach($constancia as $value)
    {
        echo "<tr>
                <td>".$value->folio."</td>
                <td>".$value->Nombre."</td>
                <td>".$value->fecha_servicio."</td>
                <td>".$value->direccion."</td>
                <td>".$value->Ciudad."</td>
                <td>".$value->hora_de_incicio."</td>
                <td>".$value->hora_de_termino."</td>
                <td>".$value->metodo_empleado."</td>
                <td>".$value->area_limpia."</td>
                <td>".$value->observaciones."</td>
                <td>".$value->tiempo_de_reentrada."</td>
                <td>".$value->plaga."</td>
                <td>".$value->areas."</td>
                <td>".$value->Tecnicos."</td>
                <td>".$value->productos."</td>
              </tr>";
    }
                echo "</tbody>
                    </table>
                  </div>";


  } 

else 
{
  if(isset($_SESSION['trabajador']))
  { 
        echo "<div class='table-responsive'>
                <table class='table'>
                    <thead class='thead-dark'>
                      <tr>
                        <th scope='col'>folio</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Fecha de servicio</th>
                        <th scope='col'>Direccion</th>
                        <th scope='col'>Ciudad</th>
                        <th scope='col'>Hora de incicio</th>
                        <th scope='col'>Hora de termino</th>
                        <th scope='col'>Metodo empleado</th>
                        <th scope='col'>Area_limpia</th>
                        <th scope='col'>Observaciones</th>
                        <th scope='col'>Tiempo de reentrada</th>
                        <th scope='col'>Plaga</th>
                        <th scope='col'>Areas</th>
                        <th scope='col'>Tecnicios</th>
                        <th scope='col'>Productos</th>
                      </tr>
                    </thead>
                    <tbody>";
    include "script/database_trabajador.php";
    $db=new DatabaseT();
    $db->conectarDB();
    $busqueda_t= "SELECT * FROM `constancia` ";
    $constancia=$db->seleccionar($busqueda_t);
    foreach($constancia as $value)
    {
        echo "<tr>
                <td>".$value->folio."</td>
                <td>".$value->Nombre."</td>
                <td>".$value->fecha_servicio."</td>
                <td>".$value->direccion."</td>
                <td>".$value->Ciudad."</td>
                <td>".$value->hora_de_incicio."</td>
                <td>".$value->hora_de_termino."</td>
                <td>".$value->metodo_empleado."</td>
                <td>".$value->area_limpia."</td>
                <td>".$value->observaciones."</td>
                <td>".$value->tiempo_de_reentrada."</td>
                <td>".$value->plaga."</td>
                <td>".$value->areas."</td>
                <td>".$value->Tecnicos."</td>
                <td>".$value->productos."</td>
              </tr>";
    }
                echo "</tbody>
                    </table>
                  </div>";


  } 


}
 if(isset($_SESSION['cliente']))
  { 
    echo "<div class='table-responsive'>
    <table class='table'>
        <thead class='thead-dark'>
          <tr>
            <th scope='col'>folio</th>
            <th scope='col'>Fecha de servicio</th>
            <th scope='col'>Direccion</th>
            <th scope='col'>Hora de incicio</th>
            <th scope='col'>Hora de termino</th>
            <th scope='col'>Observaciones</th>
            <th scope='col'>Tiempo de reentrada</th>
            <th scope='col'>Plaga</th>
            <th scope='col'>Areas</th>
            <th scope='col'>Tecnicos</th>
          </tr>
        </thead>
        <tbody>";
        $db->conectarDB();
        $busqueda_t= "SELECT * FROM `constancia` where id_cuenta=".$_SESSION["cve"];
        $constancia=$db->seleccionar($busqueda_t);
        foreach($constancia as $value)
        {
          echo "<tr>
          <td>".$value->folio."</td>
          <td>".$value->fecha_servicio."</td>
          <td>".$value->direccion."</td>
          <td>".$value->hora_de_incicio."</td>
          <td>".$value->hora_de_termino."</td>
          <td>".$value->observaciones."</td>
          <td>".$value->tiempo_de_reentrada."</td>
          <td>".$value->plaga."</td>
          <td>".$value->areas."</td>
          <td>".$value->Tecnicos."</td>
          </tr>";
        }
    echo "</tbody>
        </table>
      </div>";
  }
?> 
<!-- FIN DE PHP PARA MOSTRAR TABLAS -->



        </div>
        <br><br><br>
    <?php include("footer.php"); ?>
        <script src="bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"  crossorigin="anonymous"></script> 
        <script src="bootstrap/js/bootstrap.min.js"crossorigin="anonymous"></script>
    </body>
</html>