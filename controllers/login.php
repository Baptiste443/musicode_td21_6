<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $mdp = $_POST['password'];

    $utilisateur = get_user_by_email($email);

    if ($utilisateur && password_verify($mdp, $utilisateur['mdp'])) {
        $_SESSION['user_email'] = $utilisateur['email'];
        $_SESSION['user_name'] = $utilisateur['nom_affichage'];
        header('Location: index.php?page=musics');
        exit;
    } else {
        $erreur = "Email ou mot de passe incorrect.";
    }
}

require 'views/login.php';
