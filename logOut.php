<?php 
   
   session_start();
   session_destroy();
 $LogOutExitoso=false;     
if(isset($_SESSION['user'])){
    $LogOutExitoso=true;
  echo $LogOutExitoso;
} 
else {
    echo $LogOutExitoso;
}
?>