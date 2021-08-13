<?php
    $input = $_GET["city"];
    $key = "7ff477563d70270cdb86ffe033ca637d";
    $input = ucwords($input);
    //
    $weather = @file_get_contents("https://www.weather-forecast.com/locations/". str_replace(" ", "-", $input)."/forecasts/latest");
    preg_match("/\"phrase\">(.*?)<\/span>/i", $weather, $contents);
    //
    $url = "https://api.openweathermap.org/data/2.5/weather?q=".$input."&appid=".$key;
    $json = file_get_contents($url);
    $temp = json_decode($json);
    $temp = round(($temp->{'main'}->{'temp'} - 273.15));
    echo $contents[1];
    echo $temp;
?>