<?php

namespace App;

class DailyWeather
{
    private string $date;
    private string $condition;
    private float $avgTempC;
    private float $avgTempF;
    private float $maxWindKph;
    private string $icon;

    public function __construct(
        string $date,
        string $condition,
        float $avgTempC,
        float $avgTempF,
        float $maxWindKph,
        string $icon
    )
    {
        $this->date = $date;
        $this->condition = $condition;
        $this->avgTempC = $avgTempC;
        $this->avgTempF = $avgTempF;
        $this->maxWindKph = $maxWindKph;
        $this->icon = $icon;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function getAvgTempC(): float
    {
        return $this->avgTempC;
    }

    public function getAvgTempF(): float
    {
        return $this->avgTempF;
    }

    public function getMaxWindKph(): float
    {
        return $this->maxWindKph;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }
}