        
    <ul>
    <?php foreach($menusList as $menu) : ?>
        <li id = "orders_<?= $menu['id'] ?>">
            <span class = "side-menu-item <?= $param && $param == $menu['id'] ? ' selected-side-menu ' : '' ?>">
                <a href="<?= BASE_URL ?>pages/list/<?= $menu['id'] ?>" class = "side-menu-item-text<?= $param && $param == $menu['id'] ? ' selected-side-menu ' : '' ?>"><?= $menu['name'] ?></a>
                <!-- <strong class = "side-menu-item-text <?= $param && $param == $menu['id'] ? ' selected-side-menu ' : '' ?>"><?= $menu['name'] ?></strong> -->
                <a href = "<?= BASE_URL ?>menus/delete/<?= $menu['id'] ?>" class = "delete-icon right"></a> 
                <a href = "<?= BASE_URL ?>menus/edit/<?= $menu['id'] ?>" class = "view-icon right"></a>
            </span>
        </li>            
    <?php endforeach; ?>
    </ul>

    <ul>
        <li><a href="<?= BASE_URL ?>menus/edit">új menu</a> <!-- | <a href="<?= BASE_URL ?>types/">összes típus</a> --> </li>        
    </ul>                

    <script type="text/javascript" charset="utf-8">
        $(function() {
            
            $('.side-menu-item').hover(
                function() {
                    $(this).css('color', '#fff');
                    $(this).find('.side-menu-item-text').css('color', '#fff');
                },
                function() {
                    $(this).css('color', '#453A31');
                    $(this).find('.side-menu-item-text').css('color', '#453A31');
                }
            );
            
            $('#sidebar .side-menu-item').css('cursor', 'move');
            
            $('#sidebar ul').sortable({ 
                opacity: 0.6, 
                cursor: 'move', 
                placeholder: 'sortable-state-highlight',
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