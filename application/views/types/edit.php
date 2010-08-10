
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>types/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $type ? 'Típus szerkesztése' : 'Típus felvitele' ?></legend>

            <p>
                <label for = "name">Név:</label>
                
                <input type="text" name="name" id="name" size = "35" class = "required" value = "<?= $type ? $type['name'] : '' ?>"/>
                <span class = "error-msg"></span>
            </p>
           
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Mentés" />
        </fieldset>
    
    </form>
    
