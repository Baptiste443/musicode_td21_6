<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="public/css/General.css" rel="stylesheet">
</head>
<body>
<?php require('app/View/General/header.php'); ?>


    

  <main class="container">
    <section class="card form-card">
      <h1>Connexion</h1>

      <!-- Zone d'affichage d'erreur serveur -->
      <!-- <?php if (!empty($error)) : ?> <p class="alert danger"><?= htmlspecialchars($error) ?></p> <?php endif; ?> -->

      <form method="post" action="/login">
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required autocomplete="email">
        </div>
        <div class="field">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" required autocomplete="current-password">
        </div>
        <button class="btn primary" type="submit">Se connecter</button>
      </form>

      <p class="muted">Pas de compte ? <a href="/register">Créer un compte</a></p>
    </section>
  </main>

<?php require('app/View/General/footer.php'); ?>
</body>
</html>
