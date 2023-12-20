<?php
include "apiCrud.php";

    $action = $_POST['action'];

    if ($action === 'advertisements') {
        header('location: admin_ad.php');
        exit();

    } elseif ($action === 'people') {

        header('location: admin_people.php');
        exit();

        
    } elseif ($action === 'compagnies') {
       header('location: admin_comp.php');
       exit();


    } elseif ($action === 'applications') {
        header('location: admin_app.php');
        exit();
        
    } else {
       header('location: admin.php');
       exit();
    }

?>