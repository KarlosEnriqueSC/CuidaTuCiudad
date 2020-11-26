<?php
class conexionBD{

    private $server="127.0.0.1";
    private $db="usuariosbd";
    private $usuario="root";
    private $pass="";
    private $conexion=null;

    public  function getConexion(){
        try {
            $this->conexion=new PDO("mysql:host=$this->server;dbname=usuariosbd","$this->usuario","$this->pass");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec("SET CHARACTER SET utf8");
            
            return $this->conexion;
        
        } catch (Exception $e) {
            echo"Error".$e->getMessage();
        }finally{
            $this->conexion=null;
        }
    }

}

?>