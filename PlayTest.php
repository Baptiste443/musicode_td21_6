<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Play test</title>
    <link rel="stylesheet" href="public/css/General.css">
</head>
<body>
    <h1>Page de test</h1>
    <a href="index.php?action=connexion/login">connexion</a></br></br>
    <?php var_dump(password_hash("mdp123", PASSWORD_DEFAULT)) ?>


</body>
</html>