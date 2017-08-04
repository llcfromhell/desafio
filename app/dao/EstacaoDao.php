<?php 

    include('../util/conecta.php');
    include('../factory/EstacaoFactory.php');

    class EstacaoDao {
        
        public function listaEstacoes() {
            
            $estacoes = array();
            $query = "select * from estacoes";
            $resultado = mysqli_query($conexao, $query);
            
            while($estacaoRow = mysqli_fetch_assoc($resultado)){
                $estacao = EstacaoFactory::createEstacaoFrom($estacaoRow);
                array_push($estacoes, $estacao);
            }
            
            return $estacoes;
            
        }
        
    }

?>