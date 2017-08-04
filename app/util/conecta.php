<?php

    class DB {
        
        private $conexao;
        
        public static function getConnection()
        {
            static $conexao = null;
            if (null === $conexao) {
                $conexao = new static();
                
            return $conexao;
        }

        
    }

        
    }

    $conexao = mysqli_connect("localhost", "llcfromhell", "", "atividade");
    
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    /* change character set to utf8 */
    if (!$conexao->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $conexao->error);
        exit();
    }

?>