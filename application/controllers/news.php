<?php  

    Check::session();

    $news = new News();
    $errors = array();
    
    switch($action) {
        
        case '':
            $newsList = $news->fetchAll();
            break;
        case 'edit':
        
            $buzz = false;
            if ($param) {
                
                if (is_numeric($param)) {
                    
                    $buzz = $news->find(intval($param));  
                } 
            }
            
            if ($_POST) {

                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    
                    $data = array();
                    $data['title'] = htmlspecialchars(XSS::clear($_POST['title']));
                    $data['content'] = htmlspecialchars(nl2br(XSS::clear($_POST['content'])));
                    $data['url'] = Sanitizer::sanitize_title_with_dashes($data['title']);
                    $data['created'] = now();
                    
                    if ($buzz) {
                        
                        $news->update($data, intval($param));
                    } else {
                        
                        $news->insert($data);                        
                    }
                    
                    Redirect::to(BASE_URL . 'news');
                } else {
                    $errors[] = 'Minden mező kitöltése kötelező';
                }   
            }
            
            break;
        case 'delete':
            
            if (is_numeric($param)) {
                
                $buzz = $news->find(intval($param));
                
                if ($buzz) {
                    $news->delete(intval($param));
                }
                
                Redirect::to(BASE_URL . 'news');
            }
        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }