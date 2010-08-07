<?php  

    class Display {
        
        public static function errors($errors) {
            
            $html = '';
            
            if (is_array($errors) && !empty($errors)) {
                $html .= '<div id="errors">';
                foreach ($errors as $error) {
                    $html .= '<p>' . $error . '</p>';
                }
                $html .= '</div>';
            }
            
            return $html;
        }    
    }
?>