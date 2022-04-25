
  $(document).ready(function(){

   $(document).on('click','.cerrarSession', function(e){
console.log("CERRAR SESSION",e);
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title: '¿Seguro quieres cerrar sesion?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: '¡Si, cerrar sesion!',
      cancelButtonText: '¡No, cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
          logOut();
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ); 
    })
  
  });

 
});
 function debesLoguearte(){
    
  let textoAlert = "¡Debes loguearte...!"

     window.location.href = 'index.php';



}
async function logOut(){

  

  const LogOutExitoso = await $.post('../Sitio_Web/logOut.php');
  console.log("RESPONSE LOGOUT",LogOutExitoso);
  
   if(LogOutExitoso){
    
    let textoAlert = "¡Cerrando session...!"
    setTimeout(() => {
  
       window.location.href = 'index.php';
  
    }, 2100);
  
    MostrarAlertaLogin(textoAlert);
  }
  else if(LogOutExitoso == false){
  let textoAlert = "¡Hubo um error al cerrar la session!";
  MostrarAlertaLogin(textoAlert);
  
  }

}
async function Register(){

  let email = $('#emailRegister').val();
  let password = $('#passwordRegister').val();
  let nombre = $('#nombreRegister').val();

  let user ={
      email:email,
      password:password,
      nombre:nombre
    };

    console.log("Nombre",nombre);
  
  console.log("Email",email);

  console.log("Password",password);

 const ResgistroExitoso = await $.post('../Sitio_Web/RegistrarUsuario.php', user);
console.log("RESPONSE REGISTRO",ResgistroExitoso);

 if(ResgistroExitoso){
  
  let textoAlert = "¡Creando tu cuenta...!"
  setTimeout(() => {

     window.location.href = 'index.php';

  }, 2100);

  MostrarAlertaLogin(textoAlert);
}
else if(ResgistroExitoso == false){
let textoAlert = "¡Ese email ya se encuentra en la base de datos!";
MostrarAlertaLogin(textoAlert);

}
else{
  let textoAlert = "¡El Registro Fallo!";
  MostrarAlertaLogin(textoAlert);
  
}
 
}        
        
   


 
async function logIn(){

    let email = $('#email').val();
    let password = $('#password').val();
      let user ={
        email:email,
        password:password
      };

    console.log("Email",email);
    console.log("Password",password);

   const userDevuelto = await $.post('../Sitio_Web/validarLogin.php', user);
   if(userDevuelto != 1){
    
    let textoAlert = "¡Iniciando session...!"
    setTimeout(() => {

      window.location.href = 'index.php';

    }, 2100);

    MostrarAlertaLogin(textoAlert);
    console.log("Responde",userDevuelto);      
}
else{
let textoAlert = "¡No se encontro el usuario!";
MostrarAlertaLogin(textoAlert);

}
   
}
 
function MostrarAlertaLogin(textoAlerta){
    let timerInterval
  Swal.fire({
    title: textoAlerta,
    timer: 2000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
      }, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer')
    }
  })
  }