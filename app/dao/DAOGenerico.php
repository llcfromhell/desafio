<?php 

    abstract class DAOGenerico {
        
        protected $_objectFactory;
        protected $connection;
        
        public function __construct(){
            
            $this->connection = mysqli_connect("localhost", "llcfromhell", "", "atividade");
            
            /* check connection */
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            
            /* change character set to utf8 */
            if (!$this->connection->set_charset("utf8")) {
                printf("Error loading character set utf8: %s\n", $this->connection->error);
                exit();
            }
        }
        
        public function __destruct() {
            $connection->close();
        }
        
        public function getObjectListFromClass($class) {
            
            $query = " select * from {$class->getConstant('tabela')} ";
            
            $list = array();
            $resultado = mysqli_query($this->connection, $query);
            
            while($row = mysqli_fetch_assoc($resultado)){
                $object = $this->_objectFactory->createObjectFrom($row);
                array_push($list, $object);
            }
            
            return $list;
            
        }
        
        public function persistObject($object) {
            $query = getPersistenceQuery($query);
            return mysqli_query($this->connection, $query);
        }
        
        private function getPersistenceQuery($object) {
            if ($object->id == null) {
                return getInsertQuery($object);
            } else {
                return getUpdateQuery($object);
            }
        }
        
        private function getUpdateQuery($object) {
            
            $tabela = $this->getTableFrom($object);
            $props = $classeRefletida->getProperties();
            
            $query = "update {$tabela} set ";
            
            foreach ($props as $prop) {
                $query += " {$prop->getName()} = {$prop->getValue()} ";
                $query += ($prop !== end($props)) ?  " , " : " ";
            }
            
            $query += " where id = {$object->id} ";
        }
        
        private function getInsertQuery($object) {
            
            $tabela = $this->getTableFrom($object);
            $props = $classeRefletida->getProperties();
            
            $query = " insert into {$tabela} ( ";

            foreach ($props as $prop) {
                $query += $prop->getName();
                $query += ($prop !== end($props)) ?  " , " : " ";
            }
            
            $query +=" ) values ( ";
            
            foreach ($props as $prop) {
                $query += $prop->getName();
                $query += ($prop !== end($props)) ?  " , " : " ";
            }
            
            $query += ' ) ';
        }
        
        private function getTableFrom($object) {
            return get_class($object)->getConstant('tabela');
        }
        
        public function removeObject($object) {
            $tabela = $this->getTableFrom($object);
            $query = "delete from {$tabela} where id = {$object->id}";
            return mysqli_query($this->connection, $query);
        }
        
        public function findObject($object) {
            $tabela = $this->getTableFrom($object);
            $query = "select * from {$tabela} where id = {$object->id}";
            return mysqli_query($this->connection, $query);
        }
        
        protected function _getObjectListFromQuery($query) {
            
            $list = array();
            $resultado = mysqli_query($this->connection, $query);
            
            while($row = mysqli_fetch_assoc($resultado)){
                $object = $this->objectFactory->createObjectFrom($row);
                array_push($list, $object);
            }
            
        }
        
    }

?>