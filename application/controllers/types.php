<?php  

    Check::session();

    $types = new Types();
    $errors = array();

    switch($action) {
        
        case '':
            $typesList = $types->fetchAll('order');
            break;
        case 'update':
        
            if ($_POST && $_POST['orders']) {
                
                $orders = $_POST['orders'];
                
                foreach ($orders as $index=>$item) {
                    $types->update(array('order'=>$index+1), intval($item));
                }
                
                exit;
            }   
            break;
        case 'edit':
         
            $type = false;
            if ($param) {
                
                if (is_numeric($param)) {
                    
                    $type = $types->find(intval($param));  
                } 
            }
            
            if ($_POST) {

                if (!empty($_POST['name'])) {
                    
                    $data = array();
                    
                    //dump($data); die;
                    if ($type) {
                        
                        $types->update($data, intval($param));
                    } else {
                        $data['name'] = Xss::clear($_POST['name']);
                        $data['url'] = Sanitizer::sanitize_title_with_dashes($data['name']);                        
                        $types->insert($data);                        
                    }
                    
                    Redirect::to(BASE_URL . 'types');
                } else {
                    $errors[] = 'Minden mező kitöltése kötelező';
                }   
            }
            
            break;
        case 'delete':
            
            if (is_numeric($param)) {
                
                $type = $types->find(intval($param));
                
                if ($type) {
                    $types->delete(intval($param));
                }
                
                Redirect::to(BASE_URL . 'types');
            }
        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }

?>