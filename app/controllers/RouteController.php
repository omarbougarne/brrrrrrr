<?php
class RouteController
{
    private $routeDAO;
    private $cityDAO; // Assuming you have a CityDAO

    public function __construct()
    {
        $this->routeDAO = new RouteDAO();
        $this->cityDAO = new CityDAO(); // Assuming you have a CityDAO
    }

    public function index()
    {
        // Retrieve all routes
        $routes = $this->routeDAO->getAllRoutes();

        // Pass the data to the view (you may have a specific view for listing routes)
        include_once 'app/views/route/index.php';
    }

    public function create()
    {   // Retrieve all cities (you may have a method in CityDAO to get all cities)
        $cities = $this->cityDAO->getAllCities();
        // Display the form for creating a new route
        include_once 'app/views/route/create.php';
    }

    public function store()
    {
        // Handle the form submission to store a new route in the database
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $startCityID = $_POST['startCity'];
            $endCityID = $_POST['endCity'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];

            // Retrieve City objects based on IDs
            $startCity = $this->cityDAO->getCityById($startCityID);
            $endCity = $this->cityDAO->getCityById($endCityID);

            // Check if cities are found

            // Create a new Route object
            $route = new Route(null, $startCity, $endCity, $distance, $duration);

            // Pass the route object to the addRoute method in RouteDAO
            $this->routeDAO->addRoute($route);
            // Redirect to the index page or show the newly created route
            header("Location: index.php?action=routeindex");
            exit();
        }
    }

    public function edit($routeID)
    {
        // Retrieve a specific route by ID to populate the edit form
        $route = $this->routeDAO->getRouteById($routeID);

        // Retrieve all cities (you may have a method in CityDAO to get all cities)
        $cities = $this->cityDAO->getAllCities();

        // Display the form for editing the route
        include_once 'app/views/route/edit.php';
    }

    public function update($routeID)
    {
        // Handle the form submission to update an existing route in the database
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $startCityID = $_POST['startCity'];
            $endCityID = $_POST['endCity'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];

            // Retrieve existing route and City objects
            $existingRoute = $this->routeDAO->getRouteById($routeID);
            $startCity = $this->cityDAO->getCityById($startCityID);
            $endCity = $this->cityDAO->getCityById($endCityID);

            // Update the existing route properties
            $existingRoute->setStartCity($startCity);
            $existingRoute->setEndCity($endCity);
            $existingRoute->setDistance($distance);
            $existingRoute->setDuration($duration);

            // Pass the updated route object to the updateRoute method in RouteDAO
            $this->routeDAO->updateRoute($existingRoute);

            // Redirect to the index page or show the updated route
            header("Location: index.php?action=routeindex");
            exit();
        } else {
            // Display an error or redirect to the edit page with a message
        }
    }

    public function delete($routeID)
    {
        // Retrieve a specific route by ID to confirm deletion
        $route = $this->routeDAO->getRouteById($routeID);

        // Display the delete confirmation page
        include_once 'app/views/route/delete.php';
    }

    public function destroy($routeID)
    {
        // Delete a route by ID
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Call the deleteRoute method in RouteDAO
            $this->routeDAO->deleteRoute($routeID);

            // Redirect to the index page or show a success message
            header("Location: index.php?action=routeindex");
            exit();
        } else {
            // Display an error or redirect to the index page with a message
        }
    }
}
?>