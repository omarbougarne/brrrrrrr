<?php

class City
{
    private $cityID;
    private $cityName;

    public function __construct($cityID, $cityName)
    {
        $this->cityID = $cityID;
        $this->cityName = $cityName;
    }

    public function getCityID()
    {
        return $this->cityID;
    }

    public function getCityName()
    {
        return $this->cityName;
    }

    // Add setters if needed
}
