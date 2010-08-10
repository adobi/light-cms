<?php 

class Pages extends Table
{
    protected $_name = "pages";
    protected $_primary = "id";
    
    
    public function fetchAll($order = null)
    {
        $sql = 'SELECT p.*, m.name FROM ' . $this->_name . ' p LEFT JOIN menus m ON p.menu_id = m.id';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute();
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? $result : false;
    }    
    
    public function fetchAllByMenu($menuId)
    {
        if (!is_numeric($menuId)) {
            
            return false;
        }
        
        $sql = 'SELECT p.*, m.name FROM ' . $this->_name . ' p LEFT JOIN menus m ON p.menu_id = m.id WHERE menu_id = :menu_id';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute(array(':menu_id'=>$menuId));
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? $result : false;
    }
}