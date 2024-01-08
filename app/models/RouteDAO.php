<?php

include_once 'DatabaseDAO.php';
include_once 'CityDAO.php';
include_once 'Route.php';
class RouteDAO extends DatabaseDAO
{
    public function getAllRoutes()
    {
        $query = "SELECT * FROM Route";
        $result = $this->fetchAll($query);
        $routes = array();
        foreach ($result as $row) {
            $CityDao = new CityDao();
            $startcity = $CityDao->getCityById($row['startCityID']);
            $endcity = $CityDao->getCityById($row['endCityID']);
            $routes[] = new Route($row['routeID'], $startcity, $endcity, $row['distance'], $row['duration']);
        }
        return $routes;
    }

    public function getRouteById($routeID)
    {
        $query = "SELECT * FROM Route WHERE routeID = :routeID";
        $params = [':routeID' => $routeID];
        $result = $this->fetch($query, $params);
        $CityDao = new CityDao();
        $startcity = $CityDao->getCityById($result['startCityID']);
        $endcity = $CityDao->getCityById($result['endCityID']);
        return new Route($result['routeID'], $startcity, $endcity, $result['distance'], $result['duration']); // Return null if route with given ID is not found
    }

    public function addRoute($route)
    {
        $startCityID = $route->getStartCity()->getCityID();
        $endCityID = $route->getEndCity()->getCityID();
        $distance = $route->getDistance();
        $duration = $route->getDuration();

        $query = "INSERT INTO Route (startCityID, endCityID, distance, duration) 
                  VALUES (:startCityID, :endCityID, :distance, :duration)";
        $params = [
            ':startCityID' => $startCityID,
            ':endCityID' => $endCityID,
            ':distance' => $distance,
            ':duration' => $duration
        ];

        $this->execute($query, $params);
    }

    public function updateRoute($route)
    {
        $routeID = $route->getRouteID();
        $startCityID = $route->getStartCity()->getCityID();
        $endCityID = $route->getEndCity()->getCityID();
        $distance = $route->getDistance();
        $duration = $route->getDuration();

        $query = "UPDATE Route SET startCityID = :startCityID, endCityID = :endCityID, 
                  distance = :distance, duration = :duration 
                  WHERE routeID = :routeID";
        $params = [
            ':routeID' => $routeID,
            ':startCityID' => $startCityID,
            ':endCityID' => $endCityID,
            ':distance' => $distance,
            ':duration' => $duration
        ];

        $this->execute($query, $params);
    }

    public function deleteRoute($routeID)
    {
        $query = "DELETE FROM Route WHERE routeID = :routeID";
        $params = [':routeID' => $routeID];

        $this->execute($query, $params);
    }
}