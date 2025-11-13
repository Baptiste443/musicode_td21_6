<?php

require 'config.php'; // inclut la connexion PDO



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];

    $password = $_POST['password'];



    // Requête préparée pour éviter les injections SQL

    $sql = "SELECT * FROM utilisateurs WHERE email = :email";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(['email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    // Vérifie si l’utilisateur existe et si le mot de passe correspond

    if ($user && password_verify($password, $user['mot_de_passe'])) {

        // Crée la session

        $_SESSION['user_id'] = $user['id'];

        $_SESSION['user_name'] = $user['nom'];



        header("Location: tableau_de_bord.php"); // Redirection après connexion

        exit();

    } else {

        echo "Email ou mot de passe incorrect.";

    }

}

?>