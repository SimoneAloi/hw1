function aggiorna_carrello_value(){
    const go_to_shop_button = document.querySelector("#go_to_shop");
    go_to_shop_button.classList.remove('hidden');
    const shop_id = document.querySelector('#cart');
    numb_prods_stringa = shop_id.dataset.prod_number;
    numb_prods = parseInt(numb_prods_stringa);
    numb_prods = numb_prods + 1;
    shop_id.textContent = "CARRELLO: " + numb_prods; 
    shop_id.dataset.prod_number = numb_prods;
}

function check_copie(img_prodValue){
  const prevProds = document.querySelectorAll('.prodotto_carrello');
    if(prevProds.length !== 0){
        for(const prod of prevProds){
            const img_value = prod.querySelector("img").src;
            if(img_value === img_prodValue){
                const copie_prod = prod.querySelector('.copie').textContent;
                copie_num = parseInt(copie_prod);
                copie_num = copie_num + 1;
                prod.querySelector('.copie').textContent = copie_num;
                aggiorna_carrello_value();
                return_value = 1;
                return(return_value);
            } else {
                return_value = 0;
            }
        }
        return(return_value);
    } else { 
        return_value = 0;
        return(return_value);
    }
}

function riempi_carrello(event){
    event.preventDefault();
    console.log('Carrello Aggiornato');
    const form = event.currentTarget;
    const empty_text = document.querySelector(" #carrello p");
    empty_text.textContent = "I prodotti nel carrello sono i seguenti: "; 
    const img_prod = form.querySelector("img");
    const img_prodValue = img_prod.src;
    const nome_prod = form.prodotto.value;
    const prezzo = form.prezzo.value;
    check_copie(img_prodValue);
    if(return_value === 0){
        const view_prodotti = document.querySelector("#view_products_shop");
        const product_to_add = document.createElement('div');
        product_to_add.classList.add('prodotto_carrello');
        view_prodotti.appendChild(product_to_add);     
        const immagine = document.createElement('img');  
        product_to_add.appendChild(immagine);   
        immagine.src = img_prod.src;    
        const nome = document.createElement('p');
        product_to_add.appendChild(nome);
        nome.textContent = nome_prod;  
        const costo = document.createElement('p');
        product_to_add.appendChild(costo);
        costo.textContent = prezzo;  
        const copie = document.createElement('p');
        copie.classList.add('copie');
        product_to_add.appendChild(copie);
        copie.textContent = '1';
        aggiorna_carrello_value();
    }
} 

function OnResponseShop(response){
    if(!response.ok){
        console.log('Errore ricezione della promise!!');
    } else if(response === undefined) {
        console.log('Errore nella promise, risula undefined!!')
    } else {
        const text = response.text();
        console.log(text);
    }
}

function invia_dati(event){
    event.preventDefault();
    const form = event.currentTarget;
    const form_data ={method: 'post', body : new FormData(form)};
    console.log(form_data);

    fetch("http://localhost/file_hw1_WP/All_Files/shopDB.php", form_data).then(OnResponseShop);
}

const all_prod_forms = document.querySelectorAll('.prodotto form');
for(const single_form of all_prod_forms){
    single_form.addEventListener('submit', riempi_carrello);
    single_form.addEventListener('submit', invia_dati); 
} 