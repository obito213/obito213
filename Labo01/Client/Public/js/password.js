




validatePassword = () =>{
  if(document.getElementById("password").value !=document.getElementById("passwordconfirmation").value){
    event.preventDefault();
    alert("Mot de Passe et Mot de Passe de Confirmation ne sont pas les MEME");
  }else {
    document.getElementById("inscrire").onsubmit;
  }
  

  }
