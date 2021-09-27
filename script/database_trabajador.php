<?php

class DatabaseT
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
            $resultado=$this->PDOLocal->query($cadenaSQL);
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
    //         $query="SELECT * FROM user='$usuario'";
    //         $consulta = $this->PDOLocal->query($query);
    //         while ($registro = $consulta->fetch(PDO::FETCH_ASSOC));
    //         {
    //             if(password_verify($contraseña, $registro['contraseña']))
    //             {
    //                 $pase++;
    //             }
    //         }
    //         if ($pase>0)
    //         {
    //             session_start();
    //             $_SESSION["usuario"]=$usuario;
    //             echo "<h2> BIENVENIDO".$_SESSION["usuario"]."</h2>";
    //         }
    //         else
    //         {
    //             echo "USUARIO O PASSWORD INCORRECTO";
    //             header("refresh:2 ");
    //         }
    //     }
    //     catch(PDOException $e){ 
    //         echo $e->getMessage();
    //     }
    // }
    // function cerrarsesion()
    // {
    //     session_start();
    //     session_destroy();

    // }
}
