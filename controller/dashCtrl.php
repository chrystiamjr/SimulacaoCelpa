<?php
require "../database/dbRelacionamento.php";
$relacionamento = new dbRelacionamento();

$sOP = $_POST['sOP'];

if($sOP == "DeletarTudoPorEquipe")
{
	$relacionamento->removerTodosRelacionamentoColaboradorEquipes($_POST['id_equipes']);
	$relacionamento->removerTodosRelacionamentoEquipesEquipamentos($_POST['id_equipes']);
	header("location:/SimulacaoCelpa/view/Dashboard/dash.php");
}