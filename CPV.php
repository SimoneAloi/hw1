<?php 
function create_h1($row){
    $h1_stringa = "";
    if($row === 1){
        $h1_stringa = "<h1 class='prod_view_title'>Ultime Uscite</h1>";
    } else if($row === 2){
        $h1_stringa = "<h1 class='prod_view_title'>Novità dal Giappone</h1>";
    } else if($row === 3){
        $h1_stringa = "<h1 class='prod_view_title'>Novità Figure</h1>";
    } else if($row === 4){
        $h1_stringa = "<h1 class='prod_view_title'>Novità Card Game</h1>";
    } else {
        $h1_stringa = "<h1 class='prod_view_title'>Novità Preordini</h1>";
    }
    return($h1_stringa);
}
function create_prod($email, $row, $view){
   $prod_stringa = "";
   $prod_type = array("0"=>"NO_VALUE", "1"=>"Manga", "2"=>"Jap-News", "3"=>"Figure","4"=>"Card Game", "5"=>"Preordine");
    for($i = 1; $i <= 4;  $i++){
        if($row == 1){
            $stringa_prod_content = "<div class='span_prod'><p>NUOVO</p><span></span></div>
            <form name='prodotto' method='post' action='shopDB.php'>
            <label class='utente hidden'><input type ='text' name='utente' value='$email' readonly ></label>
            <label class='prod_img'><input type='text' name='img' value='None' readonly><img src=''></label>
            <label class='nome_prod'><input type='text' name='prodotto' value='' readonly></label>
            <label class='price'><input type='text' name='prezzo' value='' readonly></label>
            <label class='button_shop' data-row='$prod_type[$row]' data-prod_ref='$view$i'><input type='submit' value='Aggiungi al Carrello'></label></form>";
        } else {
            $stringa_prod_content = "<form name='prodotto' method='post' action='shopDB.php'>
            <label class='utente hidden'><input type ='text' name='utente' value='$email' readonly></label>
              <label class='prod_img'><input type='text' name='img' value='None' readonly><img src=''></label>
              <label class='nome_prod'><input type='text' name='prodotto' value='' readonly></label>
              <label class='price'><input type='text' name='prezzo' value='' readonly></label>
              <label class='button_shop' data-row='$prod_type[$row]' data-prod_ref='$view$i'><input type='submit' value='Aggiungi al Carrello'></label></form>";
        }
        $prod_stringa = $prod_stringa."<div class='prodotto' data-row='$prod_type[$row]' data-prod_ref='$view$i'>$stringa_prod_content</div>";
    }
    return($prod_stringa);
}
function C_U_C($email, $row){
    $uns_cont = "";
    for($view = 1; $view <= 3; $view++){
       if($view === 1){
        $prod = create_prod($email,$row, $view);
        $views = "<div class='view$view' data-row ='$row' data-index='$view'><div class='prod_unseen_cont'>$prod</div></div>";
        }
        if($view > 1){
            $prod = create_prod($email,$row, $view);
            $views = $views."<div class='view$view hidden' data-row ='$row' data-index='$view'><div class='prod_unseen_cont'>$prod</div></div>"; 
        }
    }
    $uns_cont = "<div class='unseen_container'>$views</div>";
    return($uns_cont);
}
function C_D_C($row){   
    $dot_cont_stringa = "";
    for($j = 1; $j <=3; $j++){
        if($j === 1){
            $dot_stringa = "<span class='current_used_dot dot' data-row='$row' data-index='$j'></span>";
        }
        if($j > 1){
            $dot_stringa =$dot_stringa."<span class='dot' data-row='$row' data-index='$j'></span>"; 
        }
    }
    $dot_cont_stringa = "<div class='dot_container'>$dot_stringa</div>";
    return($dot_cont_stringa);
}

function C_P_V($email){
    $section_content = "";
    $prod_view = "<div class='products_view'></div>";
    for($row = 1; $row <= 5; $row++){
        if($row === 1){
            $intestazione = create_h1($row);
            $unseen_container= C_U_C($email,$row);  
            $dot_container = C_D_C($row);  
            $prod_view = "<div class='products_view'>$intestazione$unseen_container$dot_container</div>";
            $section_content = $prod_view;
        } else {
             $intestazione = create_h1($row);    
             $unseen_container= C_U_C($email,$row);   
             $dot_container = C_D_C($row);   
             $prod_view = "<div class='products_view'>$intestazione$unseen_container$dot_container</div>";
             $section_content = $section_content.$prod_view;
        }
    }
    return($section_content);
}
?>