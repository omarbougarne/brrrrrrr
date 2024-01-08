<?php
class SearchController
{
    public function index()
    {
        // Fetch the list of companies
        $companyDAO = new CompanyDAO();
        $allCompanies = $companyDAO->getAllCompanies();

        // Initialize variables
        $availableSchedules = [];
        $filteredSchedules = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle Search Form submission
            if (isset($_POST['departureCity'], $_POST['arrivalCity'], $_POST['numPeople'])) {
                // Check if travel date is empty or a past date
                $date = (!empty($_POST['travelDate']) && strtotime($_POST['travelDate']) >= strtotime(date('Y-m-d'))) ?
                    $_POST['travelDate'] : date('Y-m-d');
                // Query the database for available schedules based on the form selection
                $scheduleDAO = new ScheduleDAO();
                // Define the variables before calling the method
                $endCity = $_POST['arrivalCity'];
                $startCity = $_POST['departureCity'];
                $places = $_POST['numPeople'];
                $_SESSION['departureCity'] = $_POST['departureCity'];
                $_SESSION['arrivalCity'] = $_POST['arrivalCity'];
                $_SESSION['travelDate'] = $date;
                $_SESSION['numPeople'] = $_POST['numPeople'];
                $availableSchedules = $scheduleDAO->getScheduelByEndCityStartCity($date, $endCity, $startCity, $places);

                // Handle Company Filter
                if (isset($_POST['companyFilter'])) {
                    $selectedCompanyID = $_POST['companyFilter'];

                    // Adjust the logic based on your actual filter criteria
                    foreach ($availableSchedules as $schedule) {
                        $scheduleCompanyID = $schedule->getBusID()->getCompany()->getCompanyID();

                        if ($selectedCompanyID === '' || $scheduleCompanyID == $selectedCompanyID) {
                            $filteredSchedules[] = $schedule;
                        }
                    }
                } else {
                    // If "Show All" is selected, reset company filter and display all schedules
                    $filteredSchedules = $availableSchedules;
                }
            }
        } else {
            // If no form submission, initialize with all schedules
            $scheduleDAO = new ScheduleDAO();
            $availableSchedules = $scheduleDAO->getAllSchedules();
            $filteredSchedules = $availableSchedules;
        }

        // Load the view
        include_once 'app/views/searchPage.php';
    }
}