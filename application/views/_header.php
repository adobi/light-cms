<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu">

	<head>
		
		<title>hello!</title>

		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

		<link rel="stylesheet" href="<?= BASE_URL ?>css/page.css?v=<?= time(); ?>" />
		<link rel="stylesheet" href="<?= BASE_URL ?>js/tipsy/stylesheets/tipsy.css" />
		<link rel="stylesheet" href="<?= BASE_URL ?>css/jquery-ui-1.8.4.custom.css" />
		<link rel="stylesheet" href="<?= BASE_URL ?>js/fancybox/jquery.fancybox-1.3.1.css" />
		<link rel="stylesheet" href="<?= BASE_URL ?>css/jScrollPane.css" />
		
		<!-- <script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script> -->
		
		<script type="text/javascript" charset="utf-8" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jquery-ui-1.8.4.custom.min.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/tipsy/javascripts/jquery.tipsy.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/fancybox/jquery.fancybox-1.3.1.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/fancybox/jquery.easing-1.3.pack.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jScrollPane.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jquery.mousewheel.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jcarousellite_1.0.1.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jscroller.js"></script>
		
		<script type="text/javascript" charset="utf-8" src = "<?= BASE_URL ?>js/app.js?v=<?= time(); ?>"></script>
		<script type="text/javascript" charset="utf-8">
		    App.URL = '<?= BASE_URL ?>';
		    
		   

		</script>
	</head>
	 
	<body>
		<div id="container">
			
            <div id = "header">
                <?php require_once '_public_menu.php'; ?>
			</div> <!-- header -->			
			
			<div id = "sidebar">
			    <?php require_once '_public_sidebar.php'; ?>
			</div> <!-- sidebar -->
			
			<div id="content" class="scroll-pane">
			    