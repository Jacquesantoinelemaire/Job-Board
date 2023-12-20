<?php
include "apiCrud.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $id = $_POST['user_id'];

    deleteUser($id);

    header('location: page_accueil.php');

}


?>