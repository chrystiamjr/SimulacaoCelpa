<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
class dbAreaExecutiva
{

	private $conn;

	function __construct (){
		require_once 'dbConexao.php';
		$this->conn = conectar();
	}

	public function listarTodosAreaExecutiva (){
		$sql = "SELECT * FROM area_executiva";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null){
			return $result;
		} else {
			return false;
		}
	}

	public function listarUmAreaExecutiva ($id){
		$sql = "SELECT * FROM area_executiva WHERE id_area_executiva = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function cadastroAreaExecutiva ($id_gerencia_executiva, $nome){
		$sql = "INSERT INTO area_executiva (id_gerencia_executiva, nm_area_executiva) values ({$id_gerencia_executiva}, '{$nome}')";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerAreaExecutiva ($id){
		$sql = "DELETE FROM area_executiva WHERE id_area_executiva = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function alterarAreaExecutiva ($id_area_executiva, $id_gerencia_executiva, $nome){
		$sql = "UPDATE area_executiva SET id_gerencia_executiva = {$id_gerencia_executiva}, nm_area_executiva = '{$nome}' WHERE id_area_executiva = {$id_area_executiva}";
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