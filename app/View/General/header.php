
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Musicode · <?= htmlspecialchars($pageTitle) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="app/public/css/General.css" rel="stylesheet">
</head>
<body>
  <header class="site-header">
    <a class="brand" href="/musics">Musicode</a>
    <nav class="nav">
      <a href="/musics" class="<?= ($activePage === 'musics') ? 'active' : '' ?>">Catalogue</a>

      <!-- Liens conditionnels : affichés si l'utilisateur est connecté -->
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/library" class="<?= ($activePage === 'library') ? 'active' : '' ?>">Ma bibliothèque</a>
        <a href="/account" class="<?= ($activePage === 'account') ? 'active' : '' ?>">Mon compte</a>
        <a href="/logout">Déconnexion</a>
      <?php else: ?>
        <!-- Liens affichés si l'utilisateur n'est pas connecté -->
        <a href="/register" class="<?= ($activePage === 'register') ? 'active' : '' ?>">Inscription</a>
        <a href="/login" class="<?= ($activePage === 'login') ? 'active' : '' ?>">Connexion</a>
      <?php endif; ?>
    </nav>
  </header>

  <!-- Le contenu principal de la page commencera ici -->
  <main class="container">
