<?php

if (!isset($_SESSION['user_email'])) {
    header('Location: index.php?page=login');
    exit;
}

$user_email = $_SESSION['user_email']; // Using email as ID per schema

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_music_id'])) {
        add_music_to_library($user_email, $_POST['add_music_id']);
    } elseif (isset($_POST['remove_music_id'])) {
        remove_from_library($user_email, $_POST['remove_music_id']);
    } elseif (isset($_POST['rate_music_id']) && isset($_POST['rating'])) {
        $note = (int) $_POST['rating'];
        if ($note >= 0 && $note <= 5) {
            update_rating($user_email, $_POST['rate_music_id'], $note);
        }
    }
    // Refresh to prevent resubmission
    header('Location: index.php?page=library');
    exit;
}

$bibliotheque = get_user_library($user_email);
require 'views/library.php';
