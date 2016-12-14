<?php
require_once "../database/dbInstalacao.php";
require_once "../database/dbRegional.php";
require_once "../database/dbAtividade.php";
$instalacao = new dbInstalacao();
$regional = new dbRegional();
$atividade = new dbAtividade();

$sOP = $_POST['sOP'];

if($sOP == "Cadastro") {
	$regID = $_POST['regional'];
	$ativID = $_POST['atividade'];
	$nome = mb_strtoupper($_POST['nome']);
	$tipo = mb_strtoupper($_POST['tipo']);
	$sigla = mb_strtoupper($_POST['sigla']);
	$qtd = 0;

	if($regID != null && $ativID != null && $nome != null && $tipo != null && $sigla != null)
	{
		$resultadoRegional = $regional->listarSiglasRegionalDistribuidora($regID);
		$resultadoAtividade = $atividade->listarUmAtividade($ativID);
		if ($instalacao->listarTodosInstalacao())
		{
			$qtd = count($instalacao->listarTodosInstalacao());
			$sequencial = sprintf('%04d', $qtd+1);
		} else
		{
			$sequencial = sprintf('%04d', $qtd+1);
		}
		$cod_equatorial = $resultadoRegional[0]['sigla_dist'].$resultadoRegional[0]['sigla_reg']."BEL".$sigla.$resultadoAtividade[0]['sigla'].$sequencial;
		$instalacao->cadastroInstalacao($regID,$ativID,$cod_equatorial,$nome,$tipo, $sigla);

	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Instalacoes/cadastroInstalacao.php");
} elseif($sOP == "Editar")
{
	$instID = $_POST['idInstalacao'];
	$regID = $_POST['regionalEditar'];
	$ativID = $_POST['atividadeEditar'];
	$codigo = $_POST['cod_equatorialEditar'];
	$nome = mb_strtoupper($_POST['nomeEditar']);
	$tipo = mb_strtoupper($_POST['tipoEditar']);
	$sigla = mb_strtoupper($_POST['siglaEditar']);
//	echo $regID;
//	die();

	if($instID != null && $regID != null && $ativID != null && $codigo != null && $nome != null && $tipo != null && $sigla != null)
	{
		$resultadoRegional = $regional->listarSiglasRegionalDistribuidora($regID);
		$resultadoAtividade = $atividade->listarUmAtividade($ativID);
		$codSequencial = substr($codigo, 11, 20);
		$cod_equatorial = $resultadoRegional[0]['sigla_dist'].$resultadoRegional[0]['sigla_reg']."BEL".$sigla.$resultadoAtividade[0]['sigla'].$codSequencial;
		$instalacao->alterarInstalacao($instID,$regID,$ativID,$cod_equatorial,$nome,$tipo,$sigla);
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Instalacoes/cadastroInstalacao.php");
} elseif($sOP == "Deletar")
{
	$id = $_POST['idInstalacaoRemover'];
	if($id != null)
	{
		$instalacao->removerInstalacao($id);
	}
	header("location:/SimulacaoCelpa/view/Instalacoes/cadastroInstalacao.php");
}