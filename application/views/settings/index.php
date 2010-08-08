
    <a href = "<?= BASE_URL ?>settings/edit/" class = "add-icon">új beállítás felvitele</a>
    
    <?php if ($allSettings): ?>
        
        <div class = "settings-list">
            <?php foreach ($allSettings as $setting) : ?>
                <div class = "settings-item">
                    
                    <div class = "settings-item-name">
                        <?= $setting['name']; ?>
                    </div>
                    
                    <div class = "settings-item-value">
                        <br />
                        <?= $setting['value']; ?>
                        <a href = "<?= BASE_URL ?>settings/delete/<?= $setting['id'] ?>" class = "delete-icon right">töröl</a>
                    </div>
                    
                </div>                
            <?php endforeach; ?>
        </div>

    <?php else : ?>
        <br /><em>(nincs egyetlen beállítás sem)</em>
    <?php endif; ?>
