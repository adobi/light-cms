<?php  
    
    error_reporting(E_ALL|E_STRICT);
 	ini_set('display_errors', 'on');

	header('Content-Type: text/html; charset=UTF-8');
	session_start();    

    require_once 'config.php';

	$flag = 0;

	if(!empty($controller) && file_exists(APPLICATION_PATH . DIRECTORY_SEPARATOR . 
	                                      'controllers' . DIRECTORY_SEPARATOR . 
	                                      $controller . '.php')) {
        
	    require_once 'controllers/' . $controller . '.php';
	    $flag = 1;
	}
	else {
	    
	    if(empty($controller)) {
	        
	        require_once 'controllers/login.php';
	        $flag = 1;
	    }
	    else {
	        $flag = 0;
	    }
	}
	
	if(!$flag) {
	    
	    Redirect::to(BASE_URL . '404/');
	}
	
	$_template = null;
    if(empty($controller)) {
        
        /*
            TODO admin index or public index
        */
        
        $_template =  'login/index.php';
        
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
        //echo $_template;
        require_once 'views/_layout.php';
    } else {
        
        
    }
?>