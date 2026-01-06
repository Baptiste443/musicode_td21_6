<?php

$url_parties = explode('/', $page);
$action = $url_parties[1] ?? null;

if ($action === 'add') {
    if (!isset($_SESSION['user_email'])) {
        header('Location: index.php?page=login');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $album = htmlspecialchars($_POST['album']);
        $duree = htmlspecialchars($_POST['duree']);

        if (!empty($titre) && !empty($auteur)) {
            add_music_to_catalog($titre, $auteur, $album, $duree);
            header('Location: index.php?page=musics');
            exit;
        } else {
            $erreur = "Titre et auteur requis.";
        }
    }
    require 'views/music_add.php';
}

elseif (is_numeric($action)) {
    $musique = get_music_by_id($action);
    if (!$musique) {
        echo "Musique introuvable.";
    } else {
        require 'views/musics_details.php';
    }
}

else {
    $musiques = get_all_musics();
    require 'views/musics.php';
}
