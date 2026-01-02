<?php require_once __DIR__ . '/header.php'; ?>

<div style="margin-bottom: 20px;">
    <a href="index.php?page=musics" class="link-muted">← Retour au catalogue</a>
</div>

<div class="form-container" style="max-width: 800px;">
    <h1>Ajouter une musique</h1>

    <form action="index.php?page=musics/add" method="POST">
        <div class="form-group">
            <label for="titre">Titre *</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div class="form-group">
            <label for="auteur">Artiste *</label>
            <input type="text" id="auteur" name="auteur" required>
        </div>
        <div class="form-group">
            <label for="album">Album</label>
            <input type="text" id="album" name="album">
        </div>
        <div class="form-group">
            <label for="duree">Durée (ex: 03:45) *</label>
            <input type="text" id="duree" name="duree" placeholder="00:00:00" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>