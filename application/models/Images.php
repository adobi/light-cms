<?php  

class Images extends Table 
{
    protected $_name = 'images';
    protected $_primary = 'id';
    
    public function fetchAllByPage($pageId) 
    {
        if (!is_integer($pageId)) {
            
            return false;
        }
        
        /*
            TODO letezik e ilyen game ezzel az id-vel
        */
        
        $sql = 'SELECT * FROM ' . $this->_name . ' WHERE page_id = :page_id';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute(array(':page_id'=>$pageId));
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? $result : false;        
    }

    
    public function delete($id) {
        
        $image = $this->find($id);
        
        if ($image) {
            
            @unlink(FOTO_UPLOAD_DIR . 'gallery/' . $image['path']);
            @unlink(FOTO_UPLOAD_DIR . 'gallery/' . THUMB_UPLOAD_DIR . $image['path']);
        }
        
        return parent::delete($id);
    }    
}