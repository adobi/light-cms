<?php 

/**
* 
*/
class Check
{
    public static function Session() {
        
        if (!$_SESSION['UserId']) {
            
            Redirect::to(BASE_URL . '404');
        }
    }
}
