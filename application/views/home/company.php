

    <?php if ($_pages) : ?>

        <?php foreach ($_pages as $p) : ?>
            
            <h1><?= $p['title'] ?></h1> (<?= $p['created'] ?>)
            
            
            <div class = "page-content">
                <?= htmlspecialchars_decode($p['content']) ?>
            </div>
            
        <?php endforeach; ?>
            
    <?php endif; ?>