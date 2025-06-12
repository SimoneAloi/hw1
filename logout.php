<?php

session_start();

$nome_utente = $_SESSION["username"];

$conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());
$utente = mysqli_real_escape_string($conn, $nome_utente);
$query = "DELETE from Carrello where utente ='$utente'";
$res = mysqli_query($conn, $query ) or die("Errore: ".mysqli_error($conn));
mysqli_close($conn);


session_destroy();

header("Location: login.php");
exit();

?>