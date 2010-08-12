<?php  

    class Display {
        
        public static function errors($errors) 
        {
            
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
        
        public static function embed($video) 
        {
            return '<object width="440" height="255"> '.
                '<param name="movie" value="'.$video.'&amp;hl=hu_HU&amp;fs=1"></param>'.
                '<param name="allowFullScreen" value="true"></param> '.
                '<param name="allowscriptaccess" value="always"></param> '.
                '<embed src="'.$video.'&amp;hl=hu_HU&amp;fs=1" '.
                       'type="application/x-shockwave-flash" '.
                       'allowscriptaccess="always" '.
                       'allowfullscreen="true"'.
                       'width="440"'.
                       'height="255">'.
               '</embed>'.
            '</object>';
        } 
    }
?>