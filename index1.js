function OnJsonProd(json){
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
    const chs_img_form = [];
    for(const single_prod of all_prod){
        const row = single_prod.dataset.row;
        if(row === tipo){
            const form = single_prod.querySelector("form");
            const sgl_prod_name = form.prodotto;
            const sgl_prod_price = form.prezzo;
            const sgl_prod_img = single_prod.querySelector("img");
            const img_form = form.img;
            chs_prod_name[chs_prod_name.length] = sgl_prod_name;
            chs_prod_price[chs_prod_price.length] = sgl_prod_price;
            chs_prod_img[chs_prod_img.length] = sgl_prod_img ;
            chs_img_form[chs_img_form.length] = img_form;
        }
    }
    for(j = 0; j < 12; j++){
        chs_prod_name[j].value = nomi_prod[j];
        chs_prod_price[j].value = prezzi_int[j] + "." + prezzi_dec[j] + " €";
        chs_prod_img[j].src = immagini[j];
        chs_img_form[j].value = immagini[j];
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
    fetch("http://localhost/file_hw1_WP/All_Files/upload_products.php?tipo=" + tipo).then(OnResponse).then(OnJsonProd);
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



function change_prod_view(event){
  const clicked_dot = event.currentTarget;
  const dot_row = clicked_dot.dataset.row;
  const all_dots = document.querySelectorAll(".dot");
  for(const dot of all_dots){
    if(dot.dataset.row === dot_row){
      if(dot === clicked_dot){
        dot.classList.add("current_used_dot");
      } else {
          dot.classList.remove("current_used_dot")
      }
    }
  } 
  const dot_index = clicked_dot.dataset.index;
  const all_views = document.querySelectorAll(".view1, .view2, .view3");
  for(const single_view of all_views){
    const single_view_row = single_view.dataset.row;
    const single_view_id = single_view.dataset.index;
    if(single_view_row === dot_row){
      if(single_view_id === dot_index){
        single_view.classList.remove("hidden")
      } else {
        single_view.classList.add("hidden")
      }
    }
  }
} 

const dot_view_prod = document.querySelectorAll(".products_view .dot");
for(const single_dot of dot_view_prod){
  single_dot.addEventListener("click", change_prod_view)
}



function mostra_carrello(event){
  const view_carrello = document.querySelector('#view_carrello');
  view_carrello.classList.remove('hidden');
  document.body.classList.add('no_scroll');
}
const carrello = document.querySelector('#cart');
carrello.addEventListener('click', mostra_carrello);

function leva_carrello(event){
  event.currentTarget.classList.add('hidden');
  document.body.classList.remove('no_scroll');
}
const view_carrello = document.querySelector('#view_carrello');
view_carrello.addEventListener('click', leva_carrello);



function mostra_modale_manga(event){
  const modale = document.querySelector('#manga_search_view');
  modale.classList.remove('hidden');
  document.body.classList.add('no_scroll');
}
const modal_open_button = document.querySelector('#search_p p');
modal_open_button.addEventListener('click', mostra_modale_manga);

function leva_modale_manga(event){
  const modale = document.querySelector("#manga_search_view");
  modale.classList.add('hidden');
  document.body.classList.remove('no_scroll');
}
const close_button = document.querySelector('#div_gestione p');
close_button.addEventListener('click', leva_modale_manga);



function change_header_img(event){
  const clk_dot = event.currentTarget;
  const value = clk_dot.dataset.index;
  const img = document.querySelector("#header_img img");
  console.log(clk_dot, value, img);
  const all_dots = document.querySelectorAll(".dot");
  for(dot of all_dots){
    dot.classList.remove("current_used_dot");
  }
  clk_dot.classList.add('current_used_dot');
  if(value == 1){
    img.src = "https://mangayo.it/modules/an_homeslider/img/fc64b45952bc191b7055a6f1762215e9_1.jpg";
  } else if(value == 2){
    img.src = "https://mangayo.it/modules/an_homeslider/img/2d4f583c07ecf617a861e174cad2aaef_1.webp";
  } else if(value == 3){
    img.src = "https://mangayo.it/modules/an_homeslider/img/7d16e08bdebceaa13f0d110cefa5d53d_1.webp";
  } else if(value == 4){
    img.src = "https://mangayo.it/modules/an_homeslider/img/a87e3a3e76d94fa44f48db43e3222676_1.webp";
  } else {
    img.src = "https://mangayo.it/modules/an_homeslider/img/dbe9025c3ea02d547839aa85d4487187_1.webp"
  }
}

const header_dots = document.querySelectorAll("header .dot");
for(const single_dot of header_dots){
  single_dot.addEventListener('click', change_header_img);
}