<?php
// Avvia la sessione
session_start();

// Verifica l'accesso
if(isset($_SESSION["nome"])){
  header("Location: index.php");
  exit;
}

//Verifichiamo l'esistenza dei dati post
if(isset($_POST["email"]) && isset($_POST["password"])){

  //Connessione al database:
  $conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());

  //Cerco utente con le credenziali trasmesse dal form
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $query = "SELECT * FROM Profilo where email='$email' AND password='$password'";
  $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

  if(mysqli_num_rows($res) > 0){
    $assoc_res = mysqli_fetch_assoc($res);
    $_SESSION["username"] = $email;
    $_SESSION["nome"] = $assoc_res['nome'];
    header("Location: index.php");
    mysqli_free_result($res);
    mysqli_close($conn);
    exit;
  } else {
    $errore = "Credenziali non valide";
  }
}
?>

<html>
    <head>
     <title>Pagina di Login</title>
     <link rel="stylesheet" href="login.css" />
     <script src="login.js" defer></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

  <body>
  <header>
    <nav id="nav_bar">
      <div id="nav_invisible">
        <div class="links_for_client"><a>SERVIZIO CLIENTI</a></div>
        <div class="links_for_client"> 
          <a href="login.php">ACCEDI</a>
          <a>LISTA DESIDERI: 0</a>
          <a id="carrello">CARRELLO: 0</a> 
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
    <img src="https://mangayo.it/themes/mangayo_font/YoChanLogin.gif">
    <h1>Accedi al tuo account</h1>
      <form name="login" method="post"> 
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Password (minimo 8 caratteri)" name="password">
        <input id="submit" type="submit" value="Accedi">
      </form>
      <div id="after_form_links">
          <a>Hai dimenticato la password?</a>
          <a id="account_create_link" href="sign_in.php">Crea un account!</a>
        </div>
        <?php 
        if(isset($errore)){
          echo"<div id='errore'>$errore</div>";
        } else {
          echo"<div id='errore' class='hidden'></div>";
        }
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