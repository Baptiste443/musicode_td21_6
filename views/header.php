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
            <a href="index.php?page=musics">
                <span style="font-size: 1.2rem;">▶</span>
                <strong>Musicode</strong>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?page=musics">Catalogue</a></li>

                <?php if (isset($_SESSION['user_email'])): ?>
                    <li><a href="index.php?page=musics/add">Ajouter une musique</a></li>
                    <li><a href="index.php?page=library">Ma bibliothèque</a></li>
                    <li><a href="index.php?page=account">Mon compte</a></li>
                    <li><a href="index.php?page=logout" class="btn-logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="index.php?page=login">Connexion</a></li>
                    <li><a href="index.php?page=register">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>