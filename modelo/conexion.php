<?php
class conexion{
private $conexion;
private $server="127.0.0.1";
private $usuario="root";
private $pass="";
private $db="usuariosbd";
private $user;
private $password;
private $email;

public function __construct() {
    $this->conexion=new mysqli($this->server, $this->usuario, $this->pass, $this->db);
    if ($this->conexion->connect_errno) {
        die("Fallo al tratar de conectar: (". $this->conexion->connect_errno.")");    
    }
}
public function cerrar() {
    $this->conexion->close();
}

public function login($usuario,$pass) {
    $this->user=$usuario;
    $this->password=$pass;
    $query="select usuario, password, roll from usuarios where usuario='".$this->user."' and password='".$this->password."';";
    $consulta= $this->conexion->query($query);
    $row= mysqli_fetch_array($consulta);
        if ($row['roll']==1) {
        session_start();
        $_SESSION['user']=$row['usuario'];
        $_SESSION['validacion']=1;
        echo "Vistas/AdminVistas/index.php";
    }else if ($row['roll']==2) {
        session_start();
        $_SESSION['validacion']=2;
           echo "Vistas/UsuarioVistas/Usuario.php"; 
        } else {
           session_start(); 
        $_SESSION['validacion']=0;
            echo '1';
        }
    }
   


public function RegistroUser($user,$password,$email){
    $this->user=$usu;
    $this->pas=$password;
    $this->email=$email;
    $query="INSERT INTO `usuarios`(`usuario`, `password`, `roll`) VALUES (.$this->user.,.$this->pas.,.$this->email.)";
if($this->conexion->query($query)==true){
    echo "Registrado Correctamente";
}else{
    echo "No se Puedo Registrado Correctamente";
} 

    }
}



?>