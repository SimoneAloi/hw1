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


//API per la ricerca di info sui manga:
  function JSON_handler(json){  
      const div_img = document.querySelector("#searched_manga_img");
      div_img.innerHTML = '';
      const manga_img = document.createElement('img');
      manga_img.src = json.data[0].images.jpg.large_image_url;
      div_img.appendChild(manga_img);

      const div_author = document.querySelector("#autore div");
      div_author.innerHTML = '';
      const manga_author = document.createElement('p');
      manga_author.textContent = json.data[0].authors[0].name;
      div_author.appendChild(manga_author);

      const div_genre = document.querySelector("#genere div");
      div_genre.innerHTML = '';
      const manga_genre = document.createElement('p');
      const generi = json.data[0].genres;
      var all_genres = '';
      for(const genere of generi){
        const singolo_genere = genere.name; 
        all_genres = all_genres + ', ' + genere.name;
      }
      manga_genre.textContent = all_genres;
      div_genre.appendChild(manga_genre);

      const div_sinossi= document.querySelector("#sinossi div");
      div_sinossi.innerHTML = '';
      const manga_sinossi = document.createElement('p');
      manga_sinossi.textContent = json.data[0].synopsis;
      div_sinossi.appendChild(manga_sinossi);
  }
  
  function onSuccess_or_Failure(response){
    if(!response.ok){
        console.log('Errore ricezione della promise!!');
    } else if(response === undefined) {
        console.log('Errore nella promise, risula undefined!!')
    } else {
      console.log(response);
      const json = response.json();
      return json;
    }
  }
  
  function ricerca_manga(event){ 
    event.preventDefault();
    console.log("Ricarica pagina annullata con Successo");
    const nome_manga = document.querySelector('#nome_manga');
    const manga_value = encodeURIComponent(nome_manga.value); 
    console.log('Eseguo ricerca: '+ manga_value);
    rest_url = "https://api.jikan.moe/v4/manga?q="+ manga_value;
    console.log("L'URL è: " + rest_url);
    fetch(rest_url).then(onSuccess_or_Failure).then(JSON_handler);
    cerco_info_album();
  }
  const form = document.querySelector('form');
  form.addEventListener('submit', ricerca_manga);


//API di Spotify
const ClientID = "46c0a70617fa4c57bf547965a42ae6b6"
const client_secret = "6649315cc8964b91a35f0fc32303c542";

function handler_API_JSON(json){
  const div_img_album  = document.querySelector("#div_spotify_API_TEST div");
  div_img_album.innerHTML = '';
  const img_album = document.createElement("img");  
  img_album.src = json.albums.items[0].images[0].url;
  console.log(img_album);
  div_img_album.appendChild(img_album);  
}

function handler_API_1(response){
  if(!response.ok){
    console.log("Fallimento della richiesta");
  } else {
  const json = response.json();
  return json;
  }
}

function cerco_info_album(){
  const nome_manga2 = document.querySelector('#nome_manga');
  const manga_value2 = encodeURIComponent(nome_manga2.value);
  console.log(manga_value2);
  rest_spotify_url = 'https://api.spotify.com/v1/search?q=' + manga_value2 + '&type=album';
  console.log(rest_spotify_url);
  fetch(rest_spotify_url,
    {
    method: "GET",
    headers : 
      {
      'Authorization': 'Bearer ' + token
      }
    }
  ).then(handler_API_1).then(handler_API_JSON);
}

function handler_token_JSON(json){
  console.log("il file json arrivato è il seguente: "+ json);
  token = json.access_token;
  console.log("il token è il seguente: "+ token);
}

function handler_token_1(response){
  if(!response.ok){
    console.log("Fallimento ricezione response");
  } else {
    json_token = response.json();
    return json_token;
  }
}

let token;
fetch("https://accounts.spotify.com/api/token", {
      method: "POST",
      headers: {
          "Content-Type": "application/x-www-form-urlencoded",
          'Authorization': 'Basic ' + btoa(ClientID + ':' + client_secret)
        },
      body: "grant_type=client_credentials",
  }).then(handler_token_1).then(handler_token_JSON); 