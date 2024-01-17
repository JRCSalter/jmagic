<?php
$url = "https://api.scryfall.com/sets";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$sets = curl_exec($curl);
curl_close($curl);

$sets = json_decode($sets, true);
$setStr = "";

foreach($sets["data"] as $set) {
    $setStr .= strtoupper($set["code"]) . " - " . $set["name"] . ";;";
}

$host = 'db';
$db   = 'jrcs';
$user = 'jrcs';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try{
$pdo = new PDO($dsn, $user, $pass, $options);
} catch(PDOException $e) {
    die( "Connection failed: " . $e->getMessage());
}

$stmt = $pdo->query('SELECT * FROM cards');
while ($row = $stmt->fetch())
{
    $url = "https://api.scryfall.com/cards/" . strtolower($row["set_code"]) . "/" . $row["collector_number"] . "/" . $row["lang"];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $card = curl_exec($curl);
    curl_close($curl);

    $card = json_decode($card, true);

    echo "<img src='" . $card["image_uris"]["normal"] . "'><br>";
}

?>

<x-layout title="JMagic - My Collection">
    <h2 role="heading" aria-level="2">My Collection</h2>

        <h3 role="heading" aria-level="3">Add to Collection</h3>


            <details>
                <summary>Add collection with file</summary>
                <form action="/collection/store" method="POST" enctype="multipart/form-data">
                    <x-form.file id="batch" />
                    <x-form.submit />
                </form>
            </details>

            <details>
                <summary>Add card</summary>
                <form action="/collection/store" method="POST">
                    <x-form.input id="name" />
                    <x-form.datalist id="set" options="{{ $setStr }}" />
                    <x-form.input id="cn" label="Collector Number" />
                    <x-form.select
                        id="condition"
                        options="Mint;;Near Mint;;Slightly Played;;Moderately Played;;Heavily Played;;Damaged"
                        required
                    />
                    <x-form.select
                        id="finish"
                        options="Non-Foil;;Pre-Modern Foil;;Traditional Foil;;From the Vault Foil;;Etched Foil;;Textured Foil;;Double Rainbow Foil;;Galaxy Foil;;Gilded Foil;;Halo Foil;;Neon Ink Foil;;Oil Slick Foil;;Silverscreen Foil;;Step and Compleat Foil;;Surge Foil"
                        required
                    />
                    <x-form.select
                        id="lang"
                        options="English;;Spanish;;French;;German;;Italian;;Portuguese;;Japanese;;Korean;;Russian;;Simplified Chinese;;Traditional Chinese;;Hebrew;;Latin;;Ancient Greek;;Arabic;;Sanskrit;;Phyrexian"
                        required
                    />
                    <x-form.textarea id="notes" />
                    <x-form.number id="quantity" value="1"/>
                    <x-form.number id="purchase" step="0.01" />
                    <x-form.checkbox id="alter" />
                    <x-form.checkbox id="proxy" />
                    <x-form.select id="binder" options="Binder 1;;Binder 2;;Binder 3"/>
                    <x-form.select id="deck" options="Deck 1;;Deck 2;;Deck 3"/>
                    <x-form.submit />
                </form>
            </details>

        <h3 role="heading" aria-level="3">View Collection</h3>

</x-layout>
