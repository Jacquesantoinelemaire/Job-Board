<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil entreprise</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <header>
    <div class="min-h-full">
      <nav class="bg-gray-800">
        <h1 class="text-center text-white text-4xl">{Shop Ton Job}</h1>
          <a href="compte.php" class="text-white text-2xl">Compte</a>
          <a href="deconnexion.php" class="text-white text-2xl">Deconnexion</a>
        <div id="message"></div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"></div>
        <div class="flex h-16 items-center justify-between"></div>
        <div class="flex items-center"></div>
        <div class="flex-shrink-0"></div>
      </nav>
    </div>
    </header>

    <main>
   
    <?php
      include 'apiCrud.php';
        readAdvertisements();
      ?>


    </main>

</body>
</html>