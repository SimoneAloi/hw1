function OnJson(json){
    console.log(json);
    const tipo = json[0].tipo;
    const nomi_prod = [];
    const prezzi_int = [];
    const prezzi_dec = [];
    const immagini = [];
    for(i = 0; i < 12; i++){
        const nome_prod = json[i].nome;
        nomi_prod[i] = nome_prod;
        const prezzo_int = json[i].prezzo_intero;
        prezzi_int[i] = prezzo_int;
        const prezzo_dec = json[i].prezzo_decimale;
        prezzi_dec[i] = prezzo_dec;
        const img_prod= json[i].immagine;
        immagini[i] = img_prod;    
    }
    const all_prod = document.querySelectorAll(".prodotto");
    const chs_prod_name = [];
    const chs_prod_price = [];
    const chs_prod_img = [];
    for(const single_prod of all_prod){
        const row = single_prod.dataset.row;
        if(row === tipo){
            const sgl_prod_name = single_prod.querySelector(".nome_prod");
            const sgl_prod_price = single_prod.querySelector(".prezzo_prod");
            const sgl_prod_img = single_prod.querySelector("img");
            chs_prod_name[chs_prod_name.length] = sgl_prod_name;
            chs_prod_price[chs_prod_price.length] = sgl_prod_price;
            chs_prod_img[chs_prod_img.length] = sgl_prod_img ; 
        }
    }
    for(j = 0; j < 12; j++){
       chs_prod_name[j].textContent = nomi_prod[j];
        chs_prod_price[j].textContent = prezzi_int[j] + "," + prezzi_dec[j];
        chs_prod_img[j].src = immagini[j]; 
    }
}

function OnResponse(response){
    if(!response.ok){
        console.log('Errore ricezione della promise!!');
    } else if(response === undefined) {
        console.log('Errore nella promise, risula undefined!!')
    } else {
        const json = response.json();
        return json;
    }
}

function aggior_prods(tipo){
    fetch("http://localhost/file_hw1_WP/All_Files/upload_products.php?tipo=" + tipo).then(OnResponse).then(OnJson);
}

const tipo = [];
tipo[0] = "";
tipo[1] = "Manga";
tipo[2] = "Jap-News";
tipo[3] = "Figure";
tipo[4] = "Card Game";
tipo[5] = "Preordine";

aggior_prods(tipo[1]);
aggior_prods(tipo[2]);
aggior_prods(tipo[3]);
aggior_prods(tipo[4]);
aggior_prods(tipo[5]);


//Aggiunta al carrello
function aggiorna_carrello(event){
    console.log('Carrello Aggiornato');
    const clicked_button = event.currentTarget;
    const index_button = clicked_button.dataset.index;
    const view_prodotti = document.querySelector('#view_products_shop');
    view_prodotti.removeChild(view_prodotti.querySelector("p"));
    const all_products = document.querySelectorAll('.prod_descr');  
    for(const prodotto of all_products){
      const index_prodotto = prodotto.dataset.index;      
      if(index_prodotto == index_button){      
        const product_to_add = document.createElement('div');
        product_to_add.classList.add('prodotto_carrello');
        view_prodotti.appendChild(product_to_add);    
        const img_scelta = prodotto.querySelector('img')
        const testo_scelto = prodotto.querySelector('p');
        const prezzo = prodotto.querySelector('.price');     
        const immagine = document.createElement('img');  
        product_to_add.appendChild(immagine);   
        immagine.src = img_scelta.src;     
        const testo = document.createElement('p');
        product_to_add.appendChild(testo);
        testo.textContent = testo_scelto.textContent;  
        const costo = document.createElement('p');
        product_to_add.appendChild(costo);
        costo.textContent = prezzo.textContent;
        }  
      } 
    }

  const button_shop_upload = document.querySelectorAll('.button_shop');
  for(const singolo_bottone of button_shop_upload){
    singolo_bottone.addEventListener('click', aggiorna_carrello);
  }

