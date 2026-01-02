<?php require_once __DIR__ . '/header.php'; ?>

<div class="form-container">
    <h1>Mon compte</h1>
    
    <?php if (isset($success)): ?>
        <div style="color: green; margin-bottom: 15px;"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="/account/update" method="POST">
        <div class="form-group">
            <label for="name">Nom d'affichage</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>" required>
        </div>

        <div style="display: flex; gap: 15px;">
            <div class="form-group" style="flex:1;">
                <label for="new_password">Nouveau mot de passe</label>
                <input type="password" id="new_password" name="new_password" placeholder="Laisser vide pour conserver l'actuel.">
            </div>
            <div class="form-group" style="flex:1;">
                <label for="confirm_password">Confirmation</label>
                <input type="password" id="confirm_password" name="confirm_password">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-purple">Mettre à jour</button>
    </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>