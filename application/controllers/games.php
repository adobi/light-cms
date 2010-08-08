<?php  

    Check::session();

    $games = new Games();
    $errors = array();

    switch($action) {
        
        case '':
            $gamesList = $games->fetchAll();
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
                    
                    if ($game) {
                        
                        $games->update($data, intval($param));
                    } else {
                        
                        $games->insert($data);                        
                    }
                    
                    Redirect::to(BASE_URL . 'games');
                } else {
                    $errors[] = 'Minden mező kitöltése kötelező';
                }   
            }
            
            break;
        case 'delete':
            
            if (is_numeric($param)) {
                
                $game = $games->find(intval($param));
                
                if ($game) {
                    $games->delete(intval($param));
                }
                
                Redirect::to(BASE_URL . 'games');
            }
        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }

?>