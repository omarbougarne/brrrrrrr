<?php

include_once 'DatabaseDAO.php';
include_once 'City.php';

class CityDAO extends DatabaseDAO
{
    public function getAllCities()
    {
        $query = "SELECT * FROM City";
        $cityData = $this->fetchAll($query);

        $cities = array();
        foreach ($cityData as $cityRow) {
            $cities[] = new City($cityRow['cityID'], $cityRow['cityName']);
        }

        return $cities;
    }

    public function getCityById($cityID)
    {
        $query = "SELECT * FROM City WHERE cityID = :cityID";
        $params = [':cityID' => $cityID];
        $cityData = $this->fetch($query, $params);

        if ($cityData) {
            return new City($cityData['cityID'], $cityData['cityName']);
        }

        return null; // Return null if city with given ID is not found
    }
}