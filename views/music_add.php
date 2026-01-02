<?php require_once __DIR__ . '/header.php'; ?>

<div style="margin-bottom: 20px;">
    <a href="/musics" class="link-muted">← Retour au catalogue</a>
</div>

<div class="form-container" style="max-width: 800px;">
    <h1>Ajouter une musique</h1>
    
    <form action="/musics/add" method="POST">
        <div class="form-group">
            <label for="title">Titre *</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="artist">Artiste *</label>
            <input type="text" id="artist" name="artist" required>
        </div>
        <div class="form-group">
            <label for="album">Album</label>
            <input type="text" id="album" name="album">
        </div>
        <div class="form-group">
            <label>Durée *</label>
            <div class="duration-inputs">
                <input type="number" name="duration_min" placeholder="Min" required> : 
                <input type="number" name="duration_sec" placeholder="Sec" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>