<?php require("./layout/header.php");

if ($_POST) {
    // Récupère l'objet utilisateur complet en fonction de l'e-mail saisit
    $user = $usersManager->readByEmail($_POST["email"]);
  
    // Vérifie que cet utilisateur existe et que son mot de passe correspond à celui saisit
    if ($user && password_verify($_POST["password"], $user->getPassword())) {
        // Le connecte en mettant à jour la session
        $_SESSION["is_connected"] = $_POST["email"];
    }
    // Redirection sur la page d'accueil
    echo "<script>window.location.href='index.php'</script>";
}

?>
<h1 class="mt-2">Connexion utilisateur</h1>
<form method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Votre adresse e-mail" class="form-control" required>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control" required minlength=6 maxlength=30>
    <input type="submit" value="Se connecter" class="mt-2 btn btn-primary">
</form>
<a href="register.php">Créer un compte utilisateur</a>
<?php
require("./layout/footer.php");
?>