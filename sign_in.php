<?php 
if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["genere"])){

  //Connessione al database:
  $conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());

  //Costruisco le basi per l'invio al database dei dai ricevuti dal client
  $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
  $cognome = mysqli_real_escape_string($conn, $_POST["cognome"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $gender = mysqli_real_escape_string($conn, $_POST["genere"]);

  $query_check = "SELECT * from Profilo where email='".$email."'";
  $res_check = mysqli_query($conn, $query_check) or die("Errore: ".mysqli_error($conn));
  if(mysqli_num_rows($res_check) > 0){
    $errore = "Email già usata, inserirne una differente";
    mysqli_free_result($res_check);
    mysqli_close($conn);
  } else {
    $query_to_upload = "INSERT into Profilo(nome, cognome, genere, email, password) values('$nome', '$cognome', '$gender', '$email', '$password')";
    $res_upload = mysqli_query($conn, $query_to_upload) or die("Errore: ".mysqli_error($conn));
    mysqli_close($conn);

    header("Location: login.php");
    exit;
  }
}
?>
<html>
    <head>
        <title>Pagina di Registrazione</title>
        <link rel="stylesheet" href="sign_in.css" />
        <script src="sign_in.js" defer></script>
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
   <h1>Crea un account</h1>
   <div id="link_for_access">
     <p>Hai già un account?</p>
     <a href="login.php">Invece accedi!</a>
   </div>
     <form name="registrazione" method="post">
       <label class="text-info">Nome<input type="text" name="nome"></label>
       <label class="text-info">Cognome<input type="text" name="cognome"></label>
       <label class="text-info">Email<input type="text" name="email"></label>
       <label class="text-info">Password<input type="password" name="password"></label>
       <label>Genere:
         <input type="radio" name="genere" value="Uomo">Uomo
         <input type="radio" name="genere" value="Donna">Donna
         <input type="radio" name="genere" value="Non-binario">Non-binario
         <input type="radio" name="genere" value="Non-Specificato">Non-Specificato
       </label>
       <label id="submit_container"><input type="submit" value="Registrati"></label>
     </form>
   <?php 
        if(isset($errore)){
          echo"<div id='errore'><p>$errore</p></div>";
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