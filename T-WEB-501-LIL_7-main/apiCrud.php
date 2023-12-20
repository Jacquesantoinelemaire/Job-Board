<?php
session_start();

    function getdatabaseConnexion(){
        try {
            $pdo = new PDO('sqlite:./db.sqlite');
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }


// Fonctions créer: un compte, une annonce, une entreprise, une candidature

// UTILE
function createUser($statut, $last_name, $first_name, $phone, $email, $account_password, $compagny_id){
        try {
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO people (statut, last_name, first_name, phone, email, account_password, compagny_id) 
                    VALUES ('$statut', '$last_name', '$first_name', '$phone', '$email', '$account_password', $compagny_id)";
            $con->exec($sql);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

// UTILE
function createApplicant($statut, $last_name, $first_name, $phone, $email, $account_password){
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO people (statut, last_name, first_name, phone, email, account_password) 
                VALUES ('$statut', '$last_name', '$first_name', '$phone', '$email', '$account_password')";
        $con->exec($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// UTILE
function createAdvertisements($title, $creation_date, $city, $contract_type, $salary, $short_description, $comp_description, $job_description, $applicant_profil, $benefits, $compagny_id){
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO advertisements (title, creation_date, city, contract_type, salary, short_description, comp_description, job_description, applicant_profil, benefits, compagny_id) 
                VALUES ('$title', '$creation_date', '$city', '$contract_type', '$salary', '$short_description', '$comp_description', '$job_description', '$applicant_profil', '$benefits', '$compagny_id')";
        $con->exec($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// UTILE
function createCompagny($comp_name, $adress){
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO compagnies (comp_name, adress) 
                VALUES ('$comp_name', '$adress')";
        $con->exec($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


// UTILE
function createApplication($post_message, $date_message, $people_id, $advertisement_id){
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO advertisements_applicants (post_message, date_message, people_id, advertisement_id) 
                VALUES ('$post_message', '$date_message', '$people_id', '$advertisement_id')";
        $con->exec($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


// Fonctions lire: une annonce, toutes les annonces,  les messages des candidatures


// UTILE
function readAdvertisements(){
    $con = getdatabaseConnexion();
    $request = "SELECT advertisements.* , compagnies.comp_name FROM advertisements JOIN compagnies ON advertisements.compagny_id = compagnies.id ";
    $stmt = $con -> query($request);
    while ($rows = $stmt -> fetch()) {
        echo "<div class=' w-full md:w-1/2 lg:w-1/3 p-2'>";
        echo "<div class=' bg-white p-4 rounded-lg shadow'>";
        echo "<h2 class='text-xl font-bold mb-2'>" . $rows['title'] . "</h2>";
        echo "<p>" . $rows['creation_date'] . "</p>";
        echo "<p>" . $rows['city'] . "</p>";
        echo "<p>" . $rows['contract_type'] . "</p>";
        echo "<p>" . $rows['salary'] . "</p>";
        echo "<p class='text-gray-700'>" . $rows['short_description'] . "</p>";
        echo "<button class='toggleButton bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'>
        Afficher plus
      </button>";
      echo "<div class='hidden' >";
        echo "<p>" . $rows['comp_description'] . "</p>";
        echo "<p>" . $rows['applicant_profil'] . "</p>";
        echo "<p>" . $rows['benefits'] . "</p>";
        echo "<p>" . $rows['job_description'] . "</p>";
        echo "<button class='submit'>" . $rows['comp_name'] . "</button>";
        echo "<form action ='postuler.php'  method= 'POST'>";
        echo "<input  type= 'hidden' name='advertisement_id' value=" .$rows['id'] .">";
        echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit'> Postuler </button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
}


// Fonctions pour modifier: les infos de son compte, les annonces

// UTILE
    function UpdateUser($statut, $last_name, $first_name, $phone, $email, $account_password, $id){
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE people set 
                        statut = '$statut',
                        last_name = '$last_name',
                        first_name = '$first_name',
                        phone = '$phone', 
                        email = '$email', 
                        account_password = '$account_password' 
                        WHERE id = $id ";
            $stmt = $con->query($requete);

            $_SESSION['statut'] = $statut;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['account_password'] = $account_password;
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


// UTILE
    function UpdateUserAdmin($statut, $last_name, $first_name, $phone, $email, $account_password, $compagny_id, $id){
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE people set 
                        statut = '$statut',
                        last_name = '$last_name',
                        first_name = '$first_name',
                        phone = '$phone', 
                        email = '$email', 
                        account_password = '$account_password', 
                        compagny_id = '$compagny_id'
                        WHERE id = $id ";
            $stmt = $con->query($requete);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
   
//    UTILE
    function updateAdvertisement($title, $creation_date, $city, $contract_type, $salary, $short_description, $comp_description, $job_description, $applicant_profil, $benefits, $compagny_id, $id){
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE advertisements set 
                        title = '$title',
                        creation_date = $creation_date,
                        city = '$city',
                        contract_type = '$contract_type', 
                        salary= '$salary',
                        short_description= '$short_description',
                        comp_description= '$comp_description',
                        job_description = '$job_description' ,
                        applicant_profil = '$applicant_profil',
                        benefits = '$benefits',
                        compagny_id = '$compagny_id' 
                        WHERE id = $id ";
            $stmt = $con->query($requete);
    
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    // UTILE
    function updateCompagny($comp_name, $adress, $id){
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE compagnies set 
                        comp_name = '$comp_name',
                        adress = '$adress' 
                        WHERE id = $id ";
            $stmt = $con->query($requete);
    
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    // UTILE
    function updateApplication($post_message, $date_message, $people_id, $advertisement_id, $id){
        try {
            $con = getDatabaseConnexion();
            $requete = "UPDATE advertisements_applicants set 
                        post_message = '$post_message',
                        date_message = $date_message,
                        people_id = '$people_id',
                        advertisement_id = '$advertisement_id' 
                        WHERE id = $id ";
            $stmt = $con->query($requete);
    
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


// Focntions pour supprimer : annonce et people

// UTILE
    function deleteUser($id){
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from people where id = $id ";
            $stmt = $con->query($requete);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    // UTILE
    function deleteCompagny($id){
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from compagnies where id = $id ";
            $stmt = $con->query($requete);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    // UTILE
    function deleteApplication($id){
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from compagnies where id = $id ";
            $stmt = $con->query($requete);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

// UTILE
    function deleteAdvertisements($id){
        try {
            $con = getDatabaseConnexion();
            $requete = "DELETE from advertisements where id = $id ";
            $stmt = $con->query($requete);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    // Pour l'administrateur:


    // UTILE
    function readAdvertisementsForUpdateAdmin(){
        $con = getdatabaseConnexion();
        $request = "SELECT advertisements.* , compagnies.comp_name FROM advertisements JOIN compagnies ON advertisements.compagny_id = compagnies.id ";
        $stmt = $con -> query($request);
        while ($rows = $stmt -> fetch()) {
            echo "<form action='test_admin_modif_ad.php' method= 'POST' >";


            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='title' placeholder='" .$rows['title'] ."' value='" .$rows['title']. "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='creation_date' placeholder='" .$rows['creation_date'] ."' value='" .$rows['creation_date'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='city' placeholder='" .$rows['city'] ."' value='" .$rows['city'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='contract_type' placeholder='" .$rows['contract_type'] ."' value='" .$rows['contract_type'] . " 'class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='salary' placeholder='" .$rows['salary'] ." ' value='" .$rows['salary'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='creation_date' placeholder='" .$rows['creation_date'] ."' value='" .$rows['creation_date'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='short_description' placeholder='" .$rows['short_description'] ."' value='" .$rows['short_description'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='comp_description' placeholder='" .$rows['comp_description'] ."' value='" .$rows['comp_description'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='job_description' placeholder='" .$rows['job_description'] ."' value='" .$rows['job_description'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";
            
            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='applicant_profil' placeholder='" .$rows['applicant_profil'] ."' value='" .$rows['applicant_profil'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";
          
            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='benefits' placeholder='" .$rows['benefits'] ." ' value='" .$rows['benefits'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";
            
            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='compagny_id' placeholder='" .$rows['compagny_id'] ."' value='" .$rows['compagny_id'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";
    
          
            echo "<input  type= 'hidden' name='advertisement_id' value=" .$rows['id'] .">";
            // echo "<input  type= 'hidden' name='compagny_id' value=" .$rows['compagny_id'] .">";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit'name='action' value='modify'> Modify </button>";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name='action' value='delete'> Delete </button>";
            echo "</form> <br>";


          }
    }

// UTILE
    function readCompagniesForUpdateAdmin(){
        $con = getdatabaseConnexion();
        $request = "SELECT * FROM compagnies";
        $stmt = $con -> query($request);
        while ($rows = $stmt -> fetch()) {
            echo "<form action='test_admin_modif_compagnies.php' method= 'POST' >";
            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='comp_name' placeholder='" .$rows['comp_name'] ."' value='" .$rows['comp_name']. "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='adress' placeholder='" .$rows['adress'] ."' value='" .$rows['adress'] . "' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";
            
            echo "<input  type= 'hidden' name='compagny_id' value=" .$rows['id'] .">";
            // echo "<input  type= 'hidden' name='compagny_id' value=" .$rows['compagny_id'] .">";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit'name='action' value='modify'> Modify </button>";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name='action' value='delete'> Delete </button>";
            echo "</form> <br>";


          }
    }

    // UTILE
    function readPeopleForUpdateAdmin(){
        $con = getdatabaseConnexion();
        $request = "SELECT * FROM people";
        $stmt = $con -> query($request);
        while ($rows = $stmt -> fetch()) {
            echo "<form action='test_admin_modif_people.php' method= 'POST' >";
            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='statut' placeholder='" .$rows['statut'] ."' value='".$rows['statut']."'class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='last_name' placeholder='".$rows['last_name'] ."' value='".$rows['last_name']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='first_name' placeholder='".$rows['first_name']."' value='".$rows['first_name']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='phone' placeholder='".$rows['phone']."' value='".$rows['phone']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='email' placeholder='".$rows['email']."' value='".$rows['email']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='account_password' placeholder='".$rows['account_password']."' value='".$rows['account_password']." ' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='compagny_id' placeholder='".$rows['compagny_id']."' value='".$rows['compagny_id']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";
            
            echo "<input  type= 'hidden' name='people_id' value=" .$rows['id'] .">";
            // echo "<input  type= 'hidden' name='compagny_id' value=" .$rows['compagny_id'] .">";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit'name='action' value='modify'> Modify </button>";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name='action' value='delete'> Delete </button>";
            echo "</form> <br>";


          }
    }


// UTILE
    function readApplicationForUpdateAdmin(){
        $con = getdatabaseConnexion();
        $request = "SELECT * FROM advertisements_applicants";
        $stmt = $con -> query($request);
        while ($rows = $stmt -> fetch()) {
            echo "<form action='test_admin_modif_application.php' method= 'POST' >";
            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='post_message' placeholder='" .$rows['post_message'] ."' value='".$rows['post_message']."'class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='date_message' placeholder='".$rows['date_message'] ."' value='".$rows['date_message']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='people_id' placeholder='".$rows['people_id'] ."' value='".$rows['people_id']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            echo "<div class='grid grid-cols-2 gap-5'>";
            echo "<input type='text' name='advertisement_id' placeholder='".$rows['advertisement_id']."' value='".$rows['advertisement_id']."' class='border border-gray-400 py-1 px-2'>";
            echo "</div>";

            
            echo "<input  type= 'hidden' name='application_id' value=" .$rows['id'] .">";
            // echo "<input  type= 'hidden' name='compagny_id' value=" .$rows['compagny_id'] .">";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit'name='action' value='modify'> Modify </button>";
            echo "<button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name='action' value='delete'> Delete </button>";
            echo "</form> <br>";


          }
    }




// Fonctions qui peuvent servir pour des fonctionnalités plus poussées 


    // function readAdvertisement($id){
    //     $con = getdatabaseConnexion();
    //     $request = "SELECT advertisements.* , compagnies.comp_name AS compagny_name FROM advertisements  JOIN compagnies ON advertisements.compagny_id = compagnies.id WHERE id = $id";
    //     $stmt = $con -> query($request);
    
    //     while ($rows = $stmt -> fetch()) {
    //         echo "<div class='advertisements'>";
    //         echo "<h2>" . $rows['title'] . "</h2>";
    //         echo "<p>" . $rows['creation_date'] . "</p>";
    //         echo "<p>" . $rows['city'] . "</p>";
    //         echo "<p>" . $rows['contartc_type'] . "</p>";
    //         echo "<p>" . $rows['salary'] . "</p>";
    //         echo "<p>" . $rows['short_description'] . "</p>";
    //         echo "<p>" . $rows['comp_description'] . "</p>";
    //         echo "<p>" . $rows['job_description'] . "</p>";
    //         echo "<p>" . $rows['applicant_profil'] . "</p>";
    //         echo "<p>" . $rows['benefits'] . "</p>";
    //         echo "<p>" . $rows['job_description'] . "</p>";
    //         echo "<button class='submit'>" . $rows['compagny_name'] . "</button>";
    //         echo "</div>";
    //         }
    // }





    // function readApplication($id){
    //     $con = getdatabaseConnexion();
    //     $request = "SELECT * FROM advertisements_applicants WHERE id = $id";
    //     $stmt = $con -> query($request);
    //     while ($rows = $stmt -> fetch()) {
    //         echo "<div class='advertisements'>";
    //         echo "<h2>" . $rows['title'] . "</h2>";
    //         echo "<p>" . $rows['job_description'] . "</p>";
    //         echo "</div>"; 
    
    //     }
    // }
    
?>


