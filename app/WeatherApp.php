<?php

namespace App;

class WeatherApp
{
    private string $key;
    private string $city;

    public function __construct(string $key, string $city)
    {
        $this->key = $key;
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}