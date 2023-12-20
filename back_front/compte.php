<?php
session_start();

$_SESSION['email'];
$_SESSION['last_name'];
$_SESSION['first_name'];
$_SESSION['phone'];
$_SESSION['people_id'];
$_SESSION['statut'];
$_SESSION['account_password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
          <!-- a gauche -->
            <div class="flex flex-col justify-center p-8 md:p-14">
            <a href="accueil_connect.php" class="mb-3 text-4xl font-bold">{Shop ton Job}</a>
            <span class="font-light text-gray-400 mb-8">
              Informations du compte
            </span>

            </div>
        <form action="test_compte.php" method= "POST">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['people_id']; ?>">
            <input type="hidden" name="statut" value="<?php echo $_SESSION['statut']; ?>">
              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="last_name" placeholder="<?php echo $_SESSION['last_name']; ?>" value="<?php echo $_SESSION['last_name']; ?>" class="border border-gray-400 py-1 px-2">
              </div>
             
              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="first_name" placeholder="<?php echo $_SESSION['first_name']; ?>" value="<?php echo $_SESSION['first_name']; ?>" class="border border-gray-400 py-1 px-2">
              </div>
              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="phone" placeholder="<?php echo $_SESSION['phone']; ?>" value="<?php echo $_SESSION['phone']; ?>" class="border border-gray-400 py-1 px-2">
              </div>
              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="email" placeholder="<?php echo $_SESSION['email']; ?>" value="<?php echo $_SESSION['email']; ?>" class="border border-gray-400 py-1 px-2">
              </div>
              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="account_password" placeholder="<?php echo $_SESSION['account_password']; ?>" value="<?php echo $_SESSION['account_password']; ?>" class="border border-gray-400 py-1 px-2">
              </div>
              <div class="mt-5">
                <button type="submit"  class="w-full bg-purple-500 py-3 text-center text-white">Enregistrer les modifications</button>
            </div>
        </form>

        <form action="compte_delete.php" method="POST">
            <div class="mt-5">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['people_id']; ?>">
                    <button type="submit"  class="w-full bg-purple-500 py-3 text-center text-white" onclick="return confirm('Etes vous sur de supprimer?')">Supprimer le compte</button>
            </div>
        </form>
    </div>
</body>
</html>

        <!-- Faire une deuxième page si entreprise pour ajouter un input pour l'id de la compagnie ? -->