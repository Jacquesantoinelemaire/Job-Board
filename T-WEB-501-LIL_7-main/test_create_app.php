<?php

include 'apiCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){


    $post_message = $_POST['post_message'];
    $people_id = $_POST['people_id'];
    $advertisement_id = $_POST['advertisement_id'];
    $date_message = $_POST['date_message'];


    createApplication($post_message, $date_message, $people_id, $advertisement_id);
    
    header('location: admin_app.php');
}

?>