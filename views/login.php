<?php require_once __DIR__ . '/header.php'; ?>

<div class="form-container">
    <h1>Connexion</h1>
    <?php if (isset($erreur)): ?>
        <div style="color: red; margin-bottom: 15px;"><?= htmlspecialchars($erreur) ?></div>
    <?php endif; ?>

    <form action="index.php?page=login" method="POST">
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    <div class="mt-2 text-center">
        <span class="link-muted">Pas encore de compte ? <a href="index.php?page=register" class="link-blue">Créer un
                compte.</a></span>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>