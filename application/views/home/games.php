

    <?php if ($currentGame) : ?>

        <div class = "a-game">
            
            <h1><?= $currentGame['name'] ?> <span class = "released">(<?= $currentGame['released'] ?>)</span></h1> 
            <div class = "logo">
                <img src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= THUMB_UPLOAD_DIR . $currentGame['logo']?>"  />
            </div>
            <a href = "<?= $currentGame['website'] ?>" class = "appstore-link" target = "_blank"></a>
            <div class = "game-inner-nav">
                <a href="javascript:void(0);" class = "show-images">képek</a> | <a href="javascript:void(0);" class = "show-videos">videos</a>
            </div>
            
            <div class = "game-images hidden">
                <?php if ($currentGameScreenshots) : ?>
                    <?php foreach ($currentGameScreenshots as $cgs) : ?>        
                        
                        <div class = "page-img-wrapper">
                            <a rel = "images-group" style = "padding:0px;" class = "images-fancybox" href="<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= $cgs['path']?>">
                                <img class = "images"  src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= THUMB_UPLOAD_DIR . $cgs['path']?>" alt="" />
                            </a>
                        </div>                        
                        
                    <?php endforeach; ?>
                <?php else: ?>
                    <em>(nincs kép a bejegyzshez)</em>
                <?php endif; ?>   
            </div>            
            
            
            <div class = "game-videos hidden">
                <?php if ($currentGameVideos) : ?>
                    <?php foreach ($currentGameVideos as $cgv) : ?>        
                        
                        <div class = "video">
                            <?= Display::embed($cgv['path']) ?>
                        </div>
                        
                    <?php endforeach; ?>
                <?php else : ?>
                    <em>(nincs video a bejegyzéshez)</em>
                <?php endif; ?>   
            </div>            
            <div class = "game-description">
                <?= htmlspecialchars_decode($currentGame['description']) ?>
            </div>
        </div>
            
    <?php endif; ?>
    
    <script type="text/javascript" charset="utf-8">
        $(function() {
            
            $('.images-fancybox').fancybox({
        		'transitionIn'		: 'elastic',
        		'transitionOut'		: 'elastic',
        		'titlePosition' 	: 'over'
            }); 
            
            $('#content').delegate('.show-images', 'click', function() {
                
                $(this).parents('.a-game').find('.game-images').toggle();
                $('#content').jScrollPane({showArrows:false}); 
                return false;    
            });         
            $('#content').delegate('.show-videos', 'click', function() {
                
                $(this).parents('.a-game').find('.game-videos').toggle();
                //$('#content').jScrollPane({showArrows:false}); 
                return false;    
            });         
        });
    </script>