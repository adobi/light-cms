<?php
	require_once '../config.php';

	if (!empty($_FILES)) {
	
		if($_FILES['Filedata']) {
			
			$filename = date('Y.m.d') . '_' . time() . '_' . $_FILES['Filedata']['name'];
			
			$target = $_SERVER['DOCUMENT_ROOT'] . $_GET['folder'] . '/' . $filename;
			
			if(move_uploaded_file($_FILES['Filedata']['tmp_name'], $target)) {
				
				$attach = $filename;
			}
			else {
				$attach = '';
			}
			
			if($attach != '') {
				
				//itt jon az h elvegezzuk a szukseges ab. muveleteket
				echo $attach;
			}
		}
	}
?>