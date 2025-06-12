<?php
if(isset($_GET["tipo"])){

    $tipo = $_GET["tipo"];
    $conn = mysqli_connect("localhost", "root", "", "hmw1_webprog") or die("Errore: ".mysqli_connect_error());
    $query = "SELECT * FROM Prodotti where tipo ='$tipo'";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($res)){
        $prodotti[] = $row;
    }
    
    mysqli_free_result($res);
    mysqli_close($conn);

    echo json_encode($prodotti);
}
?>
