<?

class EstacaoController() {
    
    private DadosDao dao;
    
    __construct() {
        dao = new DadosDao();
    }
    
    public function listaDados() {
        return dao.listaDados();
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