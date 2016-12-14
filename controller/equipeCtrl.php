<?php
require_once "../database/dbEquipe.php";
require_once "../database/dbRegional.php";
require_once "../database/dbAtividade.php";
$equipe = new dbEquipe();
$regional = new dbRegional();
$atividade = new dbAtividade();

$sOP = $_POST['sOP'];

if($sOP == "Cadastro") {

	$ativID = $_POST['atividade'];
	$veicID = $_POST['veiculo'];
	$regID = $_POST['regional'];
	$nome = mb_strtoupper($_POST['nome']);
	$qtd = 0;

	if($ativID != null && $veicID != null && $regID != null && $nome != null)
	{
		$resultadoRegional = $regional->listarSiglasRegionalDistribuidora($regID);
		$resultadoAtividade = $atividade->listarUmAtividade($ativID);
		if ($equipe->listarTodosEquipe())
		{
			$qtd = count($equipe->listarTodosEquipe());
			$sequencial = sprintf('%04d', $qtd+1);
		} else
		{
			$sequencial = sprintf('%04d', $qtd+1);
		}
		$cod_equatorial = $resultadoRegional[0]['sigla_dist'].$resultadoRegional[0]['sigla_reg']."BELEQ".$resultadoAtividade[0]['sigla'].$sequencial;
		$equipe->cadastroEquipe($ativID,$veicID,$regID,$cod_equatorial,$nome);

	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Equipe/cadastroEquipe.php");
} elseif($sOP == "Editar")
{
	$eqpID = $_POST['idEquipe'];
	$ativID = $_POST['atividadeEditar'];
	$veicID = $_POST['veiculoEditar'];
	$regID = $_POST['regionalEditar'];
	$codigo = $_POST['cod_equatorialEditar'];
	$nome = mb_strtoupper($_POST['nomeEditar']);

	if($eqpID != null && $ativID != null && $veicID != null && $regID != null && $codigo != null && $nome != null)
	{
		$resultadoRegional = $regional->listarSiglasRegionalDistribuidora($regID);
		$resultadoAtividade = $atividade->listarUmAtividade($ativID);
		$codSequencial = substr($codigo, 11, 20);
		$cod_equatorial = $resultadoRegional[0]['sigla_dist'].$resultadoRegional[0]['sigla_reg']."BELEQ".$resultadoAtividade[0]['sigla'].$codSequencial;
		$equipe->alterarEquipe($eqpID,$ativID,$veicID,$regID,$cod_equatorial,$nome);
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Equipe/cadastroEquipe.php");
} elseif($sOP == "Deletar")
{
	$id = $_POST['idEquipeRemover'];
	if($id != null)
	{
		$equipe->removerEquipe($id);
	}
	header("location:/SimulacaoCelpa/view/Equipe/cadastroEquipe.php");
}