<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
      <!-- a gauche -->
      <div class="flex flex-col justify-center p-8 md:p-14">
        <a href="page_accueil.php" class="mb-3 text-4xl font-bold">{Shop ton Job}</a>
        <span class="font-light text-gray-400 mb-8">
          Bienvenue !
        </span>

        <form action='test_connexion.php' method="POST">
        <div class="py-4">
          <span class="mb-2 text-md">Email</span>
          <input
            type="text"
            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
            name="email"
            id="email"/>
        </div>
        <div class="py-4">
          <span class="mb-2 text-md">Mot de Passe</span>
          <input
            type="password"
            name="pass"
            id="pass"
            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"/>
        </div>
        <button id="BtnLogin" type="submit"
          class="w-full bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300">
          Connexion
        </button>

      </form>

        <div class="text-center text-gray-400">
          Vous n'avez pas de compte ?
          <a href="inscription.php" class="font-bold text-black">Inscription</a>
        </div>
      </div>
      <!-- {/* right side */} -->
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

</body>


</html>