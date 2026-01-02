<?php

if (!isset($_SESSION['user_email'])) {
    header('Location: index.php?page=login');
    exit;
}

$user_email = $_SESSION['user_email'];
$utilisateur = get_user_by_email($user_email);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['name']);
    $mdp = !empty($_POST['password']) ? $_POST['password'] : null;

    if (update_user_profile($user_email, $nom, $mdp)) {
        $_SESSION['user_name'] = $nom; // Update session
        $succes = "Compte mis à jour.";
        // Refresh user data
        $utilisateur = get_user_by_email($user_email);
    } else {
        $erreur = "Erreur lors de la mise à jour.";
    }
}

require 'views/account.php';
