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
}