
    <a href = "<?= BASE_URL ?>settings/edit/" class = "add-icon">új beállítás felvitele</a>
    
    <?php if ($allSettings): ?>
        
        <div class = "settings-list editable-container">
            <?php foreach ($allSettings as $setting) : ?>
                <div class = "settings-item">
                    
                    <div class = "settings-item-name">
                        <?= $setting['name']; ?>
                        <a href = "<?= BASE_URL ?>settings/delete/<?= $setting['id'] ?>" class = "delete-icon right">töröl</a>
                    </div>
                    
                    <div class = "settings-item-value" style = "padding:8px 0">
                        <span class = " editable text" column = "value" itemid = "<?= $setting['id'] ?>"><?=$setting['value']; ?></span>
                    </div>
                    
                </div>                
            <?php endforeach; ?>
        </div>
 
    <?php else : ?>
        <br /><em>(nincs egyetlen beállítás sem)</em>
    <?php endif; ?>

<script type="text/javascript" charset="utf-8">
    $(function() {
        App.Editable({
            size: '35',
            saveTo: App.URL + 'settings/edit'
        });
        
        $('#sidebar').hide();
    });
</script>