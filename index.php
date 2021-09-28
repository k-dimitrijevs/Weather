<?php

require_once "vendor/autoload.php";

use App\WeatherApp;
use App\DailyWeather;

$urlStart = 'http://api.weatherapi.com/v1/forecast.json?key=';

$weatherAppData = new WeatherApp('2d248612548242ecb3180131212809', "Riga");
$weatherData = json_decode(
    file_get_contents(
        $urlStart . $weatherAppData->getKey() .'&q=' . $weatherAppData->getCity() .'&days=3&aqi=no&alerts=no'
    )
);

if (isset($_POST['search']))
{
    $weatherAppData = new WeatherApp('2d248612548242ecb3180131212809', $_POST['searchCity']);
    $weatherData = json_decode(
        file_get_contents(
            $urlStart . $weatherAppData->getKey() .'&q=' . $weatherAppData->getCity() .'&days=3&aqi=no&alerts=no'
        )
    );
}

for ($i = 0; $i < 3; $i++)
{
    $days[] = new DailyWeather(
        $weatherData->forecast->forecastday[$i]->date,
        $weatherData->forecast->forecastday[$i]->day->condition->text,
        $weatherData->forecast->forecastday[$i]->day->avgtemp_c,
        $weatherData->forecast->forecastday[$i]->day->avgtemp_f,
        $weatherData->forecast->forecastday[$i]->day->maxwind_kph,
        $weatherData->forecast->forecastday[$i]->day->condition->icon,
    );
}

require_once "template.php";
