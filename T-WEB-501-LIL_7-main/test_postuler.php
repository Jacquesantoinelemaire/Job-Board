<?php
include "apiCrud.php";

$post_message = $_POST['post_message'];
$date_message= $_POST['date_message'];
$advertisement_id=$_POST['annonce_id'];
$people_id=$_POST['user_id'];


createApplication($post_message, $date_message, $people_id, $advertisement_id);

header('location: accueil_connect.php')

?>