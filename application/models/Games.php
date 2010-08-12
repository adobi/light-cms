<?php  

class Games extends Table 
{
    protected $_name = "games";
    protected $_primary = "id";
    
    public function fetchAll($order = null) 
    {
        if (is_null($order)) {
            
            $order = $this->_primary;   
        }
        
        $sql = 'SELECT g.*, t.name as type_name FROM ' . $this->_name . ' g LEFT JOIN types t ON g.type_id = t.id  ORDER BY `' . $order . '` ASC';

        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute();
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? $result : false;        
    }
    
    public function findByUrl($url) 
    {

        $sql = 'SELECT * FROM ' . $this->_name . ' WHERE url = :url';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute(array(':url'=>$url));
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? current($result) : false;
    }
    
    public function fetchAllByType($typeId)
    {
        if (!is_numeric($typeId)) {
            
            return false;
        }
        
        $sql = 'SELECT g.*, t.name as type_name FROM ' . $this->_name . ' g LEFT JOIN types t ON g.type_id = t.id  WHERE g.type_id = :type_id ORDER BY `order`';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute(array(':type_id'=>$typeId));
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? $result : false;               
    }
    
    public function delete($id) 
    {
        if (!is_numeric($id)) {
            
            return false;
        }
        
        $game = $this->find(intval($id));

        if ($game) {
            
            if ($game['logo']) {
                @unlink(FOTO_UPLOAD_DIR . 'games/' . $game['logo']);
                @unlink(FOTO_UPLOAD_DIR . 'games/' . THUMB_UPLOAD_DIR . $game['logo']);
            }
            
            $screenshots = new Screenshots();
            
            $screens = $screenshots->fetchAllByGame(intval($id));
            
            if ($screens) {
                
                foreach ($screens as $shot) {
                    
                    @unlink(FOTO_UPLOAD_DIR . 'games/' . $shot['path']);
                    @unlink(FOTO_UPLOAD_DIR . 'games/' . THUMB_UPLOAD_DIR . $shot['path']);
                }
                
                $screenshots->deleteByGame(intval($id));
            }
            
            return parent::delete(intval($id));
        }
        
        return false;        
    }
    
    public function deleteByType($typeId)
    {
        if (!is_numeric($typeId)) {
            
            return false;
        }
        
        /*
            TODO torolni a az osszes olyan jatekot aminek a tipusa a $typeId, majd torolni a jatekokat
        */
        
        $gamesByTypes = $this->fetchAllByType($typeId);
        
        if ($gamesByTypes) {
            
            foreach ($gamesByTypes as $game) {
                
                $this->delete($game['id']);
            }
            
            return true;
        }
        
        return false;
    }
    
    public function deleteLogo($id) 
    {
        $game = $this->find($id);
        
        if ($game) {
            
            @unlink(FOTO_UPLOAD_DIR . 'games/' . $game['logo']);
            @unlink(FOTO_UPLOAD_DIR . 'games/' . THUMB_UPLOAD_DIR . $game['logo']);
            
            return parent::update(array('logo', ''), $id);
        }
        
        return false;
    }
}