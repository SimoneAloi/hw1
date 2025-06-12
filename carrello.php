<?php
session_start();
if(isset($_SESSION["username"])){
    $nome_utente = $_SESSION["username"];
}
?>
<html>
    <head>
    <title>Pagina di Login</title>
    <link rel="stylesheet" href="carrello.css" />
    <script src="carrello.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body>
        <header>
            <nav id="nav_bar">
                <div id="nav_invisible">
                    <div class="links_for_client"><a>SERVIZIO CLIENTI</a></div>
                    <div class="links_for_client"> 
                        <p id="utente"><?php echo"$nome_utente"; ?></p>
                        <a>LISTA DESIDERI: 0</a>
                        <p id="carrello">CARRELLO</p> 
                    </div>
                </div>
            </nav>
            <div id="header_links">
                <div id="main_page_logo">
                    <a href="index.php"><img src="https://mangayo.it/modules/an_logo/img/d5721895b0230eef211ba65f3bdc34cf.svg"></a>
                </div>
                <div id="product_links">
                    <a>Novità</a>
                    <a>Manga</a>
                    <a>Giappone</a>
                    <a>Figure</a>
                    <a>Cardgame</a>
                    <a>Preordini</a>
                </div>
                <div id="search_link">
                    <a>Cerca</a>
                </div>
            </div>
        </header>

        <section>
            <div id ='msg_pag' class="hidden"><div><a href="index.php"></a></div></div>
            <div id="big_container">
                <div id="big_unseen_cont">
                    <div id="Products_view">
                        <?php 
                        $conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());
                        $utente = mysqli_real_escape_string($conn, $nome_utente);
                
                        $query = "SELECT * from Carrello where utente ='$utente'";
                
                        $res = mysqli_query($conn, $query ) or die("Errore: ".mysqli_error($conn));
                        if(mysqli_num_rows($res) > 0){
                            $costo_totale = 5.50;
                            $prezzo_prodotti = 0;
                            $articoli = 0;
                            
                            while($res_row = mysqli_fetch_assoc($res)){
                                $name_prod = $res_row["nome_prod"];
                                $img_prod = $res_row["img"];
                                $price_stringa = $res_row["prezzo"];
                                $copie = $res_row["copie"];
                        
                                $prezzo_num = floatval($price_stringa);
                                $prezzo_totale_prod = $prezzo_num * $copie;
                                $costo_totale = $costo_totale + $prezzo_totale_prod;
                                $prezzo_prodotti = $prezzo_prodotti + $prezzo_totale_prod;
                                $articoli = $articoli + 1;
                                
                                echo"<div class='single_prod'><img src='$img_prod'>
                                <p class='name_prod'>$name_prod</p>
                                <div class='prezzo_copie'><p class='costo'>$prezzo_totale_prod €</p>
                                <p class='copie'>Copie: $copie</p></div></div>";
                            }
                            mysqli_free_result($res);
                            mysqli_close($conn);
                            } ?></div>
                    <div id="Info_pagamento">
                        <div id="articoli"><p><?php echo"$articoli"?>articoli</p><p class="costo"><?php echo"$prezzo_prodotti"?>€</p></div>
                        <div id="spedizione"><p>Spedizione</p><p class="costo">5.50 €</p></div>
                        <div id="totale"><p>TOTALE</p><?php $totale = $prezzo_prodotti + 5.50; echo"<p class='costo'>$totale €</p>"?></div>
                        <div class="pagamento"><p>Procedi con il checkout</p></div>
                    </div>
                </div>
            </div>
        </section>
        
        <footer>
            <div id="footer_div1">
                <div class="footer_info">
                    <div id="footer_logo">
                        <img src="https://mangayo.it/modules/an_logo/img/d5721895b0230eef211ba65f3bdc34cf.svg">
                    </div>
                    <div id="after_logo_info">
                        <p>Via Gaetano Negri, 14</p>
                        <p>20081 Abbiategrasso</p>
                        <p>Milano</p>
                        <p>Italia</p>
                        <p>servizioclienti@mangayo.it</p>
                        <p><a>Contattaci su <span>Whatsapp</span></a></p>
                    </div>
                    <div id="socials">
                        <a>Facebook</a>
                        <a>Instagram</a>
                    </div>
                </div>     
                <div class="footer_info">
                    <p class="footer_intest">PRODOTTI</p>
                    <a>Novità</a>
                    <a>Manga</a>
                    <a>Giappone</a>
                    <a>Figure</a>
                    <a>Cardgame</a>
                    <a>Preordini</a>
                </div>
                <div class="footer_info">
                    <p class="footer_intest">INFORMAZIONI</p>
                    <p>Ambiente</p>
                    <p>Termini e Condizioni</p>
                    <p>Spedizione e Resi</p>
                    <p>Carta del docente</p>
                    <p>Privacy Policy</p>
                    <p>Cookie Policy</p>
                    <p>Cancellazione Account</p>
                    <p>Domande Frequenti</p>
                    <p>Lavora con Noi</p>
                    <p>Carte Cultura</p>
                    <p>Contattaci</p>
                </div>
                <div class="footer_info">
                    <p class="footer_intest">IL TUO ACCOUNT</p>
                    <p>Informazioni Personali</p>
                    <p>Ordini</p>
                    <p>Note di Credito</p>
                    <p>Indirizzi</p>
                    <p>Buoni</p>
                </div>
            </div>
            <div id="footer_div2">
                <div id="last_link">
                    <p><a>©2025 MangaYo! s.r.l.</a> P.IVA: 15931551004</p>
                </div>
                <div id="payment_imgs">
                    <div>
                        <img src="https://mangayo.it/modules/an_trust_badges/icons/c945d6f2401779f66c47dd3eca37f85e.jpg">
                        <img src="https://mangayo.it/modules/an_trust_badges/icons/49ecf7e5a4060590c2706e4c05be7571.jpg">
                        <img src="https://mangayo.it/modules/an_trust_badges/icons/04e7920be72f572db303920fa4149162.jpg">
                        <img src="https://mangayo.it/modules/an_trust_badges/icons/1ab6211526ecfc2459eb80f8d1037fba.jpg">
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>