<?php
include 'apiCrud.php';


$action = $_POST['action'];

if ($action === 'modify') {
  

    $title = $_POST['title'];
    $city = $_POST['city'];
    $contract_type = $_POST['contract_type'];
    $salary = $_POST['salary'];
    $creation_date = $_POST['creation_date'];
    $comp_description = $_POST['comp_description'];
    $job_description = $_POST['job_description'];
    $applicant_profil = $_POST['applicant_profil'];
    $benefits = $_POST['benefits'];
    $compagny_id = $_POST['compagny_id'];
    $id= $_POST['advertisement_id'];

    updateAdvertisement($title, $creation_date, $city, $contract_type, $salary, $comp_description, $job_description, $applicant_profil, $benefits, $compagny_id, $id);

    echo '<script>';
    echo ' console.log("testdeuxième")';
    echo '</script>';

    header('location: admin_ad.php');
    exit();


} elseif ($action === 'delete') {
    $id= $_POST['advertisement_id'];
    
    deleteAdvertisements($id);
    header('location: admin_ad.php');
    exit();

}elseif($action ==='create'){
    header('location: create_ad.php');

} else {

    header('location: admin_ad.php');
   
}

?>