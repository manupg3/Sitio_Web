$(document).ready(function(){



  });
  


        
        
   


 
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