
    <a href = "<?php echo BASE_URL ?>news/edit" class = "add-icon">új hír felvitele</a>
    
    <?= Display::errors($errors) ?>
    
    <?php if ($newsList) : ?>
        <div class = "buzz-list">
            
            <?php foreach ($newsList as $buzz) : ?>
                
                <div class = "buzz">
                    <?php if ($buzz['type_id']) : ?>
                        <?php  
                            switch ($buzz['type_id']) {
                                case '7': $type = 'iphone'; break;
                                case '6': $type = 'pc'; break;
                                case '2': $type = 'psp'; break;
                                default: $type = '';
                            }
                        
                        ?>
                    <?php else : ?>
                        <?php $type = ''; ?>
                    <?php endif; ?>
                    <div class = "buzz-title">
                        <span class = "buzz-type-<?= $type; ?>"></span>
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
    
    
    <script type="text/javascript" charset="utf-8">
        $(function() {
            //$('#sidebar').hide();
            
            //$('.buzz-list').css('width', '900px');
        });
    </script>    