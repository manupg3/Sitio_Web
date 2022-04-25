<?php 
session_start();
require_once 'database/bd.php';

$usuarioExistente=false;
$email = $_POST['email'];

$acceso = ConexionBD::dameUnObjetoAcceso();
$consulta = $acceso->RetornarConsulta("SELECT * FROM usuarios");
$consulta->execute();
$arrProductos= $consulta->fetchAll();	

$arrLength=count($arrProductos);

for ($i=0; $i <$arrLength ; $i++) { 
    if($arrProductos[$i]['email'] == $email)
  {  
    $usuarioExistente=true;
    break;

   }
};
if($usuarioExistente){
  $usuarioExistente=false;
    echo $usuarioExistente;

}
else{
    InsertarUsuario();
}



function InsertarUsuario(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];    

$acceso=ConexionBD::dameUnObjetoAcceso();
$consulta=$acceso->RetornarConsulta("INSERT INTO usuarios (email,password,nombre) 
value(:email,:password,:nombre)");
$consulta->bindValue(":email",$email);
$consulta->bindValue(":password",$password);
$consulta->bindValue(":nombre",$nombre);
$consulta->execute(); 

if($consulta==true){

    $_SESSION['user']['nombre'] = $nombre;
    $_SESSION['user']['email'] = $email;

   $regExitoso=true;
    echo $regExitoso;

}

else{
    echo "no es true";
}
}