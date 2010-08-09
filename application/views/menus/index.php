
    <a href = "<?= BASE_URL ?>menus/edit/" class = "add-icon">új menü felvétele</a>
    
    <?php if ($menusList) : ?>
        <br /><br />
        <ul class = "menus-list">
            <?php foreach($menusList as $menu) : ?>
                <li class = "menu" id = "orders_<?= $menu['id'] ?>">
                    <?= $menu['name'] ?>
                    <a href = "<?= BASE_URL ?>menus/delete/<?= $menu['id'] ?>" class = "delete-icon right">töröl</a>
                </li>            
            <?php endforeach; ?>
        </ul>
        
    <?php else: ?>
        <br /><em>(nincs egyetlen menü sem)</em>
    <?php endif; ?>
        
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.menus-list').sortable({ 
                opacity: 0.6, 
                cursor: 'move', 
                update: function(event, ui) {
        			var order = $(this).sortable("serialize"); 
        			
        			$.post(
        			    App.URL + 'menus/update', 
        			    order, 
        			    function() {
        			    
        			    }
    			    );
        		}								  
    		});

        });
    </script>