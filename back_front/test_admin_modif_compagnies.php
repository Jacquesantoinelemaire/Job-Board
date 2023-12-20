<?php
include 'apiCrud.php';


$action = $_POST['action'];

if ($action === 'modify') {
  

    $comp_name = $_POST['comp_name'];
    $adress = $_POST['adress'];
    $id= $_POST['compagny_id'];

    updateCompagny($comp_name, $adress, $id);

    header('location: admin_comp.php');
    exit();


} elseif ($action === 'delete') {
    $id= $_POST['compagny_id'];
    
    deleteCompagny($id);
    header('location: admin_comp.php');
    exit();

}elseif($action ==='create'){
    header('location: create_comp.php');

} else {

    header('location: admin_comp.php');
   
}

?>