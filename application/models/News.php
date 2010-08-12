<?php  

/**
* 
*/
class News extends Table
{
    protected $_name = 'news';
    protected $_primary = 'id';
    
    public function fetchAllByType($typeId)
    {
        $flag = false;
        if (is_null($typeId)) {
            
            // olyan hirek amik nem tartoznak tipushoz
            $flag = true;
        } else {
            if (!is_numeric($typeId)) {
                
                return false;
            }
        }
        
        if ($flag) {

            $sql  = 'SELECT * FROM ' . $this->_name . ' WHERE type_id IS NULL OR type_id = 0 ORDER BY created DESC';
        } else {
            
            $sql = 'SELECT * FROM ' . $this->_name . ' WHERE type_id = :type_id ORDER BY created DESC';
        }
        
        $stmt = $this->_connection->prepare($sql);
        
        if (!$flag) {
            
            $stmt->execute(array(':type_id'=>$typeId));    
        } else {
            
            $stmt->execute();
        }
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? $result : false;        
    }
}
