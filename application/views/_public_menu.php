    <?php if (isset($mainMenus)) : ?>
        
        <?php foreach ($mainMenus as $menu) : ?>
            
            <a href="<?= BASE_URL . $menu['url'] ?>" class = "main-menuitem <?= $controller === $menu['url'] ? ' selected ' : '' ?>"><?= $menu['name'] ?></a>
            
        <?php endforeach; ?>
        
    <?php endif; ?>