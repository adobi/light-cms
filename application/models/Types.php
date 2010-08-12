<?php  

class Types extends Table 
{
    protected $_name = 'types';
    protected $_primary = 'id';
    
    public function delete($id) 
    {
        $type = $this->find($id);
        
        if ($type) {
            
            $games = new Games();
            
            $games->deleteByType($id);
            
            return parent::delete($id);
        }
        
        return false;
    }
    
    public function isType($str) 
    {

        $sql = 'SELECT * FROM ' . $this->_name . ' WHERE url = :str';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute(array(':str'=>$str));
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? current($result) : false;
            
    }
}