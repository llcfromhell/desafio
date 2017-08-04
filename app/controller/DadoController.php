<?php

include('app/dao/DadoDao.php');

class DadoController {
    
    private $dao;
    
    public function __construct() {
        $this->dao = new DadoDao();
    }
    
    public function listaDados() {
        $dados = $this->dao->getObjectListFromClass(new ReflectionClass(Dado::class));
        return $dados;
    }
    
    public function persisteDado($dado) {
        return dao.persisteDado($dado);
    }
    
    public function removeDado($dado) {
        return dao.removeDado($dado);
    }
    
    public function buscaDado($dado) {
        return dao.buscaDado($dado);
    }
    
}

?>