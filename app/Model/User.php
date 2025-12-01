<?php


class User {
    public $id;
    public $nom;
    public $prenom;
    public $email;
    private $password; 
    public $creation;
    public $changement;

    public function __construct($id, $nom, $prenom, $email, $password = null,$creation, $changement) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->creation = $creation;
        $this->changement = $changement;
    }

    public static function getBymail($mail) {
        $pdo = connection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :mail");
        $stmt->execute([':mail' => $mail]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new User(
                $result['id'],
                $result['first_name'],
                $result['lastname'],
                $result['email'],
                $result['password'],
                $result['created_at'],
                $result['updated_at']

            );
        }
        return null;
    }
    public function getPassword() {
        return $this->password;
    }
    
}
?>


