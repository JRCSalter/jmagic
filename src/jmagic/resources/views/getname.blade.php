<?php

$cn = $_GET["cn"];
$set = $_GET["set"];
$url = "https://api.scryfall.com/cards/" . $set . "/" . $cn;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$card = curl_exec($curl);
curl_close($curl);

$card = json_decode($card, true);

if ($card["object"] == "error") {
    echo "-";
} else {

echo $card["name"];
}

