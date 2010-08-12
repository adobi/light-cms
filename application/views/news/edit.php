
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>news/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $buzz ? 'Hír szerkesztése' : 'Hír felvitele' ?></legend>
            
            <p>
                <label for="type_id">Típus:</label>
                <?php if ($typesList) : ?>
                    <br /><select name="type_id" id="type_id">
                        <option value="">-</option>
                        
                        <?php foreach($typesList as $type) : ?>
                            <option value="<?= $type['id'] ?>" <?= $buzz && $buzz['type_id'] == $type['id'] ? ' selected = "selected" ' : '' ?>><?= $type['name'] ?></option>  
                        <?php endforeach; ?>    
                            
                    </select>    
                <?php endif; ?>
            </p>
            
            <p>
                <label for = "title">Cím:</label><br />
                <input type="text" name="title" id="title" size = "95" class = "required" value = "<?php echo ($buzz) ? htmlspecialchars_decode($buzz['title']) : '' ?>"/>
                <span class = "error-msg"></span>
                <br />
            </p>
            
            <p>
                <label for = "content">Tartalom:</label>
                <textarea name="content" rows="10" cols="72" id = "wysiwyg" class = "required"><?php echo ($buzz) ? htmlspecialchars_decode($buzz['content']) : ''; ?></textarea>
                <span class = "error-msg"></span>
            </p>             
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Mentés" />
        </fieldset>
    
    </form>
    
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('#wysiwyg').wysiwyg();
            
            //$('#sidebar').hide();
        });
    </script>