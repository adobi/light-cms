<?php  
    $errors = array();
    
    $displaySidebar = false;
    
    if($_POST) {
        
        if(isset($_POST['username']) && $_POST['username'] === ADMIN_USERNAME && isset($_POST['password']) && md5($_POST['password']) === ADMIN_PASSWORD) {
            
            $_SESSION['UserId'] = 1;
            
            Redirect::to(BASE_URL . 'admin/');
        }
        else {
            
            $errors[] = "Invalid Username/Password";
        }
    } 
    
?>