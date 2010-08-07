<?php  

    class Image 
    {
        
        private $_sourceFullPath;
        private $_destinationFullPath;
        
        private $_imageType;
        
        private $_sourceImage;
        private $_destinationImage;
        
        private $_sourceWidth;
        private $_sourceHeight;
        
        public function __construct($sourceFullPath) 
        {
            $this->_sourceFullPath = str_replace("\\", "/", $sourceFullPath);
            
            $this->_getSize();
            
            $this->_imageType = strtolower(@end(explode('.', $this->_sourceFullPath)));
            
            $this->_sourceImage = $this->_create($this->_sourceFullPath);

        }
        
        public function setDestinationFullPath($destinationFullPath) 
        {
            $this->_destinationFullPath = $destinationFullPath;
        }
        
        public function resize($newWidth, $newHeight) 
        {

            if($this->_sourceHeight > $this->_sourceWidth) {
                
                $newWidth = $this->_sourceWidth;
            }

            if(function_exists('imagecreatetruecolor')) {
                $create	= 'imagecreatetruecolor';
    			$copy	= 'imagecopyresampled';
    		}
    		else {
    			$create	= 'imagecreate';
    			$copy	= 'imagecopyresized';
    		} 
            
    		$this->_destinationImage = $create($newWidth, $newHeight);
    		$copy($this->_destinationImage, $this->_sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $this->_sourceWidth, $this->_sourceHeight);
    		
    		$this->_save($this->_destinationImage, $this->_destinationFullPath);
            
    		$this->_destroy($this->_destinationImage);
    		$this->_destroy($this->_sourceImage);            		            
        }
        
        private function _getSize() 
        {
            list($this->_sourceWidth, $this->_sourceHeight) = getimagesize($this->_sourceFullPath);
        }
        
        private function _create($path) 
        {
            switch($this->_imageType) {
                
                case 'gif':
                    
                    if(function_exists('imagecreatefromgif')) {
                        
                        return imagecreatefromgif($path);
                    }
                    break;
                case 'png':
                    
                    if(function_exists('imagecreatefrompng')) {
                        
                        return imagecreatefrompng($path);
                    }
                    break;
                case 'jpg':
                case 'jpeg':
                    
                    if(function_exists('imagecreatefromjpeg')) {
                        
                        return imagecreatefromjpeg($path);
                    }
                    break;
            }
        }
        
        private function _destroy($res) 
        {
            imagedestroy($res);
        }
        
        private function _save($res) 
        {
            switch($this->_imageType) {
                
                case 'gif':
                    
                    if(function_exists('imagegif')) {
                        
                        return @imagegif($res, $this->_destinationFullPath);
                    }
                    break;
                case 'png':
                    
                    if(function_exists('imagepng')) {
                        
                        return @imagepng($res, $this->_destinationFullPath);
                    }
                    break;
                case 'jpg':
                case 'jpeg':
                    
                    if(function_exists('imagejpeg')) {
                        
                        return @imagejpeg($res, $this->_destinationFullPath);
                    }
                    
                    break;
            }            
        }
    }

?>