<?php
// Définition de la classe principale Router
// Elle se charge d'interpréter l'URL et d'appeler le bon contrôleur + méthode
class Router {

    // Méthode principale du routeur, appelée depuis index.php
    public function dispatch() {

        // Récupère le paramètre 'action' passé dans l'URL
        // Si rien n'est précisé, on met "home" par défaut
        $action = $_GET['action'] ?? 'Connexion/login';

        // On découpe l'action en morceaux séparés par un slash "/"
        $parts = explode('/', $action);

        // On construit le nom du contrôleur à partir du premier élément
        // ucfirst() met la première lettre en majuscule
        $controllerName = ucfirst($parts[0]) . 'Controller';

        // On récupère la méthode à appeler dans le contrôleur
        // Si rien n’est précisé après le "/", on appelle "index" par défaut
        $method = $parts[1] ?? 'login';

        // On construit le chemin du fichier contrôleur
        $controllerFile = "app/Controller/$controllerName.php";

        // Vérifie si le fichier du contrôleur existe
        if (!file_exists($controllerFile)) {
            require __DIR__ . '/../views/General/Erreur404.php';
        }
        // Inclut le fichier du contrôleur pour pouvoir l’utiliser
        require_once $controllerFile;

        // Crée une instance du contrôleur
        $controller = new $controllerName();

        // Vérifie que la méthode demandée existe dans le contrôleur
        if (!method_exists($controller, $method)) {
            require __DIR__ . '/../views/General/Erreur404.php';
        }

        // Appelle la méthode du contrôleur
        $controller->$method();
    }
}
?>