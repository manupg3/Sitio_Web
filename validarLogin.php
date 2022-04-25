<?php 
session_start();
require_once 'database/bd.php';

$email = $_POST['email'];
$password = $_POST['password'];

   $url="C:\xampp\htdocs\argon-dashboard-master\argon-dashboard-master\pages\dashboard.php";
$acceso = ConexionBD::dameUnObjetoAcceso();
$consulta = $acceso->RetornarConsulta("SELECT * FROM usuarios WHERE password = :password");
$consulta->bindValue(":password",$password);
$consulta->execute();
$count=$consulta->rowCount();
$data=$consulta->fetch(PDO::FETCH_OBJ);

if($count)
{
    
     $_SESSION['user']['nombre'] = $data->nombre;
     $_SESSION['user']['email'] = $data->email;

     var_dump($_SESSION);
    
    }
else
{
    $sinUsuario= true;
    echo $sinUsuario;
} 

?>

