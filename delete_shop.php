<?php 

if(isset($_GET["utente"])){
    $nome_utente = $_GET["utente"];
    $conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());
    $utente = mysqli_real_escape_string($conn, $nome_utente);
    $query = "DELETE from Carrello where utente = '$utente'";
    $res = mysqli_query($conn, $query ) or die("Errore: ".mysqli_error($conn));   
    mysqli_close($conn);
    echo"Ho eliminato lo shop di $utente";
} else {
    $errore = "Chiamata anomala, i dati non sono stati ricevuti";
    echo"$errore";
}
?>