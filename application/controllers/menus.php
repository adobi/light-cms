<?php  

    Check::session(); 

    $menus = new Menus();
    $errors = array();

    switch($action) {
        
        case '':
            $menusList = $menus->fetchAll('order');
            break;
        case 'update':
        
            if ($_POST && $_POST['orders']) {
                
                $orders = $_POST['orders'];
                
                foreach ($orders as $index=>$item) {
                    $menus->update(array('order'=>$index+1), intval($item));
                }
                
                exit;
            }    
        
            break;
        case 'edit':
        
            $menu = false;
            if ($param) {
                
                if (is_numeric($param)) {
                    
                    $menu = $menus->find(intval($param));
                } 
            }
            
            if ($_POST) {

                if (!empty($_POST['name'])) {
                    
                    $data = array();
                    $data['name'] = Xss::clear($_POST['name']);
                    $data['url'] = Sanitizer::sanitize_title_with_dashes($data['name']);
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