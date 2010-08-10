
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>menus/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $menu ? 'Menü szerkesztése' : 'Menü felvitele' ?></legend>

            <p>
                <label for = "username">Név:</label>
                
                <input type="text" name="name" id="name" size = "35" class = "required" value = "<?= $menu ? $menu['name'] : '' ?>"/>
                <span class = "error-msg"></span>
            </p>
           
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Mentés" />
        </fieldset>
    
    </form>
    
