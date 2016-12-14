<?php
	require "../database/dbVeiculo.php";
	$veiculo = new dbVeiculo();

	$sOP = $_POST['sOP'];

	if($sOP == "Cadastro")
	{
		$placa = mb_strtoupper($_POST['placa']);
		$tipo = $_POST['tipo'];
		if($placa != null && $tipo != null)
		{
			$veiculo->cadastroVeiculo($placa, $tipo);
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Veiculos/cadastroVeiculo.php");
	} elseif($sOP == "Editar")
	{
		$id = $_POST['idVeiculo'];
		$placa = mb_strtoupper($_POST['placa']);
		$tipo = $_POST['tipoEditar'];
		if($id != null && $placa != null && $tipo != null)
		{
			$veiculo->alterarVeiculo($id, $placa, $tipo);
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Veiculos/cadastroVeiculo.php");
	} elseif($sOP == "Deletar")
	{
		$id = $_POST['idVeiculo'];
		if($id != null)
		{
			$veiculo->removerVeiculo($id);
		}
		header("location:/SimulacaoCelpa/view/Veiculos/cadastroVeiculo.php");
	}