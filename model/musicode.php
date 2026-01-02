<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Pour charger le .env

function get_pdo() {
    // Charge les variables du .env (nécessite composer)
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    
    try {
        $pdo = new PDO(
            "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8",
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(Exception $e) {
        die("Erreur de connexion BDD : " . $e->getMessage());
    }
}


function get_bdd(){
    // Chargement du .env
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $host = $_ENV['DB_HOST'];
    $db   = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASSWORD'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// --- MUSIQUES ---
function get_all_musics() {
    $bdd = get_bdd();
    $stmt = $bdd->query("SELECT * FROM musics");
    return $stmt->fetchAll();
}

function get_music_by_id($id) {
    $bdd = get_bdd();
    $stmt = $bdd->prepare("SELECT * FROM musics WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_music_to_catalog($title, $artist, $album, $duration) {
    $bdd = get_bdd();
    $stmt = $bdd->prepare("INSERT INTO musics (title, artist, album, duration) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$title, $artist, $album, $duration]);
}

// --- UTILISATEURS ---
function create_user($name, $email, $password) {
    $bdd = get_bdd();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $bdd->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    return $stmt->execute([$name, $email, $hash]);
}

function get_user_by_email($email) {
    $bdd = get_bdd();
    $stmt = $bdd->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function update_user_profile($id, $name, $password = null) {
    $bdd = get_bdd();
    if ($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $bdd->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
        return $stmt->execute([$name, $hash, $id]);
    } else {
        $stmt = $bdd->prepare("UPDATE users SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }
}

// --- BIBLIOTHÈQUE ---
function get_user_library($user_id) {
    $bdd = get_bdd();
    // Jointure pour récupérer les infos de la musique + la note de l'utilisateur
    $sql = "SELECT m.*, l.rating 
            FROM musics m 
            JOIN library l ON m.id = l.music_id 
            WHERE l.user_id = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function add_music_to_library($user_id, $music_id) {
    $bdd = get_bdd();
    // On vérifie d'abord si elle n'y est pas déjà
    $check = $bdd->prepare("SELECT * FROM library WHERE user_id = ? AND music_id = ?");
    $check->execute([$user_id, $music_id]);
    if ($check->fetch()) return false;

    $stmt = $bdd->prepare("INSERT INTO library (user_id, music_id, rating) VALUES (?, ?, 0)");
    return $stmt->execute([$user_id, $music_id]);
}

function update_rating($user_id, $music_id, $rating) {
    $bdd = get_bdd();
    $stmt = $bdd->prepare("UPDATE library SET rating = ? WHERE user_id = ? AND music_id = ?");
    return $stmt->execute([$rating, $user_id, $music_id]);
}

function remove_from_library($user_id, $music_id) {
    $bdd = get_bdd();
    $stmt = $bdd->prepare("DELETE FROM library WHERE user_id = ? AND music_id = ?");
    return $stmt->execute([$user_id, $music_id]);
}