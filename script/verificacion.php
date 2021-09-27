<?php if(isset($_SESSION['trabajador']))
  {

  }
  else if(isset($_SESSION['cliente']))
  {
  }
  else
  {
    header("Location:inicio_de_sesion.php");
  }
?>