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
	    
        $autoloaderIterator = new DirectoryIterator(APPLICATION_PATH);
        
        foreach ($autoloaderIterator as $ai) {
            
            if (!$ai->isDot() && $ai->isDir() && $ai->getFilename() !== '' && in_array($ai->getFilename(), $_autoloader)) {
                
                //var_dump($ai->getFilename()); echo '<br />';
    	        $iterator = new DirectoryIterator(APPLICATION_PATH . DIRECTORY_SEPARATOR . $ai->getFilename() . DIRECTORY_SEPARATOR);
    	        
    	        foreach ($iterator as $file) {
    	            
    	            if (!$file->isDot() && $file->isFile() && $file->getFilename() !== 'autoload.php') {
    	                //var_dump($file->getFilename());echo '<br />';
    	                if ($file->getFilename() !== '')
    	                    //var_dump($ai->getFilename() . '/' . $file->getFilename());
    	                
    	                    require_once $ai->getFilename() . '/' . $file->getFilename();
    	                
    	                //echo '<br />';var_dump('_new file____________________________________________');echo '<br />';
    	            }
    	        }
            }
        }
        //die;
	    //foreach ($_autoloader as $directory) {
	        
	        /*
	            TODO check if $direcotry exists
	        */
	        
	        //var_dump('<br />_new dir____________________________________________<br />');
	    //}
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