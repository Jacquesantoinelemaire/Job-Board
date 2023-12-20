<?php
include 'apiCrud.php';


$action = $_POST['action'];

if ($action === 'modify') {


    $statut = $_POST['statut'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $account_password = $_POST['account_password'];
    $compagny_id = $_POST['compagny_id'];
    $id= $_POST['people_id'];

    UpdateUserAdmin($statut, $last_name, $first_name, $phone, $email, $account_password, $compagny_id, $id);

    header('location: admin_people.php');
    exit();


} elseif ($action === 'delete') {
    $id= $_POST['people_id'];
    
    deleteUser($id);
    header('location: admin_people.php');
    exit();

}elseif($action ==='create'){
    header('location: create_people.php');

} else {

    header('location: admin_people.php');
   
}

?>