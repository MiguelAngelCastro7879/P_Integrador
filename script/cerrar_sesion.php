<?php

if(isset($_SESSION["trabajador"])){}
else if(isset($_SESSION["cliente"])){}
else{include 'iniciar_sesion.php';}
$db=new Database();
$db->cerrarsesion();

header("Location: ../index.php");
?>

