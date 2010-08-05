<?php  

    class DbTable
    {
        
        private $_connection;
        private $_fetchMode = PDO::FETCH_ASSOC;
        
        protected $_config = array('host'=>HOST, 'dbname'=>DBNAME, 'username'=>USERNAME, 'password'=>PASSWORD);
        
        private static $_instance;
        private static $_instanceClassName = __CLASS__;
        
        protected $_name;
        protected $_primary;
        
        public static function getInstance() 
        {
            if(self::$_instance === null) {
                
                self::$_instance = new self::$_instanceClassName;
            }

            return self::$_instance;
        }
        
        public function __construct() 
        {
            $this->_connect();
        }
        
        
        public function setConfig($config) {
            
            if(!is_array($config)) {
                
                return false;
            }
            
            $this->_config = $config;
            
            $this->_connect();
            
        }
        
        public function _connect() 
        {
            
            try {
                $dns = 'mysql:dbname='.$this->_config['dbname'].';host='.$this->_config['host'];
                
                if($this->_connection === null) {
                    
                    $this->_connection = new PDO($dns, $this->_config['username'], $this->_config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES \'UTF8\''));
                }
            } catch(PDOException $e) {
                echo $e->getCode() . ': ' . $e->getMessage();
            }
        }
        
        public function query($sql) 
        {
            $this->_connect();
            
            return $this->_connection->query($sql, $this->_fetchMode);
        }
        
        public function find($id) 
        {

            if(!is_integer($id)) {
                
                return false;
            }

            $this->_connect();
            
            $sql = 'SELECT * FROM ' . $this->_name . ' WHERE ' . $this->_primary . '= :id';
            
            $stmt = $this->_connection->prepare($sql);
            
            $stmt->execute(array(':id'=>$id));
            
            $result = $stmt->fetchAll($this->_fetchMode);
            
            return !empty($result) ? current($result) : false;
        }
        
        public function fetchAll() 
        {
            //$this->_connect();
            
            $sql = 'SELECT * FROM ' . $this->_name . ' ORDER BY ' . $this->_primary . ' DESC';
            
            $stmt = $this->_connection->prepare($sql);
            
            $stmt->execute();
            
            $result = $stmt->fetchAll($this->_fetchMode);
            
            return !empty($result) ? $result : false;
        }
        
        public function insert($data) 
        {
            if(empty($data)) {
                
                return false;
            }
            
			$cols = array();
			$vals = array();
			foreach($data as $col => $val) {
				$cols[] = $this->_quote($col);
				$vals[] = $this->_connection->quote($val);
			}
			$sql = 'INSERT INTO ' . $this->_name . 
				' (' . implode(', ', $cols) . ') ' .
				' VALUES (' . implode(', ', $vals) . ' )';
				
			$stmt = $this->_connection->prepare($sql);
			$stmt->execute();
			
			$result = $stmt->rowCount();
			
			return $result;             
        }
        
        public function update($data, $id) 
        {
            
			if(!is_integer($id)) {
			    
			    return false;
			}
			
			$set = array();
			foreach($data as $col => $val) {
				$set[] = $this->_quote($col) . ' = ' . $this->_connection->quote($val);
			}
			
			$sql = 'UPDATE ' . $this->_name . 
				' SET '  . implode(', ', $set) .  
				' WHERE ' . $this->_primary . ' = :id';
			
			$stmt = $this->_connection->prepare($sql);
			
			
			return $stmt->execute(array(':id'=>$id));
        }
        
        public function delete($id) 
        {
            if(!is_integer($id)) {
                
                return false;
            }
            
            $sql = 'DELETE FROM ' . $this->_name . ' WHERE ' . $this->_primary . ' = :id';
            
            $stmt = $this->_connection->prepare($sql);
            
            return $stmt->execute(array(':id'=>$id));
        }

		protected function _quote($string) {
			return '`' . $string . '`';
		}        
    }
    


?>