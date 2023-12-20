<?php
 include 'apiCrud.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'){


$statut = $_POST['statut'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$account_password = $_POST['account_password'];
$compagny_id = $_POST['compagny_id'];



if (empty($compagny_id)) {
    createApplicant($statut, $last_name, $first_name, $phone, $email, $account_password);

    header('location: admin_people.php');
    exit();

} else {
    createUser($statut, $last_name, $first_name, $phone, $email, $account_password, $compagny_id);

    header('location: admin_people.php');
    exit();
}



}

?>
