<?php  
    
    $menus = new Menus();
    
    $mainMenus = $menus->fetchAll('order');
    
    $currentPage = $menus->findByUrl($controller);
    
    $pages = new Pages();
    $images = new Images();
    $videos = new Videos();
    
    $_page = false;
    
    $_pages = false;
    
    $displaySidebar = false;
    
    switch ($controller) {
        
        case 'home':
            $_page = 'index.php';
            break;
        case 'company':
            $_pages = $pages->fetchAllByMenu($currentPage['id']);
            $_page = 'company.php';
            break;
        case 'games':
            $displaySidebar = true;
            $types = new Types();
            
            $typesList = $types->fetchAll('order');
            
            $games = new Games();
            
            $gamesList = false; $currentGame = false;
            
            if ($currentType = $types->isType($action)) {
                
                $gamesList = $games->fetchAllByType(intval($currentType['id']));
            } else {
                
                $gamesList = $games->fetchAll();        
            }
            
            if ($param) {
                
                $currentGame = $games->findByUrl($param);
                
                if ($currentGame) {
                    
                    $screenshots = new Screenshots();
                    $gameVideos = new GameVideos();
                    
                    $currentGameScreenshots = $screenshots->fetchAllByGame(intval($currentGame['id']));
                    
                    $currentGameVideos = $gameVideos->fetchAllByGame(intval($currentGame['id']));
                }
            }
        
            $_page = 'games.php';
            break;
        case 'partners':
            
            $_page = 'partners.php';
            break;
        case 'downloads':
        
        
            $_page = 'downloads.php';
            break;
        case 'design-concept':
        
            $_pages = $pages->fetchAllByMenu($currentPage['id']);
            
            $_page = 'design_concept.php';
            break;
        case 'jobs':
        
            $_page = 'work.php';
            break;
        case 'contact':
        
            $_page = 'contact.php';        
            break;
        default:
            $_page = 'index.php';
    }
    
?> 