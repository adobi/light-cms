
    <a href = "<?php echo BASE_URL ?>news/edit" class = "add-icon">új hír felvitele</a>
    
    <?= Display::errors($errors) ?>
    
    <?php if ($newsList) : ?>
        <div class = "buzz-list">
            
            <?php foreach ($newsList as $buzz) : ?>
                
                <div class = "buzz">
                    
                    <div class = "buzz-title">
                        <?= $buzz['title']; ?> 
                        (<em><?= $buzz['created'] ?></em>)
                        <a href = "<?= BASE_URL ?>news/delete/<?= $buzz['id'] ?>" class = "delete-icon right">töröl</a>
                        <a href = "<?= BASE_URL ?>news/edit/<?= $buzz['id'] ?>" class = "view-icon right">módosít</a>
                    </div>
                    <div class = "buzz-content">
                        <?= htmlspecialchars_decode($buzz['content']); ?>
                    </div>
                </div>
                
            <?php endforeach; ?>
        </div>
        
    <?php else : ?>
        <br /> <em>nincs hír az adatbázisban</em>
    <?php endif; ?>