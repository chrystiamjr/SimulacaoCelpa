<?php
require_once "../database/dbColaborador.php";
require_once "../database/dbDistribuidora.php";
require_once "../database/dbDiretoria.php";
require_once "../database/dbGerenciaExecutiva.php";
require_once "../database/dbAreaExecutiva.php";
require_once "../database/dbRegional.php";
$colaborador = new dbColaborador();
$distribuidora = new dbDistribuidora();
$diretoria = new dbDiretoria();
$gerencia = new dbGerenciaExecutiva();
$area = new dbAreaExecutiva();
$regional = new dbRegional();

$sOP = $_POST['sOP'];

if($sOP == "Cadastro") {
	$distID = $_POST['distribuidora'];
	$dirID = $_POST['diretoria'];
	$gerID = $_POST['gerencia'];
	$areID = $_POST['area'];
	$regID = $_POST['regional'];
	$nome = mb_strtoupper($_POST['nome']);
	$cpfMascara = $_POST['cpf'];
	$matricula = mb_strtoupper($_POST['matricula']);

	$cpfMascara = str_replace('.', '', $cpfMascara);
	$cpf = str_replace('-', '', $cpfMascara);

	if($distID != null && $dirID != null && $gerID != null && $areID != null && $regID != null && $nome != null && $cpf != null && $matricula != null)
	{
		$colaborador->cadastroColaborador($distID,$dirID,$gerID,$areID,$regID,$nome,$cpf,$matricula);
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Colaborador/cadastroColaborador.php");
} elseif($sOP == "Editar")
{
	$colabID = $_POST['idColaborador'];
	$distID = $_POST['distribuidoraEditar'];
	$dirID = $_POST['diretoriaEditar'];
	$gerID = $_POST['gerenciaEditar'];
	$areID = $_POST['areaEditar'];
	$regID = $_POST['regionalEditar'];
	$nome = mb_strtoupper($_POST['nomeEditar']);
	$cpfMascara = $_POST['cpfEditar'];
	$matricula = mb_strtoupper($_POST['matriculaEditar']);

	$cpfMascara = str_replace('.', '', $cpfMascara);
	$cpf = str_replace('-', '', $cpfMascara);

	if($colabID != null && $distID != null && $dirID != null && $gerID != null && $areID != null && $regID != null && $nome != null && $cpf != null && $matricula != null)
	{
		$colaborador->alterarColaborador($colabID,$distID,$dirID,$gerID,$areID,$regID,$nome,$cpf,$matricula);
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Colaborador/cadastroColaborador.php");
} elseif($sOP == "Deletar")
{
	$id = $_POST['idColaboradorRemover'];
	if($id != null)
	{
		$colaborador->removerColaborador_Usuario($id);
	}
	header("location:/SimulacaoCelpa/view/Colaborador/cadastroColaborador.php");
}