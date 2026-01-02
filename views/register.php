<?php require_once __DIR__ . '/header.php'; ?>

<div class="form-container">
    <h1>Inscription</h1>

    <?php if (isset($erreur)): ?>
        <div style="color: red; margin-bottom: 15px;"><?= htmlspecialchars($erreur) ?></div>
    <?php endif; ?>

    <form action="index.php?page=register" method="POST">
        <div class="form-group">
            <label for="name">Nom d'affichage</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmer le mot de passe</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-purple">Créer mon compte</button>
    </form>

    <div class="mt-2 text-center">
        <span class="link-muted">Déjà inscrit ? <a href="index.php?page=login" class="link-blue">Se
                connecter.</a></span>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>