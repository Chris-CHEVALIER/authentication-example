<?php require("./layout/header.php");

// Redirige l'utilisateur non connecté sur la page de connexion
if (!$_SESSION && !$_SESSION["is_connected"]) {
    echo "<script>window.location.href='login.php'</script>";
}

?>
<h1 class="mt-2">Ajouter un truc</h1>

<?php
require("./layout/footer.php");
?>