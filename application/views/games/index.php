
    <a href = "<?= BASE_URL ?>games/edit/" class = "add-icon">új játék felvétele</a>
    
    <?php if ($gamesList) : ?>
        
        <div class = "games-list">
            
            <?php foreach ($gamesList as $game) : ?>
                
                <div class = "game" id = "orders_<?= $game['id'] ?>">
                    
                    <!-- <a href = "<?= BASE_URL . 'games/edit/' . $game['id'] ?>"> -->
                        <img src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= THUMB_UPLOAD_DIR . $game['logo']?>" 
                             alt = "<?= $game['name'] ?>" 
                             original-title = "<?= $game['name'] ?> szerkesztése"/>
                    <!-- </a> -->
                    <strong><?= $game['name']; ?> (<?= substr($game['released'], 0, 10) ?>)</strong>
                    <br /><br />
                    <a href = "<?= BASE_URL ?>game/delete/<?= $game['id'] ?>" class = "delete-icon right">töröl</a>
                    <a href = "<?= BASE_URL ?>game/edit/<?= $game['id'] ?>" class = "view-icon right">módosít</a>
                </div>
                
            <?php endforeach; ?>
        </div>
        
    <?php else: ?>
        <br /><em>(nincs egyetlen játék sem)</em>
    <?php endif; ?>
        
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.games-list').sortable({ 
                opacity: 0.6, 
                cursor: 'move', 
                update: function(event, ui) {
        			var order = $(this).sortable("serialize"); 
        			
        			$.post(
        			    App.URL + 'games/update', 
        			    order, 
        			    function() {
        			    
        			    }
    			    );
        		}								  
    		});
    		/*
            $('.game img').tipsy({
                opacity: 0.8,
                gravity: 's'
            });
            */    		
        });
    </script>         