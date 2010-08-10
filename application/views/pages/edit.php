
    <?php echo Display::errors($errors); ?>
    
    <form action="<?= BASE_URL ?>pages/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $page ? 'Oldal szerkesztése' : 'Oldal felvitele' ?></legend>
            <p>
                <label for = "menus">Menü:</label>
                <?php if ($menusList): ?>
                    <br /><select name="menu_id">
                        <option value="0">-</option>
                        <?php foreach ($menusList as $menu) : ?>
                            <option value="<?= $menu['id'] ?>"><?= $menu['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
                <span class = "error-msg"></span>                
            </p>
            <p>
                <label for = "title">Cím:</label>
                <br />
                <input type="text" name="title" id="title" size = "95" class = "required" value = "<?php echo ($page) ? htmlspecialchars_decode($page['title']) : '' ?>"/>
                <span class = "error-msg"></span>
            </p>
          
            <p>
                <label for = "content">Tartalom:</label>
                <textarea name="content" rows="10" cols="72" id = "wysiwyg" class = "required"><?php echo ($page) ? htmlspecialchars_decode($buzz['content']) : ''; ?></textarea>
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

        });
    </script>