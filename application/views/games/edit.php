
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
                <label for="website">Weboldal:</label>
                <input type="text" name="website" value="<?= $game ? $game['website'] : '' ?>" id="website" size = "35"/>
            </p>

            <p>
                <label for="released">Kiadás dátuma:</label>
                <input type="text" name="released" value="<?= $game ? substr($game['released'], 0, 10) : '' ?>" id="released" class = "datepicker" size = "20"/>
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
                <?php if ($game && !empty($game['logo'])) : ?>
                    <div class = "img-wrapper">
                        <img id = "<?= $game['id'] ?>" class = "logo" src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= THUMB_UPLOAD_DIR . $game['logo']?>" alt="" />
                        <a href = "javascript:void(0);" class = "delete-img _hidden"></a>
                    </div>
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
                        <div class = "img-wrapper">
                            <a rel = "images-group" style = "padding:0px;" class = "images-fancybox" href="<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= $screen['path']?>">
                                <img id = "<?= $screen['id'] ?>" class = "screenshot"  src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>games/<?= THUMB_UPLOAD_DIR . $screen['path']?>" alt="" />
                                </a>
                            <a href = "javascript:void(0);" class = "delete-img "></a>
                        </div>
                    <?php endforeach; ?>
                    
                <?php endif; ?>
                
            </div>

            
            <p>
                <label>Video:</label>
                <span class = "videos-wrapper">
                    
                    <span class = "video" style = "margin:0px 0px 10px 0px;">
                        <input type="text" name="videos[]" size = "40" value = ""/>
                        <a href = "javascript:void(0);" class = "view-icon view-video"></a>
                        <a href = "javascript:void(0);" class = "add-icon add-video"></a>
                        <a href = "javascript:void(0);" class = "delete-icon delete-video"></a>
                        <br /><br />
                        <span class = "video-embed"></span>
                    </span>
                    
                    <?php if ($gameVideos) : ?> 
                        
                        <?php foreach ($gameVideos as $video) : ?>
                            
                            <span class = "video">
                                <span class = "video-embed" style = "border:0px solid #ccc;">
                                    <object width="440" height="255"> 
                                        <param name="movie" value="<?= $video['path'] ?>&amp;hl=hu_HU&amp;fs=1"></param>
                                        <param name="allowFullScreen" value="true"></param> 
                                        <param name="allowscriptaccess" value="always"></param> 
                                        <embed src="<?= $video['path'] ?>&amp;hl=hu_HU&amp;fs=1" 
                                               type="application/x-shockwave-flash" 
                                               allowscriptaccess="always" 
                                               allowfullscreen="true"
                                               width="440"
                                               height="255">
                                       </embed>
                                    </object>
                                    <span class = "delete-existing-video-wrapper" title = "videó törlése">
                                        <a id = "<?= $video['id'] ?>" href = "javascript:void(0);" class = "delete-existing-video "style = "margin:5px;"></a>
                                    </span>
                                </span>
                            </span>                            
                            
                        <?php endforeach; ?>
                        
                    <?php endif; ?>
                    
                </span>
            </p>
            
            <p>
                <label for = "description">Leírás:</label>
                <textarea name="description" rows="15" cols="68" id = "wysiwyg" class = "required"><?= $game ? htmlspecialchars_decode($game['description']) : '' ?></textarea>
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
            
            $('.images-fancybox').fancybox({
        		'transitionIn'		: 'elastic',
        		'transitionOut'		: 'elastic',
        		'titlePosition' 	: 'over'
            });


            App.AddVideoLinker();
            App.DeleteVideo({
                'url': 'games/delete-video'
            });
            App.EmbedVideo();
            
            App.RemoveVideo();
            
            App.DeleteImage({
                'url': 'games/delete-image'
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
        });
    </script>    