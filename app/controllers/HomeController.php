<?php

class HomeController
{
    public function index()
    {
        $Cites = new cityDAO();
        // Load the home page view
        include_once 'app/views/homePage.php';

    }
}