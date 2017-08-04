<?php 

    class EstacaoFactory {
        
        public static function createEstacaoFrom($rowRecord) {
            
            $estacao = new Estacao();
            
            $estacao->id = $rowRecord['id'];
            $estacao->serial = $rowRecord['serial'];
            $estacao->lat = $rowRecord['lat'];
            $estacao->lon = $rowRecord['lon'];
            $estacao->nome = $rowRecord['nome'];
            
            return $estacao;
        }
        
    }

?>