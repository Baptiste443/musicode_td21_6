<?php require_once __DIR__ . '/header.php'; ?>

<div style="margin-bottom: 20px;">
    <a href="/musics" class="link-muted">← Retour au catalogue</a>
</div>

<div class="card" style="max-width: 600px; margin: 0 auto; padding: 40px;">
    <h1><?= htmlspecialchars($music['title']) ?></h1>
    <p class="subtitle">Par <?= htmlspecialchars($music['artist']) ?></p>
    
    <div style="margin: 20px 0;">
        <p><strong>Album :</strong> <?= htmlspecialchars($music['album'] ?? 'Non spécifié') ?></p>
        <p><strong>Durée :</strong> <?= htmlspecialchars($music['duration']) ?></p>
    </div>

    <?php if(isset($_SESSION['user'])): ?>
        <form action="/library/add" method="POST">
            <input type="hidden" name="music_id" value="<?= htmlspecialchars($music['id']) ?>">
            <button type="submit" class="btn btn-primary btn-purple">Ajouter à ma bibliothèque</button>
        </form>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>