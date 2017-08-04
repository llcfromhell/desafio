<?php 

    include('app/controller/DadoController.php');

    $dadoController = new DadoController();
    $listaDados = $dadoController->listaDados();

    require 'app/view/DadoListView.php';

?>