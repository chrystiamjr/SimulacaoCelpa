<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
class dbHolding
{

	private $conn;

	function __construct (){
		require_once 'dbConexao.php';
		$this->conn = conectar();
	}

	public function listarTodosHolding (){
		$sql = "SELECT * FROM holding";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null){
			return $result;
		} else {
			return false;
		}
	}

	public function listarUmHolding ($id){
		$sql = "SELECT * FROM holding WHERE id_holding = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function cadastroHolding ($nome){
		$sql = "INSERT INTO holding (nm_holding) values ('{$nome}')";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerHolding ($id){
		$sql = "DELETE FROM holding WHERE id_holding = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function alterarHolding ($id_holding, $nome){
		$sql = "UPDATE holding SET nm_holding = '{$nome}' WHERE id_holding = {$id_holding}";
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