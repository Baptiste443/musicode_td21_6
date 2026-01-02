<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicode</title>
    <link rel="stylesheet" href="Asset/style/style.css">
</head>
<body>

<header>
    <div class="logo">
        <span style="font-size: 1.2rem;">▶</span> 
        <strong>Musicode</strong>
    </div>
    <nav>
        <ul>
            <li><a href="/musics">Catalogue</a></li>
            
            <?php if(isset($_SESSION['user'])): ?>
                <li><a href="/musics/add">Ajouter une musique</a></li>
                <li><a href="/library">Ma bibliothèque</a></li>
                <li><a href="/account">Mon compte</a></li>
                <li><a href="/logout" class="btn-logout">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="/login">Connexion</a></li>
                <li><a href="/register">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>