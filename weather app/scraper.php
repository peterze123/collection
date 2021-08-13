<?php
    $input = $_GET["city"];
    $key = "fca6be578a53575844cb96c4d6cf3d20";
    //
    $weather = @file_get_contents("https://www.weather-forecast.com/locations/". str_replace(" ", "-", $input)."/forecasts/latest");
    preg_match("/\"phrase\">(.*?)<\/span>/i", $weather, $contents);
    //
    $url = "api.openweathermap.org/data/2.5/weather?q=".$input."&appid=".$key;
    echo $contents[1];
?>