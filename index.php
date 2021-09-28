<?php

require_once "vendor/autoload.php";

use App\WeatherApp;
use App\DailyWeather;
use App\HourlyWeather;

$urlStart = 'http://api.weatherapi.com/v1/forecast.json?key=';
$currentTime = date("H");

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

for ($j = 0; $j < 6; $j++)
{
    if (($currentTime + $j) >= 24) $currentTime = 0;
    $hours[] = new HourlyWeather(
        $weatherData->forecast->forecastday[0]->hour[$currentTime + $j]->time,
        $weatherData->forecast->forecastday[0]->hour[$currentTime + $j]->condition->text,
        $weatherData->forecast->forecastday[0]->hour[$currentTime + $j]->temp_c,
        $weatherData->forecast->forecastday[0]->hour[$currentTime + $j]->temp_f,
        $weatherData->forecast->forecastday[0]->hour[$currentTime + $j]->condition->icon,
        $weatherData->forecast->forecastday[0]->hour[$currentTime + $j]->wind_kph,
        $weatherData->forecast->forecastday[0]->hour[$currentTime + $j]->wind_dir,
    );
}


require_once "template.php";
