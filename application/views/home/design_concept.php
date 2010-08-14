

    <?php if ($_pages) : ?>

        <?php foreach ($_pages as $p) : ?>
            <div class = "a-page">
                
                <h1><?= $p['title'] ?>(<?= $p['created'] ?>)</h1> 
                <div class = "page-content">
                    <?= htmlspecialchars_decode($p['content']) ?>
                </div>
                <div class = "game-inner-nav">
                <a href="javascript:void(0);" class = "show-images">képek</a> | <a href="javascript:void(0);" class = "show-videos">videos</a>
                </div>               
                <div class = "page-images hidden">
                    <?php $pageImages = $images->fetchAllByPage(intval($p['id'])); ?>
                    <?php if ($pageImages) : ?>
                        <?php foreach ($pageImages as $pi) : ?>        
                            
                            <div class = "page-img-wrapper">
                                <a rel = "images-group" style = "padding:0px;" class = "images-fancybox" href="<?= BASE_URL . FOTO_UPLOAD_DIR ?>gallery/<?= $pi['path']?>">
                                    <img class = "images"  src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>gallery/<?= THUMB_UPLOAD_DIR . $pi['path']?>" alt="" />
                                </a>
                            </div>                        
                            
                        <?php endforeach; ?>
                    <?php else: ?>
                        <em>nincs kép a bejegyzshez</em>
                    <?php endif; ?>   
                </div>            
                
                <?php $pageVideos = $videos->fetchAllByPage(intval($p['id'])); ?>
                
                <div class = "page-videos hidden">
                    <?php if ($pageVideos) : ?>
                        <?php foreach ($pageVideos as $pv) : ?>        
                            
                            <div class = "video">
                                <?= Display::embed($pv['path']) ?>
                            </div>
                            
                        <?php endforeach; ?>
                    <?php else : ?>
                        <em>(nincs video a bejegyzéshez)</em>
                    <?php endif; ?>   
                </div>            
            </div>
            
        <?php endforeach; ?>
            
    <?php endif; ?>
    
    <script type="text/javascript" charset="utf-8">
        $(function() {
            
            $('.images-fancybox').fancybox({
        		'transitionIn'		: 'elastic',
        		'transitionOut'		: 'elastic',
        		'titlePosition' 	: 'over'
            }); 
            
            $('#content').delegate('.show-images', 'click', function() {

                $(this).parents('.a-page').find('.page-images').toggle();
                $('#content').jScrollPane({showArrows:false}); 
                return false;    
            });         
            $('#content').delegate('.show-videos', 'click', function() {

                $(this).parents('.a-page').find('.page-videos').toggle();
                $('#content').jScrollPane({showArrows:false}); 
                return false;    
            });          
        });
    </script>