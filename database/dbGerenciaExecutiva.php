<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
class dbGerenciaExecutiva
{

	private $conn;

	function __construct (){
		require_once 'dbConexao.php';
		$this->conn = conectar();
	}

	public function listarTodosGerenciaExecutiva (){
		$sql = "SELECT * FROM gerencia_executiva";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null){
			return $result;
		} else {
			return false;
		}
	}

	public function listarUmGerenciaExecutiva ($id){
		$sql = "SELECT * FROM gerencia_executiva WHERE id_gerencia_executiva = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function cadastroGerenciaExecutiva ($id_diretoria, $nome){
		$sql = "INSERT INTO gerencia_executiva (id_diretoria, nm_gerencia) values ({$id_diretoria}, '{$nome}')";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerGerenciaExecutiva ($id){
		$sql = "DELETE FROM gerencia_executiva WHERE id_gerencia_executiva = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function alterarGerenciaExecutiva ($id_gerencia_executiva, $id_diretoria, $nome){
		$sql = "UPDATE gerencia_executiva SET id_diretoria = {$id_diretoria}, nm_gerencia = '{$nome}' WHERE id_gerencia_executiva = {$id_gerencia_executiva}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados alterados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao modificar os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

}