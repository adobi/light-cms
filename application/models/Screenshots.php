<?php  

class Screenshots extends Table
{
    protected $_name = "screenshots";
    protected $_primary = "id";
    
    public function fetchAllByGame($gameId) 
    {
        if (!is_integer($gameId)) {
            
            return false;
        }
        
        /*
            TODO letezik e ilyen game ezzel az id-vel
        */
        
        $sql = 'SELECT * FROM ' . $this->_name . ' WHERE game_id = :game_id';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute(array(':game_id'=>$gameId));
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? $result : false;
    }
    
    public function deleteByGame($gameId) 
    {
        if(!is_integer($gameId)) {
            
            return false;
        }
        
        $sql = 'DELETE FROM ' . $this->_name . ' WHERE game_id = :game_id';
        
        $stmt = $this->_connection->prepare($sql);
        
        return $stmt->execute(array(':game_id'=>$gameId));    
    }
    
    public function delete($id) {
        
        $screenshot = $this->find($id);
        
        if ($screenshot) {
            
            @unlink(FOTO_UPLOAD_DIR . 'games/' . $screenshot['path']);
            @unlink(FOTO_UPLOAD_DIR . 'games/' . THUMB_UPLOAD_DIR . $screenshot['path']);
        }
        
        return parent::delete($id);
    }
}