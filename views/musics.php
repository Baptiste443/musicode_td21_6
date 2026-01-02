<?php require_once __DIR__ . '/header.php'; ?>

<h1>Catalogue des musiques</h1>
<p class="subtitle">Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>

<div class="grid-container">
    <?php if (empty($musiques)): ?>
        <p>Aucune musique disponible.</p>
    <?php else: ?>
        <?php foreach ($musiques as $musique): ?>
            <div class="card">
                <h3><?= htmlspecialchars($musique['titre']) ?></h3>
                <div class="card-info">
                    <?= htmlspecialchars($musique['auteur']) ?> • <?= htmlspecialchars($musique['album'] ?? '') ?><br>
                    Durée : <?= htmlspecialchars($musique['duree']) ?>
                </div>
                <div class="card-actions">
                    <a href="index.php?page=musics/<?= $musique['id_mu'] ?>" class="link-blue">Voir la fiche</a>
                    <?php if (isset($_SESSION['user_email'])): ?>
                        <form action="index.php?page=library" method="POST">
                            <input type="hidden" name="add_music_id" value="<?= $musique['id_mu'] ?>">
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