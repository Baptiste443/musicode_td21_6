<?php require_once __DIR__ . '/header.php'; ?>

<?php if (isset($_SESSION['success_message'])): ?>
    <div
        style="background: #eef9fd; border: 1px solid #b8daff; color: #004085; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <?= htmlspecialchars($_SESSION['success_message']) ?>
        <?php unset($_SESSION['success_message']); ?>
    </div>
<?php endif; ?>

<h1>Ma bibliothèque</h1>
<p class="subtitle">Gérez vos morceaux préférés et ajustez vos notes.</p>

<div class="grid-container">
    <?php if (empty($bibliotheque)): ?>
        <p>Votre bibliothèque est vide. <a href="index.php?page=musics" class="link-blue">Allez ajouter des musiques !</a>
        </p>
    <?php else: ?>
        <?php foreach ($bibliotheque as $musique): ?>
            <div class="card">
                <h3><?= htmlspecialchars($musique['titre']) ?></h3>
                <div class="card-info">
                    <?= htmlspecialchars($musique['auteur']) ?> • Album : <?= htmlspecialchars($musique['album'] ?? '') ?><br>
                    Durée : <?= htmlspecialchars($musique['duree']) ?>
                </div>

                <form action="index.php?page=library" method="POST" style="margin-top: 10px;">
                    <input type="hidden" name="rate_music_id" value="<?= htmlspecialchars($musique['id_mu']) ?>">
                    <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 15px;">
                        <label style="margin:0; font-size: 0.9rem;">Note :</label>
                        <input type="number" name="rating" min="0" max="5" value="<?= htmlspecialchars($musique['note']) ?>"
                            style="width: 60px; padding: 5px;">
                        <button type="submit" class="btn btn-secondary btn-small">Mettre à jour</button>
                    </div>
                </form>

                <form action="index.php?page=library" method="POST">
                    <input type="hidden" name="remove_music_id" value="<?= htmlspecialchars($musique['id_mu']) ?>">
                    <button type="submit" class="btn btn-danger btn-small"
                        style="background: #ffdbdb; color: #d63031; border:none; width: 100%;">Retirer de ma
                        bibliothèque</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>