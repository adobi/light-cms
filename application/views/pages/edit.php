
    <?php echo Display::errors($errors); ?>
    
    <form action="<?= BASE_URL ?>pages/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $page ? 'Oldal szerkesztése' : 'Oldal felvitele' ?></legend>
            <p>
                <label for = "menus">Menü:</label>
                <?php if ($menusList): ?>
                    <br /><select name="menu_id" class = "required">
                        <option value="">-</option>
                        <?php foreach ($menusList as $menu) : ?>
                            <option value="<?= $menu['id'] ?>" <?= $page && $page['menu_id'] == $menu["id"] ? ' selected = "selected"' : '' ?>><?= $menu['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class = "error-msg"></span>
                <?php endif; ?>
            </p>
            <p>
                <label for = "title">Cím:</label>
                <br />
                <input type="text" name="title" id="title" size = "93" class = "required" value = "<?php echo ($page) ? htmlspecialchars_decode($page['title']) : '' ?>"/>
                <span class = "error-msg"></span>
            </p>
          
            <p>
                <label for = "content">Tartalom:</label>
                <textarea name="content" rows="30" cols="72" id = "wysiwyg" class = "required"><?php echo ($page) ? htmlspecialchars_decode($page['content']) : ''; ?></textarea>
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