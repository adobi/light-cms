
<?php if ($displaySidebar) : ?>
    <?php foreach ($typesList as $tl) : ?>
    
        <a href="<?= BASE_URL . $controller .  '/' . $tl['url'] ?>"><?= $tl['name'] ?></a> |
    
    <?php endforeach; ?>
    
    <?php if ($gamesList) : ?>
        <br /><br />
        <ul>
            
            <?php foreach ($gamesList as $g) : ?>
                <li>
                    <a href="<?= BASE_URL . $controller . '/' . $g['type_name'] . '/' . $g['url'] ?>"><?= $g['name'] ?></a>
                </li>
            <?php endforeach; ?>
            
        </ul>
    
    <?php else : ?>
    <br /><br />
        <em>(nincs ilyen játék)</em>
    <?php endif; ?>
<?php endif; ?>