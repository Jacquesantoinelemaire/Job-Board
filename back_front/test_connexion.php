<?php
session_start();


include("apiCrud.php");
    
    $db=getdatabaseConnexion();

    $email= $_POST['email'];
    $password=$_POST['pass'];

    
    $query = "SELECT * FROM people WHERE email = '$email' AND account_password = '$password'";
    $result = $db->query($query);

        if ($rows= $result->fetch()) {
            $_SESSION['email'] = $email;
            $_SESSION['account_password'] = $password;
            $_SESSION['last_name']= $rows['last_name'];
            $_SESSION['first_name'] = $rows['first_name'];
            $_SESSION['phone'] = $rows['phone'];
            $_SESSION['people_id'] = $rows['id'];
            $_SESSION['statut'] = $rows['statut'];
            $_SESSION['compagny_id']= $rows['compagny_id'];
            
            
        

            if($rows['statut']== "Admin"){
                header('Location: admin.php');
                exit();  
            }elseif($rows['statut']== "employeur"){
                header('Location: employeur_page.php');
                exit();  
            }else{
            header('Location: accueil_connect.php');
            exit();}
            
        } else {
            echo '<script>';
            echo 'alert("Email ou mot de passe incorrect");';
            echo 'window.location.href = "connexion.php";';
            echo '</script>';
            exit();

        }

?>


