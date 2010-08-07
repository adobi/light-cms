
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>partners/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $partner ? 'Partner szerkesztése' : 'Partner felvitele' ?></legend>
            
            <p>
                <label for = "name">Név:</label>
                <input type="text" name="name" id="name" size = "45" class = "required" value = "<?= ($partner) ? htmlspecialchars_decode($partner['name']) : '' ?>"/>
                <span class = "error-msg"></span>
            </p>
           
            <p>
                <label for = "url">Weboldal:</label>
                <input type="text" name="url" id="url" size = "45" class = "required" value = "<?= ($partner) ? htmlspecialchars_decode($partner['url']) : '' ?>"/>
                <span class = "error-msg"></span>
            </p>             
            
            <p>
                <label for = "logo">Logo:</label>
                <input type="file" name="logo" id="fileInput" class = "file-upload" size = "10"/>
                <span class = "error-msg"></span>
                <a class = "file-upload" href="javascript:$('#fileInput').fileUploadStart();">Fájl feltöltése</a> <a class = "file-upload" href="javascript:$('#fileInput').fileUploadClearQueue();">Fájl eltávolítása</a>            
            </p>             
            <div id = "uploaded-files"></div>
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Mentés" />
        </fieldset>
    
    </form>
    
    <script type="text/javascript" charset="utf-8">
        $(function() {
            App.UploadFiles({
                "folder": "/invictushu/public/<?= FOTO_UPLOAD_DIR ?>partners/",
                "script": "/invictushu/public/uploads/upload.php",
                //"script": "/partners/upload/",
                "multi": false
            });

        });
    </script>