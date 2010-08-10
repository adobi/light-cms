    
    <a href = "<?= BASE_URL ?>partners/edit/" class = "add-icon">új partner felvitele</a>
    
    <?php if ($partnersList) : ?>
        <br /><br />
        <div class="partners-list">
            <?php foreach ($partnersList as $partner) : ?>
                <div class = "partner">
                    <div class = "partner-name">
                        <?= $partner['name']; ?>
                    </div>
                    <a href = "<?= $partner['url'] ?>" target = "_blank">
                        <img src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>partners/<?= THUMB_UPLOAD_DIR . $partner['logo']?>" 
                             alt = "<?= $partner['name'] ?>" 
                             original-title = "<?= $partner['name'] ?>"/>
                    </a>
                    
                    <a href = "<?= BASE_URL ?>partners/delete/<?= $partner['id'] ?>" class = "delete-icon right">töröl</a>
                </div>
            <?php endforeach; ?>
            
        </div>
    <?php endif; ?>
    
    <script type="text/javascript" charset="utf-8">
        /*$(function() {
            $('.partner a img').tipsy({
                opacity: 0.8,
                gravity: 's'
            });
        });*/
        
        $('#sidebar').hide();
        $('.partners-list').css('width', '900px');
        $('#content').css('width', '900px');
        
    </script>