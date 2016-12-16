<?php
require "../database/dbRelacionamento.php";
$relacionamento = new dbRelacionamento();

$sOP = $_POST['sOP'];

if($sOP == "DeletarTodosColaboradoresPorEquipe")
{
	$relacionamento->removerTodosRelacionamentoColaboradorEquipes($_POST['idEquipeRemover']);
	header("location:/SimulacaoCelpa/view/Dashboard/dash.php");
}

elseif($sOP == "DeletarUmColaboradorPorEquipe")
{
	$relacionamento->removerUmRelacionamentoColaboradorEquipes($_POST['cpf_colaborador'], $_POST['id_equipes']);
	header("location:/SimulacaoCelpa/view/Dashboard/dash.php");
}

elseif($sOP == "DeletarTodosEquipamentosPorColaborador")
{
	$relacionamento->removerTodosRelacionamentoColaboradorEquipamentos($_POST['idColaboradorRemover']);
	header("location:/SimulacaoCelpa/view/Dashboard/dash.php");
}

elseif($sOP == "DeletarUmEquipamentoPorColaborador")
{
	$relacionamento->removerUmRelacionamentoColaboradorEquipamentos($_POST['cpf_colaborador'],$_POST['id_equipamentos']);
	header("location:/SimulacaoCelpa/view/Dashboard/dash.php");
}

elseif($sOP == "DeletarTodosEquipamentosPorEquipe")
{
	$relacionamento->removerTodosRelacionamentoEquipesEquipamentos($_POST['idEquipeRemover']);
	header("location:/SimulacaoCelpa/view/Dashboard/dash.php");
}

elseif($sOP == "DeletarUmEquipamentoPorEquipe")
{
	$relacionamento->removerUmRelacionamentoEquipesEquipamentos($_POST['cod_equatorial'],$_POST['id_equipamentos']);
	header("location:/SimulacaoCelpa/view/Dashboard/dash.php");
}