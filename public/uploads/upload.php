<?php
	require_once '../config.php';

	if (!empty($_FILES)) {
	
		if($_FILES['Filedata']) {
			
			$filename = date('Y.m.d') . '_' . time() . '_' . $_FILES['Filedata']['name'];
			
			$target = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder']  . $filename;
			$targetThumb = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . THUMB_UPLOAD_DIR . $filename;
			
			if(move_uploaded_file($_FILES['Filedata']['tmp_name'], $target)) {
				
				$attach = $filename;
				/*
				$image = new Image(FOTO_UPLOAD_DIR . $filename);
                $image->setDestinationFullPath(FOTO_UPLOAD_DIR . $filename);
                $image->resize(IMAGE_WIDTH, IMAGE_HEIGHT);
                
                $image = new Image(FOTO_UPLOAD_DIR .$filename);
                $image->setDestinationFullPath(THUMB_UPLOAD_DIR . $filename);
                $image->resize(THUMB_WIDTH, THUMB_HEIGHT); 
                */
				$image = new Image($target);
                $image->setDestinationFullPath($target);
                $image->resize(IMAGE_WIDTH, IMAGE_HEIGHT);
                
                $image = new Image($target);
                $image->setDestinationFullPath($targetThumb);
                $image->resize(THUMB_WIDTH, THUMB_HEIGHT); 
			}
			else {
				$attach = '';
			}
			
			if($attach != '') {
				
				//itt jon az h elvegezzuk a szukseges ab. muveleteket
				echo trim($attach);
			}
		}
	}
?>