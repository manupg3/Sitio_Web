<?php 
   
   session_start();
      
      if(isset($_SESSION['user']))
      { 
          
        $userEmail = $_SESSION['user']['email']; 
        $userNombre = $_SESSION['user']['nombre']; 


      }
      else{
            
      }
        
?>

<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>FlexStart</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li class="dropdown"><a href="#"><span>¿Que Ofrecemos?</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="http://localhost/Sitio_Web/index.php#services">Servicio</a></li>
              <li><a href="http://localhost/Sitio_Web/index.php#portfolio">Portfolio</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
          <!-- Button trigger modal -->

          <div class="buttons-header">
            <div class="dropdown">

          <?php if(isset($_SESSION['user'])){   ?>
            <a href="http://localhost/Sitio_Web/perfilpage.php"> <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
          <?php echo $userEmail ?>    
          </button></a>
          <ul class="dropdown-menu">
      <li><a href="http://localhost/Sitio_Web/perfilpage.php">Mi Perfil</a></li>
      <li><a href="#" class="cerrarSession">Cerrar Sesion</a></li>
    </ul>
          </div> 
          <?php  } else {  ?>
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLogin">
           Log In
         </button> 
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegister">
           Registrarse
         </button> 
         <?php  } ?>
         </div>
          

<!-- Modal Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLoginLabel">LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Pills navs -->


<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form onsubmit="return false;">

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="email" name="email" class="form-control"  required/>
        <label class="form-label" for="email">Email or username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="password" name="password"  class="form-control" required/>
        <label class="form-label" for="password">Password</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center forgot-password">
          <!-- Simple link -->
          <a href="#!">Forgot password?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button class="btn btn-primary btn-block mb-4 btn-login" onclick="logIn();">Iniciar Sesion</button>

      <!-- Register buttons -->
     
    </form>


    </div>
  </div>
</div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  

<!-- Modal Register-->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form onsubmit="return false;">

<!-- Email input -->
<div class="form-outline mb-4">
  <input type="text" id="nombreRegister" name="nombreRegister" class="form-control"  required/>
  <label class="form-label" for="nombre">Tu Nombre</label>
</div>

<div class="form-outline mb-4">
  <input type="email" id="emailRegister" name="emailRegister" class="form-control"  required/>
  <label class="form-label" for="email">Email</label>
</div>

<!-- Password input -->
<div class="form-outline mb-4">
  <input type="password" id="passwordRegister" name="passwordRegister"  class="form-control" required/>
  <label class="form-label" for="passwordRegister">Password</label>
</div>

<!-- 2 column grid layout -->
<div class="row mb-4">
  <div class="col-md-6 d-flex justify-content-center">
  </div>
</div>

<!-- Submit button -->
<button class="btn btn-primary btn-block mb-4 btn-login" onclick="Register();">Registrarse</button>

<!-- Register buttons -->

</form>
      </div>
    
    </div>
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="assets/js/users.js"></script>
