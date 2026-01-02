<?php
require_once __DIR__ . '/../vendor/autoload.php';

function get_bdd()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $hote = $_ENV['DB_HOST'];
    $base = $_ENV['DB_NAME'];
    $utilisateur = $_ENV['DB_USER'];
    $mdp = $_ENV['DB_PASSWORD'];

    try {
        $pdo = new PDO("mysql:host=$hote;dbname=$base;charset=utf8", $utilisateur, $mdp);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// --- MUSIQUES (Table: musique) ---
function get_all_musics()
{
    $bdd = get_bdd();
    // Table: musique, Cols: id_mu, titre, auteur, duree, album
    $req = $bdd->query("SELECT * FROM musique");
    return $req->fetchAll();
}

function get_music_by_id($id)
{
    $bdd = get_bdd();
    $req = $bdd->prepare("SELECT * FROM musique WHERE id_mu = ?");
    $req->execute([$id]);
    return $req->fetch();
}

function add_music_to_catalog($titre, $auteur, $album, $duree)
{
    $bdd = get_bdd();
    $req = $bdd->prepare("INSERT INTO musique (titre, auteur, album, duree) VALUES (?, ?, ?, ?)");
    return $req->execute([$titre, $auteur, $album, $duree]);
}

// --- UTILISATEURS (Table: utilisateur) ---
function create_user($nom_affichage, $email, $mdp)
{
    $bdd = get_bdd();
    $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
    // Table: utilisateur, Cols: email (PK), nom_affichage, mdp
    $req = $bdd->prepare("INSERT INTO utilisateur (nom_affichage, email, mdp) VALUES (?, ?, ?)");
    return $req->execute([$nom_affichage, $email, $mdp_hache]);
}

function get_user_by_email($email)
{
    $bdd = get_bdd();
    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $req->execute([$email]);
    return $req->fetch();
}

function update_user_profile($email, $nom_affichage, $mdp = null)
{
    $bdd = get_bdd();
    if ($mdp) {
        $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
        // Update both name and password
        $req = $bdd->prepare("UPDATE utilisateur SET nom_affichage = ?, mdp = ? WHERE email = ?");
        return $req->execute([$nom_affichage, $mdp_hache, $email]);
    } else {
        // Update only name
        $req = $bdd->prepare("UPDATE utilisateur SET nom_affichage = ? WHERE email = ?");
        return $req->execute([$nom_affichage, $email]);
    }
}

// --- BIBLIOTHÈQUE (Table: ListePerso) ---
function get_user_library($user_email)
{
    $bdd = get_bdd();
    // Table: ListePerso, Cols: id_li, note, id_mu, email
    // Join with musique on id_mu
    $requete = "SELECT m.*, l.note, l.id_li
            FROM musique m 
            JOIN ListePerso l ON m.id_mu = l.id_mu 
            WHERE l.email = ?";
    $req = $bdd->prepare($requete);
    $req->execute([$user_email]);
    return $req->fetchAll();
}

function add_music_to_library($user_email, $id_mu)
{
    $bdd = get_bdd();
    // Check duplication
    $verif = $bdd->prepare("SELECT * FROM ListePerso WHERE email = ? AND id_mu = ?");
    $verif->execute([$user_email, $id_mu]);
    if ($verif->fetch())
        return false;

    $req = $bdd->prepare("INSERT INTO ListePerso (email, id_mu, note) VALUES (?, ?, 0)");
    return $req->execute([$user_email, $id_mu]);
}

function update_rating($user_email, $id_mu, $note)
{
    $bdd = get_bdd();
    $req = $bdd->prepare("UPDATE ListePerso SET note = ? WHERE email = ? AND id_mu = ?");
    return $req->execute([$note, $user_email, $id_mu]);
}

function remove_from_library($user_email, $id_mu)
{
    $bdd = get_bdd();
    $req = $bdd->prepare("DELETE FROM ListePerso WHERE email = ? AND id_mu = ?");
    return $req->execute([$user_email, $id_mu]);
}