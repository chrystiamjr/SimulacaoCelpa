<?php
	require "../database/dbEquipamento.php";
	$equipamento = new dbEquipamento();

	$sOP = $_POST['sOP'];

	if($sOP == "Cadastro")
	{
		$descricao = mb_strtoupper($_POST['descricao']);
		$tipo = mb_strtoupper($_POST['tipo']);
		if($descricao != null && $tipo != null)
		{
			$equipamento->cadastroEquipamento($tipo, $descricao);
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Equipamentos/cadastroEquipamento.php");
	} elseif($sOP == "Editar")
	{
		$id = $_POST['idEquipamento'];
		$descricao = mb_strtoupper($_POST['descricao']);
		$tipo = mb_strtoupper($_POST['tipoEditar']);
		if($id != null && $descricao != null && $tipo != null)
		{
			$equipamento->alterarEquipamento($id, $tipo, $descricao);
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Equipamentos/cadastroEquipamento.php");
	} elseif($sOP == "Deletar")
	{
		$id = $_POST['idEquipamento'];
		if($id != null)
		{
			$equipamento->removerEquipamento($id);
		}
		header("location:/SimulacaoCelpa/view/Equipamentos/cadastroEquipamento.php");
	}