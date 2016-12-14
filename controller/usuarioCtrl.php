<?php
require_once "../database/dbUsuario.php";
$usuario = new dbUsuario();

$sOP = $_POST['sOP'];

if($sOP == "Cadastro")
{
	$colaborador = $_POST['colaborador'];
	$tipo = $_POST['tipo'];
	$senha = $_POST['password'];
	if($colaborador != null && $tipo != null && $senha != null)
	{
		$usuario->cadastroUsuario($colaborador,$tipo,$senha);
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Usuario/cadastroUsuario.php");
} elseif($sOP == "Editar")
{
	$id = $_POST['idUsuarioEditar'];
	$colaborador = $_POST['colaboradorEditar'];
	$tipo = $_POST['tipoEditar'];
	$senha = $_POST['passwordEditar'];
	if($id != null && $colaborador != null && $tipo != null && $senha != null)
	{
		$usuario->alterarUsuario($id,$colaborador,$tipo,$senha);
	} else
	{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Os campos não podem estar em branco!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
	}
	header("location:/SimulacaoCelpa/view/Usuario/cadastroUsuario.php");
} elseif($sOP == "Deletar")
{
	$id = $_POST['idUsuarioRemover'];
	if($id != null)
	{
		$usuario->removerUsuario($id); 
	}
	header("location:/SimulacaoCelpa/view/Usuario/cadastroUsuario.php");
}