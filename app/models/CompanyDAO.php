<?php

include_once 'DatabaseDAO.php';
include_once 'Company.php';

class CompanyDAO extends DatabaseDAO
{
    public function getAllCompanies()
    {
        $query = "SELECT * FROM Company";
        $companyData = $this->fetchAll($query);

        $companies = array();
        foreach ($companyData as $companyRow) {
            $companies[] = new Company($companyRow['companyID'], $companyRow['companyName'], $companyRow['companyImage']);
        }

        return $companies;
    }

    public function getCompanyById($companyID)
    {
        $query = "SELECT * FROM Company WHERE companyID = :companyID";
        $params = [':companyID' => $companyID];
        $companyData = $this->fetch($query, $params);

        if ($companyData) {
            return new Company($companyData['companyID'], $companyData['companyName'], $companyData['companyImage']);
        }

        return null; // Return null if company with given ID is not found
    }
}