<?php
class Bus
{
    private $busID;
    private $busNumber;
    private $licensePlate;
    private $company;
    private $capacity;

    public function __construct($busID, $busNumber, $licensePlate, $company, $capacity)
    {
        $this->busID = $busID;
        $this->busNumber = $busNumber;
        $this->licensePlate = $licensePlate;
        $this->company = $company;
        $this->capacity = $capacity;
    }

    public function getBusID()
    {
        return $this->busID;
    }

    public function getBusNumber()
    {
        return $this->busNumber;
    }

    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getCompanyID()
    {
        return $this->company ? $this->company->getCompanyID() : null;
    }
    public function getCompanyName()
    {
        return $this->company ? $this->company->getCompanyName() : 'Unknown';
    }
    public function getCapacity()
    {
        return $this->capacity;
    }

    // Add setters if needed
    public function setBusNumber($busNumber)
    {
        $this->busNumber = $busNumber;
    }

    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

}