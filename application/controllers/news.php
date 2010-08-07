<?php  

    $news = new News();
    
    switch($action) {
        
        case '':
            $newsList = $news->fetchAll();
            break;
        case 'edit':
        
            if ($param) {
                if (is_numeric($param)) {
                    
                    $new = $news->find($param);
                }
            }
        
            break;
        case 'delete':
        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }