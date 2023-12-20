<?php
session_destroy();

?>

<script>


function delete_cookie(name) {
document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;' 
}

delete_cookie('PHPSESSID')


document.location.href= 'page_accueil.php'

</script>



