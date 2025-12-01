<?php

require_once 'app/Model/User.php';

class ConnexionController {



    public function loginForm() {

        require 'app\View\General\Connexion.php'; 
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            
            $user = User::getById($email);
            if (isset($user) && password_verify($password, $user->getPassword())){
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_mail'] = $user->mail;

                 header("Location: index.php?action=accueil/" );
                exit();

            } 
        else {
            echo "<script>
            alert('Identifiant ou mot de passe incorrect.');
            </script>";
            }
        } 
    else 
        {
        $this->loginForm();
        }
    }

    
    public function changerMdp() {
    require 'app/views/General/ChangementMdp.php'; 
}

}
?>