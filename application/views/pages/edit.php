
    <?php echo Display::errors($errors); ?>
    
    <form action="<?= BASE_URL ?>pages/edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "edit-form">
        
        <fieldset>
            <legend><?php echo $page ? 'Oldal szerkesztése' : 'Oldal felvitele' ?></legend>
            <p>
                <label for = "menus">Menü:</label>
                <?php if ($menusList): ?>
                    <select name="menu_id" class = "required">
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
                
                <input type="text" name="title" id="title" size = "75" class = "required" value = "<?= ($page) ? htmlspecialchars_decode($page['title']) : '' ?>"/>
                <span class = "error-msg"></span>
            </p>

            
            <p>
                <label for = "pictures">Galléria:</label>
                <span style = "display:inline-block">
                    <input type="file" name="pictures" id="pictures" class = "file-upload left" size = "10"/>
                    <a class = "file-upload" href="javascript:$('#pictures').fileUploadStart();">Fájl feltöltése</a> 
                    <a class = "file-upload" href="javascript:$('#pictures').fileUploadClearQueue();">Fájl eltávolítása</a> 
                </span>
                <span class = "error-msg"></span>
            </p>   
            <div class = "uploaded-files">
                <?php if ($pageImages) : ?>
                    
                    <?php foreach ($pageImages as $image) : ?>
                        <div class = "img-wrapper">
                            <a rel = "images-group" style = "padding:0px;" class = "images-fancybox" href="<?= BASE_URL . FOTO_UPLOAD_DIR ?>gallery/<?= $image['path']?>">
                                <img id = "<?= $image['id'] ?>" class = "images"  src = "<?= BASE_URL . FOTO_UPLOAD_DIR ?>gallery/<?= THUMB_UPLOAD_DIR . $image['path']?>" alt="" />
                            </a>
                            <a href = "javascript:void(0);" class = "delete-img " title = "Kép törlése"></a>
                            
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
                    
                    <?php if ($pageVideos) : ?> 
                        
                        <?php foreach ($pageVideos as $video) : ?>
                            
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
                <label for = "content">Tartalom:</label>
                <textarea name="content" rows="30" cols="65" id = "wysiwyg" class = "required"><?= ($page) ? htmlspecialchars_decode($page['content']) : ''; ?></textarea>
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
            
            $('.delete-existing-video-wrapper').tipsy({
                opacity: 0.8,
                gravity: 'w'
            });            
            
            $('.delete-img').tipsy({
                opacity: 0.8,
                gravity: 's'
            });

            App.UploadFiles($('#pictures'), {
                "folder": "/invictus/invictus.hu/public/<?= FOTO_UPLOAD_DIR ?>gallery/",
                "script": "/invictus/invictus.hu/public/uploads/upload.php",
                "multi": true,
                "filenames": "pictures[]"
            });

            App.AddVideoLinker();
            App.DeleteVideo({
                'url': 'pages/delete-video'
            });
            App.EmbedVideo();
            
            App.RemoveVideo();
            
            App.DeleteImage({
                'url': 'pages/delete-image'
            });
            
                    

        });
    </script>