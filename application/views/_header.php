<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu">

	<head>
		
		<title>hello!</title>

		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

		<link rel="stylesheet" href="<?= BASE_URL ?>css/page.css?v=<?= time(); ?>" />
		<link rel="stylesheet" href="<?= BASE_URL ?>css/jquery.wysiwyg.css" />
		<link rel="stylesheet" href="<?= BASE_URL ?>css/uploadify.css" />
		<link rel="stylesheet" href="<?= BASE_URL ?>js/tipsy/stylesheets/tipsy.css" />
		<link rel="stylesheet" href="<?= BASE_URL ?>css/jquery-ui-1.8.4.custom.css" />
		
		
		<script type="text/javascript" charset="utf-8" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jquery.uploadify.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/tipsy/javascripts/jquery.tipsy.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jquery.editable.js"></script>
		<script type="text/javascript" charset="utf-8" src = "<?php echo BASE_URL ?>js/jquery-ui-1.8.4.custom.min.js"></script>
		
		
		<script type="text/javascript" charset="utf-8" src = "<?= BASE_URL ?>js/app.js?v=<?= time(); ?>"></script>
		<script type="text/javascript" charset="utf-8">
		    App.URL = '<?= BASE_URL ?>';
		</script>
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
                        
    			        <?php if ($controller === 'games') : ?>
    			            
    			            <?php require_once '_game_types.php'; ?>
    			            
    			        <?php endif; ?>
    			        
    			    <?php else : ?>
			            <li>
					        <a href = "<?= BASE_URL ?>login">Login</a>
			            </li>
    			    <?php endif; ?>
		        </ul>
			</div> <!-- sidebar -->
			
			<div id="content">