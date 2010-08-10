<?php  

    Check::session();

    $pages = new Pages();
    $errors = array();
    
    $menus = new Menus();    
    $menusList = $menus->fetchAll('order');
    
    switch($action) {
        
        case '':
        case 'list':
            
            if ($param && $menus->find(intval($param))) {
                
                $pagesList = $pages->fetchAllByMenu(intval($param));
            } else {
                
                $pagesList = $pages->fetchAll();
            }
            break;
        case 'edit':
         
            $page = false;
            if ($param) {
                
                if (is_numeric($param)) {
                    
                    $page = $pages->find(intval($param));  
                } 
            }
            
            if ($_POST) {

                if (!empty($_POST['menu_id']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                    
                    $data = array();
                    $data['title'] = htmlspecialchars(Xss::clear($_POST['title']));
                    $data['content'] = htmlspecialchars(nl2br(Xss::clear($_POST['content'])));
                    $data['url'] = Sanitizer::sanitize_title_with_dashes($data['title']);
                    $data['menu_id'] = intval($_POST['menu_id']);
                    $data['created'] = now();
                    //dump($data); die;
                    if ($page) {
                        
                        $pages->update($data, intval($param));
                    } else {
                        
                        $pages->insert($data);                        
                    }
                    
                    Redirect::to(BASE_URL . 'pages');
                } else {
                    $errors[] = 'Minden mező kitöltése kötelező';
                }   
            }
            
            break;
        case 'delete':
            
            if (is_numeric($param)) {
                
                $page = $pages->find(intval($param));
                
                if ($page) {
                    $pages->delete(intval($param));
                }
                
                Redirect::to(BASE_URL . 'pages');
            }
        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }

?>