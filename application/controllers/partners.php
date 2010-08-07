<?php  

    Check::session();

    $partners = new partners();
    $errors = array();
    
    switch($action) {
        
        case '':
            $partnersList = $partners->fetchAll();
            break;
        case 'upload':
            // bugos meg, egyenlore nem hasznaljuk
            /*
        	if (!empty($_FILES)) {
        	
        		if($_FILES['Filedata']) {
        			
        			$filename = date('Y.m.d') . '_' . time() . '_' . $_FILES['Filedata']['name'];
        			
        			$target = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/' . $filename;
        			
        			if(move_uploaded_file($_FILES['Filedata']['tmp_name'], $target)) {
        				
        				$attach = $filename;
        			}
        			else {
        				$attach = '';
        			}
        			
        			if($attach != '') {
        				
        				//itt jon az h elvegezzuk a szukseges ab. muveleteket
        				echo $attach;
        			}
        		}
        	}
        	die;
            */
            break;
        case 'edit':
            
            $partner = false;
            if ($param) {
                
                if (is_numeric($param)) {
                    
                    $partner = $partners->find(intval($param));  
                } 
            }
            
            if ($_POST) {
                //dump($_POST); die;
                if (!empty($_POST['name']) && !empty($_POST['url'])) {
                    
                    $data = array();
                    $data['name'] = htmlspecialchars(XSS::clear($_POST['name']));
                    $data['url'] = htmlspecialchars(nl2br(XSS::clear($_POST['url'])));
                    $data['logo'] = $_POST['filenames'][0];
                    
                    if ($partner) {
                        
                        $partners->update($data, intval($param));
                    } else {
                        
                        $partners->insert($data);                        
                    }
                    
                    Redirect::to(BASE_URL . 'partners');
                } else {
                    $errors[] = 'Minden mező kitöltése kötelező';
                }   
            }
            
            break;
        case 'delete':
            
            if (is_numeric($param)) {
                
                $buzz = $partners->find(intval($param));
                
                if ($buzz) {
                    $partners->delete(intval($param));
                }
                
                Redirect::to(BASE_URL . 'news');
            }
        
            break;
        default:
            Redirect::to(BASE_URL . '404');
    }