<?php 

if(isset($_POST["utente"]) && isset($_POST["img"]) && isset($_POST["prodotto"]) && isset($_POST["prezzo"])){
    
    $conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());
    
    $utente = mysqli_real_escape_string($conn, $_POST["utente"]);
    $prodotto = mysqli_real_escape_string($conn, $_POST["prodotto"]);
    $prezzo = mysqli_real_escape_string($conn, $_POST["prezzo"]);
    $img = mysqli_real_escape_string($conn, $_POST["img"]);

     $query_check = "SELECT * from Carrello where utente ='$utente' AND nome_prod = '$prodotto'";
     $res_check = mysqli_query($conn, $query_check) or die("Errore: ".mysqli_error($conn));
     if(mysqli_num_rows($res_check) > 0){
        $res_check_row = mysqli_fetch_assoc($res_check);
        $copie = $res_check_row["copie"];
        $new_copy_numb = $copie + 1;
        $query_copies = "UPDATE Carrello SET copie = '$new_copy_numb' WHERE utente ='$utente' AND nome_prod = '$prodotto'";
        $res_copies = mysqli_query($conn, $query_copies);
        mysqli_free_result($res_check);
        mysqli_close($conn);

        echo"Ho aggiornato le copie in tabella: $new_copy_numb";

  } else {
    $query_to_upload = "INSERT into Carrello(utente, nome_prod, prezzo, img, copie) values('$utente', '$prodotto', '$prezzo', '$img', 1)";
    $res_upload = mysqli_query($conn, $query_to_upload) or die("Errore: ".mysqli_error($conn));
    mysqli_close($conn);

    echo"Ho aggiornato i dati in tabella";
  }
} else {
    $errore = "Non ho ricevuto dati";
    echo"$errore";
}

?>