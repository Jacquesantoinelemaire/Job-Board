<!-- form candidat -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
            <form action="test_inscription.php" method="POST">
              <div class="mt-5">
              <label for="statut"> Etes-vous un candidat ou un employeur ? </label>
                <select name="statut" id="statut">
                <option value="candidat"> Candidat </option>
                <option value="employeur"> Employeur </option>
                </select>
              </div>

              <div class="grid grid-cols-2 gap-5">
                <input type="text" name="first_name" placeholder="prénom" class="border border-gray-400 py-1 px-2">
                <input type="text" name="last_name" placeholder="nom de famille" class="border border-gray-400 py-1 px-2">
              </div>

              <div class="mt-5">
                <input type="text" name ="email" placeholder="Email" class="border border-gray-400 py-1 px-2 w-full">
              </div>

              <div class="mt-5">
                <input type="text" name="phone" placeholder="numéro de téléphone" class="border border-gray-400 py-1 px-2 w-full">
              </div>

              <div class="mt-5">
                <input type="password" name="account_password" placeholder="mot de passe" class="border border-gray-400 py-1 px-2 w-full">
              </div>

              <div class="mt-5">
                <input type="text" name="compagny_id" placeholder="entreprise" class="border border-gray-400 py-1 px-2 w-full">
              </div>
              
              
                
              <div class="mt-5">
                <button id= "BtnInscription" type="submit" class="w-full bg-purple-500 py-3 text-center text-white">Valider l'inscription</button>
              </div>
            </form>
            </div>
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