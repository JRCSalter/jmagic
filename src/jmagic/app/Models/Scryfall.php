<?php

namespace App\Models;

class Scryfall
{

    public const TREATMENTS = [
        "Non-Foil",
        "Pre-Modern Foil",
        "Traditional Foil",
        "From the Vault Foil",
        "Etched Foil",
        "Textured Foil",
        "Double Rainbow Foil",
        "Galaxy Foil",
        "Gilded Foil",
        "Halo Foil",
        "Neon Ink Foil",
        "Oil Slick Foil",
        "Silverscreen Foil",
        "Step and Compleat Foil",
        "Surge Foil",
    ];

    public const LANGUAGES = [
        "en" => "English",
        "es" => "Spanish",
        "fr" => "French",
        "de" => "German",
        "it" => "Italian",
        "pt" => "Portuguese",
        "ja" => "Japanese",
        "ko" => "Korean",
        "ru" => "Russian",
        "zhs" => "Simplified Chinese",
        "zht" => "Traditional Chinese",
        "he" => "Hebrew",
        "la" => "Latin",
        "grc" => "Ancient Greek",
        "ar" => "Arabic",
        "sa" => "Sanskrit",
        "ph" => "Phyrexian",
    ];

    public const CONDITIONS = [
        "m" => "Mint",
        "nm" => "Near Mint",
        "sp" => "Slightly Played",
        "mp" => "Moderately Played",
        "hp" => "Heavily Played",
        "dmg" => "Damaged",
    ];

    /**
     * Get info from the Scryfall API.
     * 
     * @param string $url The URL to get from.
     * 
     * @return array A PHP array containing all the retrieved info.
     */
    public static function getAPI(string $url): array
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $jsonStr = curl_exec($curl);
        curl_close($curl);

        return json_decode($jsonStr, true);
    }

    /**
     * Get card with set, collector number, and language.
     * 
     * @param string $set The set abbreviation.
     * @param string $cn  The collector number.
     * @param string $lang The language code.
     *     Deafults to 'en'.
     * 
     * @return array The full information about a card.
     */
    public static function getCard(string $set, string $cn, string $lang ="en"): array
    {
        $set = strtolower($set);
        return Scryfall::getAPI("https://api.scryfall.com/cards/" . $set . "/" . $cn . "/" . $lang);
    }

    public static function getSets()
    {
        return Scryfall::getAPI("https://api.scryfall.com/sets")["data"];
    }

    public static function getSetNames()
    {
        $sets = Scryfall::getSets();
        $setNames = [];

        foreach($sets as $set) {
            $setNames[] = strtoupper($set["code"]) . " - " . $set["name"];
        }

        return $setNames;
    }

    public static function getCardNames()
    {
        return Scryfall::getAPI("https://api.scryfall.com/catalog/card-names")["data"];
    }
}

