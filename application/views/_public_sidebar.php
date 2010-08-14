
<?php if ($displaySidebar) : ?>
    <span class = "sidebar-title"><?= $action ? $action : '' ?> games</span>
    <?php foreach ($typesList as $tl) : ?>
    
        <a class = "game-category <?= $tl['url'] ?>" href="<?= BASE_URL . $controller .  '/' . $tl['url'] ?>"></a>
    
    <?php endforeach; ?>
    
    <?php if ($gamesList) : ?>
        <br /><br />
        <ul>
            
            <?php foreach ($gamesList as $g) : ?>
                <li>
                    <a class = "menuitems" href="<?= BASE_URL . $controller . '/' . $g['type_name'] . '/' . $g['url'] ?>"><?= $g['name'] ?></a>
                </li>
            <?php endforeach; ?>
            
        </ul>
    
    <?php else : ?>
    <br /><br />
        <em>(nincs ilyen játék)</em>
    <?php endif; ?>
<?php endif; ?>