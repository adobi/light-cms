<?php

class Menus extends Table 
{
    protected $_name = "menus";
    protected $_primary = "id";

    public function findByUrl($url) 
    {
        $this->_connect();
        
        $sql = 'SELECT * FROM ' . $this->_name . ' WHERE url = :url';
        
        $stmt = $this->_connection->prepare($sql);
        
        $stmt->execute(array(':url'=>$url));
        
        $result = $stmt->fetchAll($this->_fetchMode);
        
        return !empty($result) ? current($result) : false;
    }
}