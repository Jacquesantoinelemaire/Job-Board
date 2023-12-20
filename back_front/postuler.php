<?php
session_start();

$_SESSION['email'];
$_SESSION['last_name'];
$_SESSION['first_name'];
$_SESSION['phone'];
$_SESSION['people_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postuler</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
          <!-- a gauche -->
            <div class="flex flex-col justify-center p-8 md:p-14">
            <span class="mb-3 text-4xl font-bold">{Shop ton Job}</span>
            <span class="font-light text-gray-400 mb-8">
              Plus qu'à un clic de postuler !
            </span>

            </div>
        <form action="test_postuler.php" method= "POST">
            <input type="hidden" name="annonce_id" value="<?php echo $_POST['advertisement_id']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['people_id']; ?>">
            <div class="grid grid-cols-2 gap-5">
                <input type="text" name="date_message" placeholder="date_message" class="border border-gray-400 py-1 px-2">
              </div>
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


            <div class="mt-5">
                <label for="post_message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre message: </label>
                <textarea id="post_message" name="post_message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Vend toi"></textarea>
            </div>
            
            <div class="mt-5">
                <button type="submit"  class="w-full bg-purple-500 py-3 text-center text-white">Postuler</button>
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
</body>
</html>