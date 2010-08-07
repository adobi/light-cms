<?php
    defined('FOTO_UPLOAD_DIR') || define('FOTO_UPLOAD_DIR', 'uploads/');
    defined('THUMB_UPLOAD_DIR') || define('THUMB_UPLOAD_DIR', 'thumbs/');
    
    $validImageTypes = array('jpeg', 'jpg', 'png', 'gif');
    
    defined('IMAGE_WIDTH') || define('IMAGE_WIDTH', 600);
    defined('IMAGE_HEIGHT') || define('IMAGE_HEIGHT', 450);
    defined('THUMB_WIDTH') || define('THUMB_WIDTH', 150);
    defined('THUMB_HEIGHT') || define('THUMB_HEIGHT', 113);
    
?>