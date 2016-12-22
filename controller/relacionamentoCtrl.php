<?php
require "../database/dbColaborador.php";
require "../database/dbEquipe.php";
$colaborador = new dbColaborador();
$equipe = new dbEquipe();
$tipo = $_POST['tipo'];

if($tipo == "colaboradorEquipe")
{
	$id_colaborador = $_POST['id_colaborador'];
	$id_equipes = $_POST['id_equipes'];
//	var_dump($id_colaborador);
//	echo $id_equipes;
//	die();
	if($id_colaborador != null && $id_equipes != null)
	{
		foreach ($id_colaborador as $dados)
		{
			$colaborador->relacionamentoColaboradorEquipe($dados,$id_equipes);
		}
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Colaborador/relacionamentoColaboradorEquipe.php");
}elseif($tipo == "colaboradorEquipamento")
{
	$id_colaborador = $_POST['id_colaborador'];
	$id_equipamentos = $_POST['id_equipamentos'];
	if($id_colaborador != null && $id_equipamentos != null)
	{
		foreach ($id_equipamentos as $dados)
		{
			$colaborador->relacionamentoColaboradorEquipamentos($id_colaborador,$dados);
		}
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Colaborador/relacionamentoColaboradorEquipamento.php");
}elseif($tipo == "equipeEquipamento")
{
	$id_equipes = $_POST['id_equipes'];
	$id_equipamentos = $_POST['id_equipamentos'];
	if($id_equipes != null && $id_equipamentos != null)
	{
		foreach ($id_equipamentos as $dados)
		{
			$equipe->relacionamentoEquipeEquipamento($id_equipes, $dados);
		}
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Equipe/relacionamentoEquipeEquipamento.php");
}