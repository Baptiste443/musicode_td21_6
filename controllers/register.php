<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $nom = htmlspecialchars($_POST['name']);
    $mdp = $_POST['password'];

    if (!empty($email) && !empty($nom) && !empty($mdp)) {
        if (create_user($nom, $email, $mdp)) {
            header('Location: index.php?page=login&success=1');
            exit;
        } else {
            $erreur = "Erreur lors de l'inscription (email déjà utilisé ?)";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}

require 'views/register.php';
