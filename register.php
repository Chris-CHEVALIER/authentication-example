<?php require("./layout/header.php");

if ($_POST) {
    // Met à jour le mot de passe saisit avec une version encryptée
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // Créé l'utilisateur en BDD
    $usersManager->create(new User($_POST));
    // Connecte l'utilisateur en mettant à jour la session
    $_SESSION["is_connected"] = $_POST["email"];
    // Redirection sur la page d'accueil
    echo "<script>window.location.href='index.php'</script>";
}

?>
<h1 class="mt-2">Créer un compte utilisateur</h1>
<form method="post">
    <label for="firstName">Prénom</label>
    <input type="text" name="firstName" id="firstName" placeholder="Votre prénom" class="form-control" required minlength=3 maxlength=30>
    <label for="lastName">Nom</label>
    <input type="text" name="lastName" id="lastName" placeholder="Votre nom" class="form-control" required minlength=3 maxlength=30>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Votre adresse e-mail" class="form-control" required>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control" required minlength=6 maxlength=30>
    <input type="submit" value="Valider" class="mt-2 btn btn-primary">
</form>
<a href="login.php">Se connecter</a>
<?php
require("./layout/footer.php");
?>