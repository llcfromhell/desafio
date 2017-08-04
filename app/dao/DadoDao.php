<?php 

    include('app/factory/DadoFactory.php');
    include('app/dao/DAOGenerico.php');

    class DadoDao extends DAOGenerico {

        public function __construct() {
            parent::__construct();
            $this->_objectFactory = new DadoFactory();
        }
        
    }

?>