<?php

	class Redirect {
		
		public static function to($_url) {
			
			header('Location: ' . $_url);
			exit;
		}
	}

?>