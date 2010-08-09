    
    <?php if ($typesList) : ?>
        
        <br /><br />
        <ul class = "types-list">
            <?php foreach($typesList as $type) : ?>
                <li class = "type" id = "orders_<?= $type['id'] ?>">
                    <?= $type['name'] ?>
                    <a href = "<?= BASE_URL ?>types/delete/<?= $type['id'] ?>" class = "delete-icon right">töröl</a>
                </li>            
            <?php endforeach; ?>
        </ul>
        
    <?php else: ?>
        <br /><em>(nincs egyetlen játék sem)</em>
    <?php endif; ?>

        
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.types-list').sortable({ 
                opacity: 0.6, 
                cursor: 'move', 
                update: function(event, ui) {
        			var order = $(this).sortable("serialize"); 
        			
        			$.post(
        			    App.URL + 'types/update', 
        			    order, 
        			    function() {
        			    
        			    }
    			    );
        		}								  
    		});

        });
    </script>        