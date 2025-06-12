function pagamento(event){
    const big_cont = document.querySelector("#big_container");
    big_cont.innerHTML = "";
    big_cont.classList.add('hidden');
    const msg_pag = document.querySelector("#msg_pag");
    msg_pag.classList.remove('hidden');
    const link = msg_pag.querySelector('a');
    link.textContent = 'Pagamento avvenuto, clicca qui per tornare alla home';
}

function OnResponse(response){
    if(!response.ok){
        console.log('Errore ricezione della promise!!');
    } else if(response === undefined) {
        console.log('Errore nella promise, risula undefined!!')
    } else {
        const testo = response.text();
        console.log(testo);
    }
}

function shop_erase(event){
    const utente = document.querySelector(".links_for_client p");
    const utente_value= utente.textContent;
    console.log(utente_value);
    fetch("http://localhost/file_hw1_WP/All_Files/delete_shop.php?utente=" + utente_value).then(OnResponse);
}


const buy_button = document.querySelector(".pagamento");
buy_button.addEventListener('click', pagamento);
buy_button.addEventListener('click', shop_erase);