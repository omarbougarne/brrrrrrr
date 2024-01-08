<?php
class Route
{
    private $routeID;
    private $startCity;
    private $endCity;
    private $distance;
    private $duration;

    public function __construct($routeID, $startCity, $endCity, $distance, $duration)
    {
        $this->routeID = $routeID;
        $this->startCity = $startCity;
        $this->endCity = $endCity;
        $this->distance = $distance;
        $this->duration = $duration;
    }

    public function getRouteID()
    {
        return $this->routeID;
    }

    public function getStartCity()
    {
        return $this->startCity;
    }

    public function getEndCity()
    {
        return $this->endCity;
    }

    public function getStartCityName()
    {
        return $this->startCity ? $this->startCity->getCityName() : 'Unknown';
    }

    public function getEndCityName()
    {
        return $this->endCity ? $this->endCity->getCityName() : 'Unknown';
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    // Add setters if needed
    public function setStartCity($startCity)
    {
        $this->startCity = $startCity;
    }

    public function setEndCity($endCity)
    {
        $this->endCity = $endCity;
    }

    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
}