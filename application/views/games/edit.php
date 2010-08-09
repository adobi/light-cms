
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>games/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $game ? 'Játék szerkesztése' : 'Játék felvitele' ?></legend>

            <p>
                <label for = "name">Név:</label>
                
                <input type="text" name="name" id="name" size = "35" class = "required" value = "<?= $game ? $game['name'] : '' ?>"/>
                <span class = "error-msg"></span>
            </p>
            <p>
                <label for="type">Típus:</label>
                <select name="type_id" id="type" class = "required">
                    <option value="">-</option>
                    <?php foreach ($currentTypes as $currentType) : ?>
                        
                        <option value="<?= $currentType['id'] ?>" 
                                <?= $game && $game['type_id'] == $currentType['id'] ? ' selected = "selected" ' : '' ?>
                        >
                            <?= $currentType['name'] ?>
                        </option>
                        
                    <?php endforeach ?>
                </select>
                <span class = "error-msg"></span>
            </p>

            <p>
                <label for="released">Kiadás dátuma:</label>
                <input type="text" name="released" value="<?= $game ? $game['released'] : '' ?>" id="released" class = "datepicker" size = "20"/>
            </p>
            
            <p>
                <label for = "logo">Logo:</label>
                <span style = "display:inline-block">
                    <input type="file" name="logo" id="fileInputLogo" class = "file-upload" size = "10"/>
                    <span class = "error-msg"></span>
                    <a class = "file-upload" href="javascript:$('#fileInputLogo').fileUploadStart();">Fájl feltöltése</a> <a class = "file-upload" href="javascript:$('#fileInputLogo').fileUploadClearQueue();">Fájl eltávolítása</a>
                </span>
            </p>             
            <div class = "uploaded-files">
                <?php if ($game) : ?>
                    <img  src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= THUMB_UPLOAD_DIR . $game['logo']?>" alt="" />
                <?php endif; ?>
            </div>
            
            <p>
                <label for = "logo">Screenshotok:</label>
                <span style = "display:inline-block">
                    <input type="file" name="logo" id="screenshots" class = "file-upload left" size = "10"/>
                    <a class = "file-upload" href="javascript:$('#screenshots').fileUploadStart();">Fájl feltöltése</a> 
                    <a class = "file-upload" href="javascript:$('#screenshots').fileUploadClearQueue();">Fájl eltávolítása</a> 
                </span>
                <span class = "error-msg"></span>
            </p>
            <div class = "uploaded-files">
                
                <?php if ($game && $gamesScreenshots) : ?>
                    
                    <?php foreach ($gamesScreenshots as $screen) : ?>
                        <img  src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= THUMB_UPLOAD_DIR . $screen['path']?>" alt="" />
                    <?php endforeach; ?>
                    
                <?php endif; ?>
                
            </div>
            <p>
                <label for = "description">Leírás:</label>
                <textarea name="description" rows="15" cols="68" id = "wysiwyg" class = "required"><?= $game ? $game['description'] : '' ?></textarea>
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
        App.UploadFiles($('#fileInputLogo'), {
            "folder": "/invictus/invictus.hu/public/<?= FOTO_UPLOAD_DIR ?>games/",
            "script": "/invictus/invictus.hu/public/uploads/upload.php",
            //"script": "/partners/upload/",
            "multi": false,
            "filenames": "logo[]"
        });  
                
        
        App.UploadFiles($('#screenshots'), {
            "folder": "/invictus/invictus.hu/public/<?= FOTO_UPLOAD_DIR ?>games/",
            "script": "/invictus/invictus.hu/public/uploads/upload.php",
            //"script": "/partners/upload/",
            "multi": true,
            "filenames": "screenshots[]"
        });
                     
        
        $('.datepicker').datepicker({ 
            dateFormat: 'yy-mm-dd',
    		changeYear: true, 
    		changeMonth: true, 
    		showMonthAfterYear:true, 
    		yearRange: '1940:+0',
            showOn: 'both',
			buttonImage: App.URL + 'img/calendar.png',
			buttonImageOnly: true
		});
        
    </script>    