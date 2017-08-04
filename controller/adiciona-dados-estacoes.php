<?php 
	//require_once("../view/cabecalho.php");
	require_once("../util/conecta.php");
    include("../dao/dados-estacoes-DAO.php");

    $estacao = $_POST["estacao_id"];
	$temperatura = $_POST["temperatura"];
	$vento = $_POST["velocidadeVento"];
	$umidade = $_POST["umidade"];
	$data = $_POST["data"];

    if(insereDados($conexao, $estacao, $temperatura, $vento, $umidade, $data)){ ?>
        <p class="text-sucess"> Dados adicionados com sucesso</p>

    <?php } else{
        ?>
        <p class="text-danger"> Dados nao adicionados </p>
    <?php
        }
	    mysqli_close($conexao);
        header("Location: ../view/formulario-dados-estacoes.php");
        die();
    ?>

 <?php //include("../view/rodape.php"); ?>