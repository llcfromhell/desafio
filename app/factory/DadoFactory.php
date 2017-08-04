<?php

    include('app/factory/iObjectFactory.php');
    include('app/model/Dado.php');

    class DadoFactory implements iObjectFactory {
        
        public function createObjectFrom($row) {
            
            $object = new Dado();
            
            $object->id = $row['id'];
            $object->estacao_id = $row['estacao_id'];
            $object->temperatura = $row['temperatura'];
            $object->velocidade_vento = $row['velocidade_vento'];
            $object->umidade = $row['umidade'];
            $object->data = $row['data'];
            
            return $object;
        }
        
    }

?>