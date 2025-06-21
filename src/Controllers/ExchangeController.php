<?php

namespace Vagrant\Exchange\Controllers;

use Illuminate\Http\Request;

class ExchangeController
{
    public function current()
    {
        $usd = [
            "CODE" => "840"
        ];
        $euro = [
            "CODE" => "978"
        ];
        $cny = [
            "CODE" => "156"
        ];

        $url = "https://www.cbr-xml-daily.ru/daily.xml";
        $xml = simplexml_load_file($url);

        foreach($xml->children() as $elem) {         
            if ($elem->NumCode == $usd["CODE"]) {
                $usd["VALUE"] = $elem->Value;
            }

            if ($elem->NumCode == $euro["CODE"]) {
                $euro["VALUE"] = $elem->Value;
            }

            if ($elem->NumCode == $cny["CODE"]) {
                $cny["VALUE"] = $elem->Value;
            }
        } 

        return "Доллар: " . $usd["VALUE"] . "<br>" . "Евро: " . $euro["VALUE"] . "<br>" . "Юань: " . $cny["VALUE"] . "<br>";
    }

}


