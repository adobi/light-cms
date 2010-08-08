<?php  

    Check::session();

    $menus = new Menus();
    $errors = array();

    switch($action) {
        
        case '':
            $menusList = $menus->fetchAll();
            break;
        case 'edit':
        
            $page = false;
            if ($param) {
                
                if (is_numeric($param)) {
                    
                    
                } 
            }
            
            if ($_POST) {

                if (!empty($_POST)) {
                    
                    $data = array();
                    
                    if ($menu) {
                        
                        $menus->update($data, intval($param));
                    } else {
                        
                        $menus->insert($data);                        
                    }
                    
                    Redirect::to(BASE_URL . 'menus');
                } else {
                    $errors[] = 'Minden mező kitöltése kötelező';
                }   
            }
            
            break;
        case 'delete':
            
            if (is_numeric($param)) {
                
                $menu = $menus->find(intval($param));
                
                if ($menu) {
                    $menus->delete(intval($param));
                }
                
                Redirect::to(BASE_URL . 'menus');
            }
        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }

?>