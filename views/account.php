<?php require_once __DIR__ . '/header.php'; ?>

<div class="form-container">
    <h1>Mon compte</h1>

    <?php if (isset($succes)): ?>
        <div style="color: green; margin-bottom: 15px;"><?= htmlspecialchars($succes) ?></div>
            <?php endif; ?>
    <?php if (isset($erreur)): ?>
            <div style="color: red; margin-bottom: 15px;"><?= htmlspecialchars($erreur) ?></div>
    <?php endif; ?>

    <form action="index.php?page=account" method="POST">
        <div class="form-group">
            <label for="name">Nom d'affichage</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>"
                required>
        </div>

        <div class="form-group">
            <label for="password">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-purple">Mettre à jour</button>
    </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>