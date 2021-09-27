<?php

class DatabaseC
{
    private $PDOLocal;
    private $user="root";
    private $password="";
    private $server="mysql:host=localhost; dbname=olerfumigaciones";
    
    function conectarDB()
    {
        try{
            $this->PDOLocal=new PDO($this->server, $this->user, $this->password);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    function desconectarDB()
    {
        try{
            $this->PDOLocal=null;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    function seleccionar($cadenaSQL)
    {
        try{
            $resultado=$this->PDOLocal->query($cadenaSQL)or die($cadenaSQL);
            $renglon=$resultado->fetchAll(PDO::FETCH_OBJ);
            
            return $renglon;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    function ejecutaSQL($cadenaSQL)
    {
        try{
            $this->PDOLocal->query($cadenaSQL);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    // function verificaLogin($usuario, $contraseña)
    // {
    //     try{
    //         $pase=0;
    //         $query="SELECT * FROM cuentas where correo='$usuario'";
    //         $consulta = $this->PDOLocal->query($query);
    //         $registro = $consulta->fetch(PDO::FETCH_ASSOC);
    //         if($consulta->rowCount()==1);
    //         {
    //             if( password_verify($contraseña, $registro['contraseña']))
    //             {
    //                 $pase++;
    //             }
    //         }
    //         if ($pase>0)
    //         {
                
    //             // session_start();
    //             // $_SESSION["usuario"]=$usuario;
    //             // echo "<h2> BIENVENIDO".$_SESSION["usuario"]."</h2>";
    //             $t="SELECT * from trabajadores where cuenta=".$registro['cve'];
    //             $cuenta = $this->PDOLocal->query($t);
    //             if($cuenta->rowCount()!=1)
    //             {
    //                 session_start();
    //                 $_SESSION["cliente"]=$registro['nombre'];
    //                 echo "<div class='alert alert-success col-8'><br><br><br><h2> BIENVENIDO ".$_SESSION["cliente"]."</h2><br><br><br></div>";

    //             }
                
    //         }
    //         else
    //         {
    //             echo "<div class='alert alert-warning col-8'><br><br><br><h1> USUARIO O PASSWORD INCORRECTO</h1><br><br><br></div> ";
    //         }
    //     }
    //     catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }

    function cerrarsesion()
    {
        session_start();
        session_destroy();

    }
}
