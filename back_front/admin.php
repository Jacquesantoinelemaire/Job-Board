<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administration</title>
</head>
<body class="bg-gradient-to-r from-purple-500 via-pink-300 to-purple-200">
<header class="bg-gray-900 text-white py-4">
    <div class="container mx-auto flex items-center justify-between px-4">
      <div class="flex items-center">
        <img src="shop.png" alt="Logo" class="h-8 w-8 mr-2">
        <a href="page_accueil.php" class="text-xl font-bold">Shop ton JOB</a>
      </div>
      <div class="flex flex-wrap">
        <a href="compte.php" class="text-white m-2 px-4 py-2 rounded-md bg-blue-500 hover:bg-blue-600">Profil</a>
        <a href="deconnexion.php" class="text-white m-2 px-4 py-2 rounded-md bg-green-500 hover:bg-green-600">Deconnexion</a>
      </div>
    </div>
  </header>
 

    <main class= "flex flex-wrap justify-center">

      <form class="m-5" action= "test_admin.php" method="POST">
        <button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name="action" value="advertisements"> Annonces</button>
      </form>

      <form class="m-5" action= "test_admin.php" method="POST">
        <button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name="action" value="people"> Utilisateurs </button>
      </form>

      <form class="m-5" action= "test_admin.php" method="POST">
        <button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name="action" value="compagnies"> Entreprises </button>
      </form>

      <form  class="m-5" action= "test_admin.php" method="POST">
        <button class='boutonPost bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded' type='submit' name="action" value="applications"> Candidatures </button>
      </form>



    </main>

</body>
</html>