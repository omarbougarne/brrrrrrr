<?php

class Company
{
    private $companyID;
    private $companyName;
    private $companyImage;

    // Constructor
    public function __construct($companyID, $companyName, $companyImage)
    {
        $this->companyID = $companyID;
        $this->companyName = $companyName;
        $this->companyImage = $companyImage;
    }

    // Getter methods
    public function getCompanyID()
    {
        return $this->companyID;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    // Setter methods (if needed)
    public function setCompanyID($companyID)
    {
        $this->companyID = $companyID;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }
    public function setCompanyImage($companyImage){
        $this->companyImage = $companyImage;
    }
    public function getCompanyImage(){
        return $this->companyImage;
    }

    // Additional methods as needed for your application
}