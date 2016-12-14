<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	class dbInstalacao
	{

		private $conn;
		
		function __construct () {
			try {
				$this->conn = new PDO("mysql:dbname=db_equatorial;host=localhost;charset=utf8", "root", "");
				// echo "Sucesso";
			} catch(PDOException $e) {
				echo "Falha: ".$e->getMessage();
			}
		}

		public function listarTodosInstalacao () {
			$sql = "SELECT * FROM instalacoes";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmInstalacao ($id) {
			$sql = "SELECT * FROM instalacoes WHERE id_instalacoes = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function cadastroInstalacao ($idRegional, $idAtividade, $equatorial, $nome, $tipo, $sigla) {
			$sql = "INSERT INTO instalacoes (id_regional, id_atividades, cod_equatorial, nm_instalacao, tp_instalacao, sigla) values ({$idRegional}, {$idAtividade}, '{$equatorial}', '{$nome}', {$tipo}, '{$sigla}')";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function alterarInstalacao ($id, $idRegional, $idAtividade, $equatorial, $nome, $tipo, $sigla) {
			$sql = "UPDATE instalacoes SET id_regional={$idRegional}, id_atividades={$idAtividade}, cod_equatorial='{$equatorial}', nm_instalacao='{$nome}', tp_instalacao={$tipo}, sigla='{$sigla}' WHERE id_instalacoes = {$id}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados alterados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao modificar os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function removerInstalacao ($id) {
			$sql = "DELETE FROM instalacoes WHERE id_instalacoes = {$id}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

	}