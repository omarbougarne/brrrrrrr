<?php
class ScheduleController
{
    private $scheduleDAO;
    private $busDAO;
    private $companyDAO;
    private $routeDAO;
    public function __construct()
    {
        $this->scheduleDAO = new ScheduleDAO();
        $this->busDAO = new BusDAO();
        $this->companyDAO = new CompanyDAO();
        $this->routeDAO = new RouteDAO();
    }

    public function index()
    {
        // Retrieve all schedules
        $schedules = $this->scheduleDAO->getAllSchedules();

        // Pass the data to the view (you may have a specific view for listing schedules)
        include_once 'app/views/schedule/index.php';
    }

    public function create()
    {
        $schedules = $this->scheduleDAO->getAllSchedules();
        $buses = $this->busDAO->getAllBuses();
        $companies = $this->companyDAO->getAllCompanies();
        $routes = $this->routeDAO->getAllRoutes();
        // Display the form for creating a new schedule
        include_once 'app/views/schedule/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $date = $_POST['date'];
            $departureTime = $_POST['departureTime'];
            $arrivalTime = $_POST['arrivalTime'];
            $availableSeats = $_POST['availableSeats'];
            $busID = $_POST['bus'];
            $routeID = $_POST['route'];
            $companyID = $_POST['company'];
            $price = $_POST['price'];

            // Retrieve the selected bus and route based on IDs
            $selectedBus = $this->busDAO->getBusById($busID);
            $selectedRoute = $this->routeDAO->getRouteById($routeID);

            // Create a new Schedule object
            $schedule = new Schedule(null, $date, $departureTime, $arrivalTime, $availableSeats, $selectedBus, $selectedRoute, $companyID, $price);

            // Pass the Schedule object to the addSchedule method in ScheduleDAO
            $this->scheduleDAO->addSchedule($schedule);

            // Redirect to the index page or show the newly created schedule
            header("Location: index.php?action=scheduleindex");
            exit();
        }
    }


    public function edit($scheduleID)
    {
        $schedules = $this->scheduleDAO->getAllSchedules();
        $buses = $this->busDAO->getAllBuses();
        $companies = $this->companyDAO->getAllCompanies();
        $routes = $this->routeDAO->getAllRoutes();
        // Retrieve a specific schedule by ID to populate the edit form
        $schedule = $this->scheduleDAO->getScheduleById($scheduleID);
        // Display the form for editing the schedule
        include_once 'app/views/schedule/edit.php';
    }

    public function update($scheduleID)
    {
        // Handle the form submission to update an existing schedule in the database
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $date = $_POST['date'];
            $departureTime = $_POST['departureTime'];
            $arrivalTime = $_POST['arrivalTime'];
            $availableSeats = $_POST['availableSeats'];
            $busID = $_POST['bus'];
            $routeID = $_POST['route'];
            $companyID = $_POST['company'];
            $price = $_POST['price'];

            // Retrieve the existing schedule
            $existingSchedule = $this->scheduleDAO->getScheduleById($scheduleID);

            // Update its properties
            $existingSchedule->setDate($date);
            $existingSchedule->setDepartureTime($departureTime);
            $existingSchedule->setArrivalTime($arrivalTime);
            $existingSchedule->setAvailableSeats($availableSeats);
            $existingSchedule->setBusID($busID);
            $existingSchedule->setRouteID($routeID);
            $existingSchedule->setCompanyID($companyID);
            $existingSchedule->setPrice($price);

            // Pass the updated schedule object to the updateSchedule method in ScheduleDAO
            $this->scheduleDAO->updateSchedule($existingSchedule);

            // Redirect to the index page or show the updated schedule
            header("Location: index.php?action=scheduleindex");
            exit();
        } else {
            // Display an error or redirect to the edit page with a message
        }
    }

    public function delete($scheduleID)
    {
        // Retrieve a specific schedule by ID to confirm deletion
        $schedule = $this->scheduleDAO->getScheduleById($scheduleID);
        // Display the delete confirmation page
        include_once 'app/views/schedule/delete.php';
    }

    public function destroy($scheduleID)
    {
        // Delete a schedule by ID
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Call the deleteSchedule method in ScheduleDAO
            $this->scheduleDAO->deleteSchedule($scheduleID);

            // Redirect to the index page or show a success message
            header("Location: index.php?action=scheduleindex");
            exit();
        } else {
            // Display an error or redirect to the index page with a message
        }
    }
}