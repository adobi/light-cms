<?php  

    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

    set_include_path(implode(
        PATH_SEPARATOR, 
        array( 
            realpath(APPLICATION_PATH . '/utils'), 
            realpath(APPLICATION_PATH . '/models'), 
            realpath(APPLICATION_PATH . '/helpers'), 
            realpath(APPLICATION_PATH . '/config'), 
            realpath(APPLICATION_PATH . '/core'), 
            realpath(APPLICATION_PATH),
            get_include_path()
        )
    ));

    if(isset($_SERVER['SCRIPT_NAME'])) {
		
		define("_APP_MAIN_DIR", rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));
	}
	
	if(isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT'])) {
		
		if($_SERVER['SERVER_PORT'] == 80) {
			
			define("BASE_URL", "http://{$_SERVER['HTTP_HOST']}"._APP_MAIN_DIR."/");
		}
		else {
			define("BASE_URL", "http://{$_SERVER['HTTP_HOST']}:{$_SERVER['SERVER_PORT']}"._APP_MAIN_DIR."/");
		}
	}
	
    require_once 'config/autoload.php';
	
	if (!empty($_autoloader)) {
	    
        $autoloaderIterator = new DirectoryIterator(APPLICATION_PATH);
        
        foreach ($autoloaderIterator as $ai) {
            
            if (!$ai->isDot() && $ai->isDir() && $ai->getFilename() !== '' && in_array($ai->getFilename(), $_autoloader)) {
                
    	        $iterator = new DirectoryIterator(APPLICATION_PATH . DIRECTORY_SEPARATOR . $ai->getFilename() . DIRECTORY_SEPARATOR);
    	        
    	        foreach ($iterator as $file) {
    	            
    	            if (!$file->isDot() && $file->isFile() && $file->getFilename() !== 'autoload.php') {
    	                if ($file->getFilename() !== '') {

    	                    require_once $ai->getFilename() . '/' . $file->getFilename();
    	                }
    	            }
    	        }
            }
        }
	}	
	
    $_app_info['params'] = array();
	$_url = str_replace(_APP_MAIN_DIR, '', $_SERVER['REQUEST_URI']);
	$_tmp = explode("?", $_url);
	$_url = $_tmp[0];
	
	if($_url = explode("/", $_url)) {
		
		foreach($_url as $tag) {
			
			if($tag) {
				
				$_app_info['params'][] = $tag;
			}
		}
	}

	$controller = (isset($_app_info['params'][0]) ? $_app_info['params'][0] : '');
	$action = (isset($_app_info['params'][1]) ? $_app_info['params'][1] : 0);
	$param = (isset($_app_info['params'][2]) ? $_app_info['params'][2] : '');
    

?>