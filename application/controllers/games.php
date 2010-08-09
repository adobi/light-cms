<?php  

    Check::session();

    $games = new Games();
    $gameTypes = new Types();
    
    $currentTypes = $gameTypes->fetchAll('order');
    
    $errors = array();

    switch($action) {
         
        case '':
            $gamesList = $games->fetchAll('order');
            break;
        case 'update':
        
            if ($_POST && $_POST['orders']) {
                
                $orders = $_POST['orders'];
                
                foreach ($orders as $index=>$item) {
                    $games->update(array('order'=>$index+1), intval($item));
                }
                
                exit;
            }
            break;
        case 'edit':
        
            $game = false;
            $gameScreenshots = false;
            if ($param) {
                
                if (is_numeric($param)) {
                    
                    $game = $games->find(intval($param));
                    $screenshots = new Screenshots();
                    
                    $gamesScreenshots = $screenshots->fetchAllByGame(intval($param));
                } 
            }
            
            if ($_POST) {
                //dump($_POST); die;
                if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['released']) && !empty($_POST['type_id'])) {
                    
                    $data = array();
                    $data['name'] = Xss::clear($_POST['name']);
                    $data['type_id'] = Xss::clear($_POST['type_id']);
                    $data['released'] = Xss::clear($_POST['released']);
                    $data['description'] = htmlspecialchars(nl2br(XSS::clear($_POST['description'])));
                    $data['url'] = Sanitizer::sanitize_title_with_dashes($data['name']);
                    
                    if ($_POST['logo']) {
                        $data['logo'] = trim($_POST['logo'][0]);
                    }
                    
                    if ($game) {
                        
                        $games->update($data, intval($param));
                    } else {
                        
                        
                        
                        $insertedId = $games->insert($data); 
                        //dump($insertedId); die;
                        if ($_POST['screenshots']) {
                            
                            $screenshots = new Screenshots();
                            foreach ($_POST['screenshots'] as $screenshot) {
                                
                                $screenshots->insert(array('game_id'=>$insertedId, 'path'=>trim($screenshot)));
                            }
                        }
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