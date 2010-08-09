<?php  
    
    Check::session();
    
    $settings = new Settings();
    $errors = array();
    
    switch($action) {
        
        case '':
             
            $allSettings = $settings->fetchAll();
            
            //dump($allSettings);
            break;
        case 'edit':
            
            if ($_POST) {
                
                if ($_POST['id']) {
                    
                    echo json_encode(array('response'=>$settings->update(array($_POST['key']=>$_POST['value']), intval($_POST['id']))));
                    exit;
                }
                
                if (!empty($_POST['name']) && !empty($_POST['value'])) {
                    
                    $data = array();
                    $data['name'] = Xss::clear($_POST['name']);
                    $data['value'] = Xss::clear($_POST['value']);
                    
                    $settings->insert($data);
                    
                    Redirect::to(BASE_URL . 'settings/');
                    
                } else {
                    $errors[] = 'Minden mező kitöltése kötelező';
                }
            }
        
            break;
        case 'delete':
            if (is_numeric($param)) {
                
                $setting = $settings->find(intval($param));
                
                if ($setting) {

                    $settings->delete(intval($param));
                }
                
                Redirect::to(BASE_URL . 'settings');
            }
        
            break;        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }

?>