
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>settings/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $settings ? 'Beállítás szerkesztése' : 'Beállítás felvitele' ?></legend>
            
            <p>
                <label for = "name">Név:</label>
                <input type="text" name="name" id="name" size = "45" class = "required" value = ""/>
                <span class = "error-msg"></span>
            </p>
           
            <p>
                <label for = "value">Érték:</label>
                <input type="text" name="value" id="value" size = "45" class = "required" value = ""/>
                <span class = "error-msg"></span>
            </p>             
            
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Mentés" />
        </fieldset>
    
    </form>