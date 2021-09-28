<?php

namespace App;

class HourlyWeather
{
    private string $time;
    private float $tempC;
    private float $tempF;
    private string $condition;
    private string $icon;
    private string $wind;
    private string $windDir;

    public function __construct(string $time, string $condition, float $tempC, float $tempF, string $icon, string $wind, string $windDir)
    {
        $this->time = $time;
        $this->condition = $condition;
        $this->tempC = $tempC;
        $this->tempF = $tempF;
        $this->icon = $icon;
        $this->wind = $wind;
        $this->windDir = $windDir;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function getTempC(): float
    {
        return $this->tempC;
    }

    public function getTempF(): float
    {
        return $this->tempF;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getWind(): string
    {
        return $this->wind;
    }

    public function getWindDir(): string
    {
        return $this->windDir;
    }

}