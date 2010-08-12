<?php  

/**
 * kiserleti verzio, meg nincs hasznalva sehol
 *
 * @package default
 * @author Dobi Attila
 */
class App 
{
    private static $_controller;
    private static $_action;
    private static $_param;
    private static $_isPublic;
    
    public static function run($controller, $action, $param)
    {
        self::$_controller = $controller;
        self::$_action = $action;
        self::$_param = $param;
        
        if ($_SESSION && array_key_exists('UserId', $_SESSION) && $_SESSION['UserId']) {
            
            //self::bootstrapAdmin();
            self::$_isPublic = false;
        } else {
            
            //self::bootstrapPublic();
            
            self::$_isPublic = true;
        }
        
        self::bootstrap();
    }
    
    private static function bootstrap() 
    {
        $controller = self::$_controller;
        $action = self::$_action;
        
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
            
            $_template =  'home/index.php';
            
        } elseif (is_dir(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $controller) ) {
            
            
            if (isset($action) && !empty($action)) {
                
                if (file_exists(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $controller . DIRECTORY_SEPARATOR . $action . '.php')) {
                    
                    $_template =  $controller . '/' . $action . '.php';    
                    
                } else {
                    
                    if ($action === 'list') {
                        
                        $_template = $controller . '/index.php';
                    } else {
                        
                        $_template = '404/index.php';
                    }
                }
                
            } else {
                $_template =  $controller . '/index.php';
            }
        
        } else {
            
            $_template = '404/index.php';
        }
        
        if (!empty($_template)) {
            
            if (self::$_isPublic) {
                
                require_once 'views/_layout.php';
            } else {
                
                require_once 'views/_layout_admin.php';
            }
            
            
        } else {
            
            
        }        
    }
}