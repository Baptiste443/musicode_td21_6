 Musicode


## Description

Ce projet est une application web PHP permettant aux utilisateurs de consulter un catalogue de musiques, de gérer leur propre collection personnelle et de gérer leur profil utilisateur..

## Prérequis 

-   Xampp avec Apache et MySQL configuré
-   Composer.

## Installation

1.  ### Récupération du projet
    Placez le dossier du projet dans le répertoire racine de votre serveur  (ex: `C:\xampp\htdocs\Musicode\musicode_td21_6`).

2.  ### Installation des dépendances
    Ouvrez un terminal à la racine du projet et exécutez la commande suivante pour installer `vlucas/phpdotenv` :
    "bash
    composer update
    require vlucas/phpdotenv
    "

3.  ### Base de données
    -   Créez une base de données MySQL vide (ex: `musicode`).
    -   Importez le script SQL fourni pour créer les tables et les données initiales. Le fichier se trouve à l'emplacement suivant :
        `Asset/sql/musicode_td21_6.sql`

4.  ### Configuration de l'environnement
    -   À la racine du projet,  creer le fichier `.env` et configurez les informations de connexion à votre base de données :
        "env
        DB_HOST=localhost
        DB_NAME=nom_de_votre_base_de_donnees
        DB_USER=root
        DB_PASSWORD=
        "

## Utilisation

Accédez au projet via votre navigateur en utilisant l'URL appropriée (selon votre configuration serveur), par exemple :
`http://localhost/Musicode/musicode_td21_6/index.php`

## Structure du Projet

L'application respecte une architecture **MVC** (Modèle-Vue-Contrôleur) procédurale :

-   `model/` : Contient `musicode.php` qui gère la connexion BDD et toutes les requêtes SQL.
-   `controllers/` : Fichiers PHP gérant les Fonctionnalités de chaque page .
-   `views/` : Fichiers HTML contenant les Vues pour l'affichage.
-   `index.php` : Routeur du Projet.
