<?php

class Database
{
    private $host = "localhost"; // Replace with your database host
    private $dbname = "SmartTravelv2"; // Replace with your database name
    private $username = "root"; // Replace with your database username
    private $password = ""; // Replace with your database password

    public function getConnection()
    {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}