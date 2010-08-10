
    <?php if ($currentTypes) : ?>
        <ul>
        <?php foreach ($currentTypes as $currentType) : ?>
            <li id = "orders_<?= $currentType['id'] ?>">
                <span class = "side-menu-item <?= $param && $param == $currentType['id'] ? ' selected-side-menu ' : '' ?>">
                    <a href="<?= BASE_URL ?>games/list/<?= $currentType['id'] ?>" class = "side-menu-item-text <?= $param && $param == $currentType['id'] ? ' selected-side-menu ' : '' ?>"><?= $currentType['name'] ?></a> 
                    <!-- <strong class = "side-menu-item-text <?= $param && $param == $currentType['id'] ? ' selected-side-menu ' : '' ?>"><?= $currentType['name'] ?></strong> -->
                    <a href = "<?= BASE_URL ?>types/delete/<?= $currentType['id'] ?>" class = "delete-icon right"></a> 
                    <a href = "<?= BASE_URL ?>types/edit/<?= $currentType['id'] ?>" class = "view-icon right"></a>
                </span>
            </li>              
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <ul>
        <li><a href="<?= BASE_URL ?>types/edit">új típus</a> <!-- | <a href="<?= BASE_URL ?>types/">összes típus</a> --> </li>
    </ul>

        
    <script type="text/javascript" charset="utf-8">
        $(function() {
            
            $('#sidebar .side-menu-item').css('cursor', 'move');

            $('.side-menu-item').hover(
                function() {
                    $(this).css({'color': '#fff', 'background': '#453a31'});
                    $(this).find('.side-menu-item-text').css('color', '#fff');
                },
                function() {
                    $(this).css({'color': '#453a31', 'background': '#eaeaea'});
                    $(this).find('.side-menu-item-text').css('color', '#453A31');
                }
            );
            
            $('#sidebar ul').sortable({ 
                opacity: 0.6, 
                cursor: 'move', 
                placeholder: 'sortable-state-highlight',
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