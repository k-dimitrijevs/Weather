<?php

require_once "vendor/autoload.php";

use App\WeatherApp;
use App\DailyWeather;

if (isset($_POST['search']))
{
    $weatherAppData = new WeatherApp('2d248612548242ecb3180131212809', $_POST['searchCity']);
    $weatherData = json_decode(
        file_get_contents(
            'http://api.weatherapi.com/v1/forecast.json?key=' . $weatherAppData->getKey() .'&q=' . $weatherAppData->getCity() .'&days=3&aqi=no&alerts=no'
        )
    );
} else {
    $weatherAppData = new WeatherApp('2d248612548242ecb3180131212809', "Riga");
    $weatherData = json_decode(
        file_get_contents(
            'http://api.weatherapi.com/v1/forecast.json?key=' . $weatherAppData->getKey() .'&q=' . $weatherAppData->getCity() .'&days=3&aqi=no&alerts=no'
        )
    );
}

$today = new DailyWeather(
    $weatherData->forecast->forecastday[0]->date,
    $weatherData->forecast->forecastday[0]->day->condition->text,
    $weatherData->forecast->forecastday[0]->day->avgtemp_c,
    $weatherData->forecast->forecastday[0]->day->avgtemp_f,
    $weatherData->forecast->forecastday[0]->day->maxwind_kph,
    $weatherData->forecast->forecastday[0]->day->condition->icon,
);

$tomorrow = new DailyWeather(
    $weatherData->forecast->forecastday[1]->date,
    $weatherData->forecast->forecastday[1]->day->condition->text,
    $weatherData->forecast->forecastday[1]->day->avgtemp_c,
    $weatherData->forecast->forecastday[1]->day->avgtemp_f,
    $weatherData->forecast->forecastday[1]->day->maxwind_kph,
    $weatherData->forecast->forecastday[1]->day->condition->icon,
);

$dayAfterTomorrow = new DailyWeather(
    $weatherData->forecast->forecastday[2]->date,
    $weatherData->forecast->forecastday[2]->day->condition->text,
    $weatherData->forecast->forecastday[2]->day->avgtemp_c,
    $weatherData->forecast->forecastday[2]->day->avgtemp_f,
    $weatherData->forecast->forecastday[2]->day->maxwind_kph,
    $weatherData->forecast->forecastday[2]->day->condition->icon,
);


require_once "template.php";
