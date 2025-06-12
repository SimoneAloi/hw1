<?php 
require("CPV.php");
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
} else {
    $email = $_SESSION["username"];
}
?>

<html>
    <head>
        <title>Main Page</title>
        <link rel="stylesheet" href="index.css"/>
        <link rel="stylesheet" href="manga_view.css"/>
        <link rel="stylesheet" href="view_carrello.css"/>
        <script src="index1.js" defer></script>
        <script src="index2.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>  
       <div id ='view_carrello' class='hidden'>
            <div id="carrello"> 
                <h1>CARRELLO</h1>
                <?php 
                if(isset($_SESSION["username"])){
                    $conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());
                    $query_check = "SELECT * from Carrello where utente ='$email'";
                    $res_check = mysqli_query($conn, $query_check) or die("Errore: ".mysqli_error($conn));
                    if(mysqli_num_rows($res_check) > 0){
                        $tot_prodotti = 0;
                        $stringa = "";
                        while($row_check = mysqli_fetch_assoc($res_check)){
                            $name_prod = $row_check["nome_prod"];
                            $img_prod = $row_check["img"];
                            $price = $row_check["prezzo"];
                            $copie = $row_check["copie"];

                            $tot_prodotti = $tot_prodotti + $copie;

                            $prodotto_creato = "<div class='prodotto_carrello'><img src='$img_prod'>
                            <p>$name_prod</p><p>$price</p><p class='copie'>$copie</p></div>";
                            $stringa = $stringa.$prodotto_creato;
                        }                      
                        echo"<p>I prodotti nel carrello sono i seguenti:</p>
                            <div id='view_products_shop'>$stringa</div>
                            <div id='go_to_shop'><div><a href='carrello.php'>Procedi con l'acquisto</a></div></div>";
                    } else {
                        $tot_prodotti = 0;
                        echo"<p>Non ci sono prodotti nel carrello</p>
                        <div id='view_products_shop'></div>
                        <div id='go_to_shop' class='hidden'><div><a href='carrello.php'>Procedi con l'acquisto</a></div></div>";
                    }
                }            
                ?>
            </div>
        </div>

        <div id="manga_search_view" class='hidden'>
            <div id="manga_search_div">
                <div id="div_gestione"> 
                    <h2>Cerca qui il manga che ti interessa:</h2>
                    <p>Esci</p>
                </div>
                <form name="manga_search_form" method="get">
                    <input type='text' id='nome_manga' name="nome_manga" placeholder="Nome Manga">
                    <input type='submit'id="invio" value='Cerca'>
                </form>
                <div id="searched_manga">
                    <div id="searched_manga_img"></div>
                    <div id="searched_manga_info">
                        <div id="autore">
                            <h3>Autore/i:</h3>
                            <div></div>
                        </div>
                        <div id="genere">
                            <h3>Genere/i:</h3>
                            <div></div>
                        </div>
                        <div id="sinossi">
                            <h3>Sinossi:</h3>
                            <div></div>
                        </div>
                        <div id="div_spotify_API_TEST">
                            <h3>Album: </h3>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header>
            <nav id="nav_bar">
                <div id="nav_invisible">
                    <div class="links_for_client"><a>SERVIZIO CLIENTI</a></div>
                    <div class="links_for_client"> 
                        <?php echo"<p>$email</p><a href='logout.php'>ESCI</a>"?>
                        <a>LISTA DESIDERI: 0</a>
                        <a id="cart" data-prod_number = 0>
                            <?php 
                             if(isset($_SESSION["username"])){
                                echo"CARRELLO: $tot_prodotti";
                             } else {
                                echo"CARRELLO: 0";
                             }                
                            ?>
                        </a> 
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
                <div id="search_p">
                    <p>Cerca info su Manga</p>
                </div>
            </div>
             <div id="header_img">
                <img  src="https://mangayo.it/modules/an_homeslider/img/fc64b45952bc191b7055a6f1762215e9_1.jpg">
            </div>
            <div class="dot_container">
                <span class="current_used_dot dot" data-index = '1'></span>
                <span class="dot" data-index = '2'></span>
                <span class="dot" data-index = '3'></span>
                <span class="dot" data-index = '4'></span>
                <span class="dot" data-index = '5'></span>
            </div>
        </header>

        <section>
            <?php            
            $content = C_P_V($email);
            echo"$content";
            ?>
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