
    <a href = "<?= BASE_URL ?>pages/edit/" class = "add-icon">új oldal felvétele</a>
    
    <?php if ($pagesList) : ?>
        
        <div class = "pages-list">
            
            <?php foreach ($pagesList as $page) : ?>
                <div class = "page">
                    
                    <div class = "page-title">
                        <?= $page['name']; ?>
                        <span class = "arrow-right"></span>
                        <?= $page['title']; ?>
                        (<em><?= $page['created'] ?></em>)
                        <a href = "<?= BASE_URL ?>pages/delete/<?= $page['id'] ?>" class = "delete-icon right">töröl</a>
                        <a href = "<?= BASE_URL ?>pages/edit/<?= $page['id'] ?>" class = "view-icon right">módosít</a>
                    </div>
                    <div class = "page-content-short">
                        <?= substr(htmlspecialchars_decode($page['content']), 0, 1000); ?>...
                        <a href="javascript:void(0);" class = "show-all-page-content"></a>
                    </div>
                    <div class = "page-content hidden">
                        <?= htmlspecialchars_decode($page['content']); ?>
                        <a href="javascript:void(0);" class = "hide-all-page-content"></a>
                    </div>
                    
                </div>
            <?php endforeach; ?>
            
        </div>
        
    <?php else: ?>
        <br /><em>(nincs egyetlen oldal sem)</em>
    <?php endif; ?>
        
    <script type="text/javascript">
        $(function() {
            
            $('.pages-list').delegate('.show-all-page-content', 'click', function() {
                
                var self = $(this);
                self.parents('.page:first').find('.page-content').show();
                self.parents('.page-content-short').hide();
                
                return false;
            });
            
            $('.pages-list').delegate('.hide-all-page-content', 'click', function() {
                
                var self = $(this);
                self.parents('.page:first').find('.page-content-short').show();
                self.parents('.page-content').hide();
                
                return false;
            });            
        });
    </script>