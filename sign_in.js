function verifica(event){
  const form = event.currentTarget;
  const nome = form.nome.value;
  const cognome = form.cognome.value;
  const email = form.email.value;
  const password = form.password.value;
  const gender = form.genere.value;
  
  if(nome.length == 0 || cognome.length == 0 || email.length == 0 || password.length == 0 || gender == ""){
    console.log("Sono presenti campi vuoti");
    event.preventDefault();
    const error_div = document.querySelector("#errore");
    error_div.innerHTML = "";
    error_div.classList.remove("hidden");
    const error_msg = document.createElement("p");
    error_msg.textContent = "Sono presenti uno o più campi vuoti";
    error_div.appendChild(error_msg);
  } else if(nome.length !== 0 && cognome.length !== 0 && email.length !== 0 && password.length !== 0 && gender !== ""){
    console.log("Non ci sono campi vuoti");
    if(nome.length < 4 || cognome.length < 4 || email.length < 15 || password.length < 8){
      console.log("Uno o più campi presentano caratteri insufficenti");
      event.preventDefault();
      const error_div = document.querySelector("#errore");
      error_div.innerHTML = "";
      error_div.classList.remove("hidden");
      const error_msg = document.createElement("p");
      error_msg.textContent = "Uno o più campi presentano caratteri insufficienti";
      error_div.appendChild(error_msg);
    }
  }
}

const form = document.querySelector('form');
form.addEventListener('submit', verifica);