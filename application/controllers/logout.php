<?php  

    if(isset($_SESSION['UserId'])) {
        
        unset($_SESSION['UserId']);
                
        Redirect::to(BASE_URL);
    }

?>