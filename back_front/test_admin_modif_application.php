<?php
include 'apiCrud.php';


$action = $_POST['action'];

if ($action === 'modify') {
 
    $post_message = $_POST['post_message'];
    $date_message = $_POST['date_message'];
    $people_id = $_POST['people_id'];
    $advertisement_id = $_POST['advertisement_id'];
    $id= $_POST['application_id'];

    updateApplication($post_message, $date_message, $people_id, $advertisement_id, $id);

    header('location: admin_app.php');
    exit();


} elseif ($action === 'delete') {
    $id= $_POST['application_id'];
    
    deleteApplication($id);
    header('location: admin_app.php');
    exit();

}elseif($action ==='create'){
    header('location: create_app.php');

} else {

    header('location: admin_app.php');
   
}

?>