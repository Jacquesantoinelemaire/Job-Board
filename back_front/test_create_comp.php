<?php

include 'apiCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $comp_name = $_POST['comp_name'];
    $adress = $_POST['adress'];


    createCompagny($comp_name, $adress);
    
    header('location: admin_comp.php');
}

?>