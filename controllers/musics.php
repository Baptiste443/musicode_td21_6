<?php
$pdo = get_pdo();


$musics = [
    [
        'id' => 1, 
        'title' => 'Test Titre', 
        'artist' => 'Test Artiste', 
        'album' => 'Album Test', 
        'duration' => '03:00'
    ]
];

require 'views/musics.php';