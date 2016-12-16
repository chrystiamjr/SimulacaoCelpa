<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	class dbRegional
	{

		private $conn;

		function __construct (){
			require_once 'dbConexao.php';
			$this->conn = conectar();
		}

		public function listarTodosRegional () {
			$sql = "SELECT * FROM regional";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmRegional ($id) {
			$sql = "SELECT * FROM regional WHERE id_regional = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function cadastroRegional ($areExec, $nome, $sigla) {
			$sql = "INSERT INTO regional (id_area_executiva, nm_regional, sigla) values ({$areExec}, '{$nome}', '{$sigla}')";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function removerRegional ($id) {
			$sql = "DELETE FROM regional WHERE id_regional = {$id}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		// === ## ================= ## ===
		// Funcoes especificas
		// === ## ================= ## ===

		public function listarSiglasRegionalDistribuidora ($id) {
			$sql = "SELECT dist.sigla as sigla_dist, reg.sigla as sigla_reg FROM regional reg
							INNER JOIN area_executiva ae ON ae.id_area_executiva = reg.id_area_executiva
					    INNER JOIN gerencia_executiva ge ON ge.id_gerencia_executiva = ae.id_gerencia_executiva
					    INNER JOIN diretoria dir ON dir.id_diretoria = ge.id_diretoria
							INNER JOIN distribuidora dist ON dist.id_distribuidora = dir.id_distribuidora
							WHERE reg.id_regional = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}
	}