    
    <?php if ($typesList) : ?>
        <ul>
        <?php foreach ($typesList as $currentType) : ?>
            <li>
                <span class = "side-menu-item <?= $action == 'list' && $param && $param == $currentType['id'] ? ' selected-side-menu ' : '' ?>">
                    <a href="<?= BASE_URL ?>news/list/<?= $currentType['id'] ?>" class = "side-menu-item-text <?= $action == 'list' && $param && $param == $currentType['id'] ? ' selected-side-menu ' : '' ?>"><?= $currentType['name'] ?></a> 
                </span>
            </li>              
        <?php endforeach; ?>
        <li>
            <span class = "side-menu-item <?= $action == 'list' && $param && $param == '' ? ' selected-side-menu ' : '' ?>">
                <a href="<?= BASE_URL ?>news/list/" class = "side-menu-item-text <?= $action == 'list' && $param && $param == '' ? ' selected-side-menu ' : '' ?>">egyéb</a> 
            </span>
        </li>              
        
        </ul>
    <?php endif; ?>
    <!-- 
    <ul>
        <li><a href="<?= BASE_URL ?>types/edit" class = "add-icon">új típus</a> </li>
    </ul>
     -->