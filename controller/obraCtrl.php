<?php
	require "../database/dbObra.php";
	$obra = new dbObra();

	$sOP = $_POST['sOP'];

	if($sOP == "Cadastro")
	{
		$descricao = mb_strtoupper($_POST['descricao']);
		$sigla = mb_strtoupper($_POST['sigla']);
		if($descricao != null && $sigla != null)
		{
			$obra->cadastroObra($descricao, $sigla);
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Obras/cadastroObra.php");
	} elseif($sOP == "Editar")
	{
		$id = $_POST['idObra'];
		$descricao = mb_strtoupper($_POST['descricao']);
		$sigla = mb_strtoupper($_POST['sigla']);
		if($id != null && $descricao != null && $sigla != null)
		{
			$obra->alterarObra($id, $descricao, $sigla);
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Obras/cadastroObra.php");
	} elseif($sOP == "Deletar")
	{
		$id = $_POST['idObra'];
		if($id != null)
		{
			$obra->removerObra($id);
		}
		header("location:/SimulacaoCelpa/view/Obras/cadastroObra.php");
	}