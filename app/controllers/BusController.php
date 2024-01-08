<?php

class BusController
{
    private $busDAO;
    private $companyDAO;

    public function __construct()
    {
        $this->busDAO = new BusDAO();
        $this->companyDAO = new CompanyDAO();
    }

    public function index()
    {
        // Retrieve all buses
        $buses = $this->busDAO->getAllBuses();

        // Pass the data to the view (you may have a specific view for listing buses)
        include_once 'app/views/bus/index.php';
    }

    public function create()
    {
        $companies = $this->companyDAO->getAllCompanies();
        // Display the form for creating a new bus
        include_once 'app/views/bus/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $busNumber = $_POST['busNumber'];
            $licensePlate = $_POST['licensePlate'];
            $companyID = $_POST['company']; // Assuming this is the company ID from the form
            $capacity = $_POST['capacity'];

            // Retrieve Company object based on ID
            $company = $this->companyDAO->getCompanyById($companyID);
            // Create a new Bus object
            $bus = new Bus(null, $busNumber, $licensePlate, $company, $capacity);

            // Pass the Bus object to the addBus method in BusDAO
            $this->busDAO->addBus($bus);

            // Redirect to the index page or show the newly created bus
            header("Location: index.php?action=busindex");
            exit();
        }
    }

    public function edit($busID)
    {
        // Retrieve a specific bus by ID to populate the edit form
        $bus = $this->busDAO->getBusById($busID);

        // Fetch the list of companies
        $companies = $this->companyDAO->getAllCompanies();

        // Display the form for editing the bus
        include_once 'app/views/bus/edit.php';
    }

    public function update($busID)
    {
        // Handle the form submission to update an existing bus in the database
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $busNumber = $_POST['busNumber'];
            $licensePlate = $_POST['licensePlate'];
            $companyID = $_POST['company']; // Assuming this is the company ID from the form
            $capacity = $_POST['capacity'];

            // Retrieve the existing bus
            $existingBus = $this->busDAO->getBusById($busID);

            // Update its properties
            $existingBus->setBusNumber($busNumber);
            $existingBus->setLicensePlate($licensePlate);

            // Retrieve Company object based on ID
            $company = $this->companyDAO->getCompanyById($companyID);

            // Set the company for the bus
            $existingBus->setCompany($company);

            $existingBus->setCapacity($capacity);

            // Pass the updated bus object to the updateBus method in BusDAO
            $this->busDAO->updateBus($existingBus);

            // Redirect to the index page or show the updated bus
            header("Location: index.php?action=busindex&id={$busID}");
            exit();
        }
    }


    public function delete($busID)
    {
        // Retrieve a specific bus by ID to confirm deletion
        $bus = $this->busDAO->getBusById($busID);

        // Display the delete confirmation page
        include_once 'app/views/bus/delete.php';
    }

    public function destroy($busID)
    {
        // Delete a bus by ID
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Call the deleteBus method in BusDAO
            $this->busDAO->deleteBus($busID);

            // Redirect to the index page or show a success message
            header("Location: index.php?action=busindex");
            exit();
        } else {
            // Display an error or redirect to the index page with a message
        }
    }
}