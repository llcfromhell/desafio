<?php
	//require_once("../view/cabecalho.php");
	require_once("../util/conecta.php");
    include("../dao/dados-estacoes-DAO.php");

    $id = $_POST['id'];
	$estacao = $_POST["estacao_id"];
	$temperatura = $_POST["temperatura"];
	$vento = $_POST["velocidadeVento"];
	$umidade = $_POST["umidade"];
	$data = $_POST["data"];

    if(alteraDados($conexao, $id, $estacao, $temperatura, $vento, $umidade, $data)){ ?>
        <p class="text-sucess"> Dados alterados com sucesso</p>

    <?php } else{
        ?>
        <p class="text-danger"> Dados nao alterados </p>
        <?php
    }
	    mysqli_close($conexao);
        header("Location: ../view/lista-dados-estacoes.php");
        die();
    ?>

 <?php //include("../view/rodape.php"); ?>