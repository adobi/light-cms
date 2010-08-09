
    <?php if ($currentTypes) : ?>
        
        <?php foreach ($currentTypes as $currentType) : ?>
            
            <li>
                <a href="<?= BASE_URL ?>games/show/<?= $currentType['url'] ?>" class = "side-menu-item"><?= $currentType['name'] ?></a>
            </li>
            
        <?php endforeach; ?>
        
    <?php endif; ?>
    
    <li><a href="<?= BASE_URL ?>types/edit">új típus</a> | <a href="<?= BASE_URL ?>types/">összes típus</a> </li>