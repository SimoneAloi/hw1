function check_credenziali(event){
  if(form.email.value.length < 15 || form.password.value.length < 8){
    event.preventDefault();
    const div_errore = document.querySelector("#errore");
    div_errore.innerHTML = "";
    div_errore.textContent = "Uno o più campi presentano caratteri insufficenti";
    div_errore.classList.remove("hidden");
  }    
}

const form = document.forms['login'];
form.addEventListener('submit', check_credenziali);