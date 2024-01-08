<?php

include_once __DIR__ . '/app/controllers/HomeController.php';
include_once __DIR__ . '/app/controllers/BusController.php';
include_once __DIR__ . '/app/controllers/RouteController.php';
include_once __DIR__ . '/app/controllers/ScheduleController.php';
include_once __DIR__ . '/app/controllers/SearchController.php';
include_once __DIR__ . '/app/controllers/FilterController.php';
include_once __DIR__ . '/app/controllers/AdminController.php';
include_once __DIR__ . '/app/models/Bus.php';
include_once __DIR__ . '/app/models/BusDAO.php';
include_once __DIR__ . '/app/models/Route.php';
include_once __DIR__ . '/app/models/RouteDAO.php';
include_once __DIR__ . '/app/models/Schedule.php';
include_once __DIR__ . '/app/models/ScheduleDAO.php';

session_start();
// Routing.
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $routeController = new RouteController();
    $busController = new BusController();
    $scheduleController = new ScheduleController();
    $adminController = new AdminController();


    switch ($action) {
        case '/':
            $controller = new HomeController();
            $controller->index();
            break;
        case 'searchPage':
            $controller = new SearchController();
            $controller->index();
            break;
        case 'filterPage':
            $controller = new FilterController();
            $controller->index();
            break;
        case 'busindex':
            $controller = new BusController();
            $busController->index();
            break;
        case 'buscreate':
            $controller = new BusController();
            $busController->create();
            break;
        case 'busstore':
            $controller = new BusController();
            $busController->store();
            break;
        case 'busedit':
            $controller = new BusController();
            $busController->edit($_GET['id']);
            break;
        case 'busupdate':
            $controller = new BusController();
            $busController->update($_GET['id']);
            break;
        case 'busdelete':
            $controller = new BusController();
            $busController->delete($_GET['id']);
            break;
        case 'busdestroy':
            $controller = new BusController();
            $busController->destroy($_GET['id']);
            break;
        case 'routeindex':

            $controller = new RouteController();
            $routeController->index();
            break;
        case 'routecreate':
            $controller = new RouteController();
            $routeController->create();
            break;
        case 'routestore':
            $controller = new RouteController();
            $routeController->store();
            break;
        case 'routeedit':
            $controller = new RouteController();
            $routeController->edit($_GET['id']);
            break;
        case 'routeupdate':
            $controller = new RouteController();
            $controller->update($_GET['id']);
            break;
        case 'routedelete':
            $controller = new RouteController();
            $routeController->delete($_GET['id']);
            break;
        case 'routedestroy':
            $controller = new RouteController();
            $routeController->destroy($_GET['id']);
            break;
        case 'scheduleindex':
            $controller = new ScheduleController();
            $scheduleController->index();
            break;
        case 'schedulecreate':
            $controller = new ScheduleController();
            $scheduleController->create();
            break;
        case 'schedulestore':
            $controller = new ScheduleController();
            $scheduleController->store();
            break;
        case 'scheduleedit':
            $controller = new ScheduleController();
            $scheduleController->edit($_GET['id']);
            break;
        case 'scheduleupdate':
            $controller = new ScheduleController();
            $scheduleController->update($_GET['id']);
            break;
        case 'scheduledelete':
            $controller = new ScheduleController();
            $scheduleController->delete($_GET['id']);
            break;
        case 'scheduledestroy':
            $controller = new ScheduleController();
            $scheduleController->destroy($_GET['id']);
            break;
        default:
            $homeController = new HomeController();
            $homeController->index();
            break;
    }
} else {
    $homeController = new HomeController();
    $homeController->index();
}