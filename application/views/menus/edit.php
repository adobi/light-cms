
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>menus/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $page ? 'Menü szerkesztése' : 'Menü felvitele' ?></legend>

            <p>
                <label for = "username">Név:</label>
                
                <input type="text" name="name" id="name" size = "35" class = "required" value = ""/>
                <span class = "error-msg"></span>
            </p>
           
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Mentés" />
        </fieldset>
    
    </form>
    
