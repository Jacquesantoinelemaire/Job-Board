<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création candidature</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div
          class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0"
        >
          <!-- a gauche -->
          <div class="flex flex-col justify-center p-8 md:p-14">
            <a href="page_accueil.php" class="mb-3 text-4xl font-bold">{Shop ton Job}</a>
            <span class="font-light text-gray-400 mb-8">
              Creation candidature:
            </span>
            <form action="test_create_app.php" method="POST">

              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="post_message" placeholder="message" class="border border-gray-400 py-1 px-2">
              </div>

              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="date_message" placeholder="date" class="border border-gray-400 py-1 px-2">
              </div>
              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="people_id" placeholder="id de l'utilisateur" class="border border-gray-400 py-1 px-2">
              </div>

              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="advertisement_id" placeholder="id de l'annonce" class="border border-gray-400 py-1 px-2">
              </div>

              <div class="mt-5">
                <button id= "Btn" type="submit" class="w-full bg-purple-500 py-3 text-center text-white">Créer</button>
              </div>
              <div class="mt-5">
                <a href="admin_comp.php" class="w-full bg-purple-500 py-3 text-center text-white">Retour</a>
              </div>

            </form>
          </div>
          <!-- {/* droite */} -->
          <div class="relative">
            <img
              src="shop.png"
              alt="img"
              class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover"
            />
            </div>
          </div>
        </div>
      </div>

    </form>

</body>
</html>