<?php require_once __DIR__ . '/header.php'; ?>

<div style="margin-bottom: 20px;">
    <a href="index.php?page=musics" class="link-muted">← Retour au catalogue</a>
</div>

<div class="card" style="max-width: 600px; margin: 0 auto; padding: 40px;">
    <h1><?= htmlspecialchars($musique['titre']) ?></h1>
    <p class="subtitle">Par <?= htmlspecialchars($musique['auteur']) ?></p>

    <div style="margin: 20px 0;">
        <p><strong>Album :</strong> <?= htmlspecialchars($musique['album'] ?? 'Non spécifié') ?></p>
        <p><strong>Durée :</strong> <?= htmlspecialchars($musique['duree']) ?></p>
    </div>

    <?php if (isset($_SESSION['user_email'])): ?>
        <form action="index.php?page=library" method="POST">
            <input type="hidden" name="add_music_id" value="<?= htmlspecialchars($musique['id_mu']) ?>">
            <button type="submit" class="btn btn-primary btn-purple">Ajouter à ma bibliothèque</button>
        </form>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>