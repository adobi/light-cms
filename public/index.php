<?php  
    
    error_reporting(E_ALL|E_STRICT);
 	ini_set('display_errors', 'on');

	header('Content-Type: text/html; charset=UTF-8');
	session_start();    

    require_once 'config.php';
    require_once 'config/autoload.php';
    //require_once 'config/database.php';
    //require_once 'config/fileupload.php';
	//require_once 'utils/Redirect.php';

	//require_once '../core/DbTable.php';

	//require_once 'helpers/Display.php';
	
	if (!empty($_autoloader)) {
	    
	    foreach ($_autoloader as $directory) {
	        
	        /*
	            TODO check if $direcotry exists
	        */
	        
	        $iterator = new DirectoryIterator(APPLICATION_PATH . DIRECTORY_SEPARATOR . $directory);
	        
	        foreach ($iterator as $file) {
	            
	            if (!$file->isDot()) {
	                require_once $directory . '/' . $file;
	            }
	        }
	    }
	}

	$flag = 0;

	if(!empty($controller) && file_exists(APPLICATION_PATH . DIRECTORY_SEPARATOR . 
	                                      'controllers' . DIRECTORY_SEPARATOR . 
	                                      $controller . '.php')) {
        
	    require_once 'controllers/' . $controller . '.php';
	    $flag = 1;
	}
	else {
	    
	    if(empty($controller)) {
	        
	        require_once 'controllers/home.php';
	        $flag = 1;
	    }
	    else {
	        $flag = 0;
	    }
	}
	
	if(!$flag) {
	    
	    Redirect::to(BASE_URL . '404/');
	}
	
    if(empty($controller)) {
        
        /*
            TODO admin index or public index
        */
        
        $_template =  'views/login/index.php';
        
    } elseif (is_dir(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $controller) ) {
        
        
        if (isset($action) && !empty($action)) {
            
            if (file_exists(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action . '.php')) {
                
                $_template =  $controller . '/' . $action . '.php';    
                
            } else {
                //Redirect::to(BASE_URL . '404/');
                $_template = '404/index.php';
            }
            
        } else {
            $_template =  $controller . '/index.php';
        }
    
    } else {
        //Redirect::to(BASE_URL . '404/');
        $_template = '404/index.php';
    }
    
    if (!empty($_template)) {
        
        require_once 'views/_layout.php';
    } else {
        
        
    }
?>