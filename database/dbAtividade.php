<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
class dbAtividade
{

	private $conn;

	function __construct (){
		try{
			$this->conn = new PDO("mysql:dbname=db_equatorial;host=localhost;charset=utf8", "root", "");
			// echo "Sucesso";
		} catch(PDOException $e) {
			echo "Falha: ".$e->getMessage();
		}
	}

	public function listarTodosAtividade (){
		$sql = "SELECT * FROM atividades";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null){
			return $result;
		} else {
			return false;
		}
	}

	public function listarUmAtividade ($id){
		$sql = "SELECT * FROM atividades WHERE id_atividades = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function cadastroAtividade ($desc, $sigla){
		$sql = "INSERT INTO atividades (descricao, sigla) values ('{$desc}', '{$sigla}')";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerAtividade ($id){
		$sql = "DELETE FROM atividades WHERE id_atividades = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function alterarAtividade ($id, $desc, $sigla){
		$sql = "UPDATE atividades SET descricao = '{$desc}', sigla = '{$sigla}' WHERE id_atividades = {$id}";
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