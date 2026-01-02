<?php require_once __DIR__ . '/header.php'; ?>

<h1>Catalogue des musiques</h1>
<p class="subtitle">Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>

<div class="grid-container">
    <?php if (empty($musics)): ?>
        <p>Aucune musique disponible.</p>
    <?php else: ?>
        <?php foreach($musics as $music): ?>
            <div class="card">
                <h3><?= htmlspecialchars($music['title']) ?></h3>
                <div class="card-info">
                    <?= htmlspecialchars($music['artist']) ?> • <?= htmlspecialchars($music['album'] ?? '') ?><br>
                    Durée : <?= htmlspecialchars($music['duration']) ?>
                </div>
                <div class="card-actions">
                    <a href="/musics/<?= $music['id'] ?>" class="link-blue">Voir la fiche</a>
                    <?php if(isset($_SESSION['user'])): ?>
                        <form action="/library/add" method="POST">
                            <input type="hidden" name="music_id" value="<?= $music['id'] ?>">
                            <button type="submit" class="btn btn-primary btn-small">Ajouter</button>
                        </form>
                    <?php else: ?>
                        <span style="font-size:0.8rem; color:#aaa;">Connectez-vous</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>