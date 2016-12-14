<?php
	require "../database/dbAtividade.php";
	$atividade = new dbAtividade();

	$sOP = $_POST['sOP'];

	if($sOP == "Cadastro")
	{
		$descricao = mb_strtoupper($_POST['descricao']);
		$sigla = mb_strtoupper($_POST['sigla']);
		if($descricao != null && $sigla != null)
		{
			$atividade->cadastroAtividade(mb_strtoupper($descricao), mb_strtoupper($sigla));
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Atividades/cadastroAtividade.php");
	} elseif($sOP == "Editar")
	{
		$id = $_POST['idAtividade'];
		$descricao = mb_strtoupper($_POST['descricao']);
		$sigla = mb_strtoupper($_POST['sigla']);
		if($id != null && $descricao != null && $sigla != null)
		{
			$atividade->alterarAtividade($id, mb_strtoupper($descricao), mb_strtoupper($sigla));
		} else
		{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
		}
		header("location:/SimulacaoCelpa/view/Atividades/cadastroAtividade.php");
	} elseif($sOP == "Deletar")
	{
		$id = $_POST['idAtividade'];
		if($id != null)
		{
			$atividade->removerAtividade($id);
		}
		header("location:/SimulacaoCelpa/view/Atividades/cadastroAtividade.php");
	}