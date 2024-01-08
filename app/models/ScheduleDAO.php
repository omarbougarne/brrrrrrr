<?php

include_once 'DatabaseDAO.php';
include_once 'RouteDAO.php';
include_once 'BusDAO.php';
include_once 'Schedule.php';

class ScheduleDAO extends DatabaseDAO
{
    public function getAllSchedules()
    {
        $query = "SELECT * FROM Schedule";
        $result = $this->fetchAll($query);
        $schedules = array();
        foreach ($result as $row) {
            $BusDao = new BusDao();
            $RouteDao = new RouteDao();
            $bus = $BusDao->getBusById($row['busID']);
            $route = $RouteDao->getRouteById($row['routeID']);

            $schedules[] = new Schedule($row['scheduleID'], $row['date'], $row['departureTime'], $row['arrivalTime'], $row['availableSeats'], $bus, $route, $bus->getCompany()->getCompanyID(), $row['price']);
        }
        return $schedules;
    }

    public function getScheduleById($scheduleID)
    {
        $query = "SELECT * FROM Schedule WHERE scheduleID = :scheduleID";
        $params = [':scheduleID' => $scheduleID];
        $result = $this->fetch($query, $params);
        $BusDao = new BusDao();
        $RouteDao = new RouteDao();
        $bus = $BusDao->getBusById($result['busID']);
        $route = $RouteDao->getRouteById($result['routeID']);
        return new Schedule(
            $result['scheduleID'],
            $result['date'],
            $result['departureTime'],
            $result['arrivalTime'],
            $result['availableSeats'],
            $bus,
            $route,
            isset($result['companyImage']) ? $result['companyImage'] : null,
            $result['price']
        );

    }
    public function addSchedule($schedule)
    {
        $date = $schedule->getDate();
        $departureTime = $schedule->getDepartureTime();
        $arrivalTime = $schedule->getArrivalTime();
        $availableSeats = $schedule->getAvailableSeats();
        $busID = $schedule->getBus()->getBusID();
        $routeID = $schedule->getRoute()->getRouteID();

        $query = "INSERT INTO Schedule (date, departureTime, arrivalTime, availableSeats, busID, routeID) 
                  VALUES (:date, :departureTime, :arrivalTime, :availableSeats, :busID, :routeID)";
        $params = [
            ':date' => $date,
            ':departureTime' => $departureTime,
            ':arrivalTime' => $arrivalTime,
            ':availableSeats' => $availableSeats,
            ':busID' => $busID,
            ':routeID' => $routeID
        ];

        return $this->execute($query, $params);
    }

    public function updateSchedule($schedule)
    {
        $scheduleID = $schedule->getScheduleID();
        $date = $schedule->getDate();
        $departureTime = $schedule->getDepartureTime();
        $arrivalTime = $schedule->getArrivalTime();
        $availableSeats = $schedule->getAvailableSeats();
        $busID = $schedule->getBusID();
        $routeID = $schedule->getRouteID();
        $price = $schedule->getPrice();

        $query = "UPDATE Schedule SET date = :date, departureTime = :departureTime, 
                  arrivalTime = :arrivalTime, availableSeats = :availableSeats, 
                  busID = :busID, routeID = :routeID , price = :price
                  WHERE scheduleID = :scheduleID";
        $params = [
            ':scheduleID' => $scheduleID,
            ':date' => $date,
            ':departureTime' => $departureTime,
            ':arrivalTime' => $arrivalTime,
            ':availableSeats' => $availableSeats,
            ':busID' => $busID,
            ':routeID' => $routeID,
            ':price' => $price
        ];

        return $this->execute($query, $params);
    }

    public function deleteSchedule($scheduleID)
    {
        $query = "DELETE FROM Schedule WHERE scheduleID = :scheduleID";
        $params = [':scheduleID' => $scheduleID];

        return $this->execute($query, $params);
    }
    public function getScheduelByEndCityStartCity($date, $endCity, $startCity, $places)
    {
        $query = "SELECT Schedule.*, Route.*, Company.companyImage AS companyImage
        FROM Schedule
        INNER JOIN Route ON Schedule.routeID = Route.routeID
        INNER JOIN Bus ON Schedule.busID = Bus.busID
        INNER JOIN Company ON Bus.companyID = Company.companyID
        WHERE Schedule.date >= :date
        AND Schedule.availableSeats >= :places
        AND Route.startCityID = :startCity
        AND Route.endCityID = :endCity";




        $params = [
            ':date' => $date,
            ':endCity' => $endCity,
            ':startCity' => $startCity,
            ':places' => $places
        ];

        $result = $this->fetchAll($query, $params);
        $scheduels = array();

        foreach ($result as $row) {
            $BusDao = new BusDao();
            $RouteDao = new RouteDao();
            $bus = $BusDao->getBusById($row['busID']);
            $route = $RouteDao->getRouteById($row['routeID']);
            $scheduels[] = new Schedule(
                $row['scheduleID'],
                $row['date'],
                $row['departureTime'],
                $row['arrivalTime'],
                $row['availableSeats'],
                $bus,
                $route,
                $row['companyImage'],
                $row['price']
            );
        }

        return $scheduels;
    }


}