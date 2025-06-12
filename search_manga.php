<?php 

if(isset($_GET["nome_manga"])){

    $nome_manga = urlencode($GET["nome_manga"]);
    $url = 'https://api.jikan.moe/v4/manga?q='.$nome_manga;
    $curl = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    curl_close($curl);


    header('Content-type: application/json');

    echo json_encode($result);
}
?>