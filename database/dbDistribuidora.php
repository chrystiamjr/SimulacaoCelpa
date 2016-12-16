<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
class dbDistribuidora
{

	private $conn;

	function __construct (){
		require_once 'dbConexao.php';
		$this->conn = conectar();
	}

	public function listarTodosDistribuidora (){
		$sql = "SELECT * FROM distribuidora";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null){
			return $result;
		} else {
			return false;
		}
	}

	public function listarUmDistribuidora ($id){
		$sql = "SELECT * FROM distribuidora WHERE id_distribuidora = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function cadastroDistribuidora ($id_holding, $nome, $sigla){
		$sql = "INSERT INTO distribuidora (id_holding, nm_distribuidora, sigla) values ({$id_holding}, '{$nome}', '{$sigla}')";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerDistribuidora ($id){
		$sql = "DELETE FROM distribuidora WHERE id_distribuidora = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function alterarDistribuidora ($id_distribuidora, $id_holding, $nome, $sigla){
		$sql = "UPDATE distribuidora SET id_holding = {$id_holding}, nm_distribuidora = '{$nome}', sigla = '{$sigla}' WHERE id_distribuidora = {$id_distribuidora}";
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