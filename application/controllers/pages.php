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
                
                $pagesList = $pages->fetchAll('created');
            }
            break;
            
        case 'delete-image':
            
            if ($_POST && $_POST['id']) {
                
                $images = new Images();
                
                $images->delete(intval($_POST['id']));
                
                echo 'ok';
            }
        
            exit;
            break;
        case 'delete-video':
            
            if ($_POST && $_POST['id']) {
                
                $videos = new Videos();
                
                $videos->delete(intval($_POST['id']));
                
                echo 'ok';
            }
        
            exit;
        
            break;
        case 'edit':
         
            $page = false;
            $pageImages = false; $pageVideos = false;
            if ($param && is_numeric($param)) {
                
                $page = $pages->find(intval($param));  
                
                $images = new Images();
                
                $pageImages = $images->fetchAllByPage(intval($param));
                
                $videos = new Videos();
                
                $pageVideos = $videos->fetchAllByPage(intval($param));
            }
            
            if ($_POST) {
                
                if (!empty($_POST['menu_id']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                    
                    $data = array();
                    $data['title'] = htmlspecialchars(Xss::clear($_POST['title']));
                    $data['content'] = htmlspecialchars(nl2br(Xss::clear($_POST['content'])));
                    $data['url'] = Sanitizer::sanitize_title_with_dashes($data['title']);
                    $data['menu_id'] = intval($_POST['menu_id']);
                    $data['created'] = now();
                    
                    $pageId = false;
                    if ($page) {
                        
                        $pages->update($data, intval($param));
                        $pageId = intval($param);
                    } else {
                        
                        $pageId = $pages->insert($data);                        
                    }
                    
                    if ($pageId) {
                        
                        if ($_POST['pictures']) {
                            
                            $images = new Images();
                            
                            foreach ($_POST['pictures'] as $picture) {
                                
                                $data = array();
                                $data['path'] = trim($picture);
                                $data['page_id'] = $pageId;
                                
                                $images->insert($data);
                            }
                        }
                        
                        if ($_POST['videos']) {
                            
                            $videos = new Videos();
                            
                            foreach ($_POST['videos'] as $video) {
                                $video = trim($video);
                                
                                if ($video) {
                                    $data = array();
                                    $data['path'] = trim($video);
                                    $data['page_id'] = $pageId;
                                    
                                    $videos->insert($data);
                                }
                            }
                        }
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