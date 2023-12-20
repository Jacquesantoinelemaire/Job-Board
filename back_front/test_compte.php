<?php
include 'apiCrud.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $statut = $_POST['statut'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $account_password = $_POST['account_password'];
    $id= $_POST['user_id'];



    if (empty($compagny_id)) {
        UpdateUser($statut, $last_name, $first_name, $phone, $email, $account_password, $id);
        echo '<script>';
        echo ' console.log("test update candidat")';
        echo '</script>';


        header('location: accueil_connect.php');

    }

    

}

?>