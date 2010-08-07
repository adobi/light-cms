<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu">

	<head>
		
		<title>hello!</title>

		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

		<link rel="stylesheet" href="<?= BASE_URL ?>css/page.css" />
		<script type="text/javascript" charset="utf-8" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?= BASE_URL ?>js/app.js"></script>
	</head>
	
	<body>
		<div id="container">
			
            <div id = "header">
    		    <?php if(isset($_SESSION['UserId'])) : ?>
                    <?php require_once '_admin_menu.php'; ?>
    			<?php endif; ?>    
			</div> <!-- header -->			
			
			<div id = "sidebar">
		        <ul>
    			    <?php if(isset($_SESSION['UserId'])) : ?>

    			    <?php else : ?>
			            <li>
					        <a href = "<?= BASE_URL ?>login">Login</a>
			            </li>
    			    <?php endif; ?>
		        </ul>
			</div> <!-- sidebar -->
			
			<div id="content">