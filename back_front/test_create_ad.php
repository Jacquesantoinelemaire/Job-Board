<?php

include 'apiCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $title = $_POST['title'];
    $creation_date = $_POST['creation_date'];
    $city = $_POST['city'];
    $contract_type = $_POST['contract_type'];
    $salary = $_POST['salary'];
    $comp_description = $_POST['comp_description'];
    $job_description = $_POST['job_description'];
    $applicant_profil = $_POST['applicant_profil'];
    $benefits = $_POST['benefits'];
    $compagny_id = $_POST['compagny_id'];


    createAdvertisements($title, $creation_date, $city, $contract_type, $salary, $comp_description, $job_description, $applicant_profil, $benefits, $compagny_id);
    
    header('location: admin_ad.php');
}

?>