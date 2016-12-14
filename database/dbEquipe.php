<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	class dbEquipe
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

		public function listarTodosEquipe () {
			$sql = "SELECT * FROM equipes";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEquipe ($id) {
			$sql = "SELECT * FROM equipes WHERE id_equipes = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function cadastroEquipe ($atividade, $veiculo, $regional, $equatorial, $nome) {
			$sql = "INSERT INTO equipes (id_atividades, id_veiculo, id_regional, cod_equatorial, nm_equipe) values ({$atividade}, {$veiculo}, {$regional}, '{$equatorial}', '{$nome}')";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function alterarEquipe ($equipe, $atividade, $veiculo, $regional, $equatorial, $nome) {
			$sql = "UPDATE equipes SET id_atividades={$atividade}, id_veiculo={$veiculo}, id_regional={$regional}, cod_equatorial='{$equatorial}', nm_equipe='{$nome}' WHERE id_equipes = {$equipe}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados alterados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro na alteração dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function removerEquipe ($id) {
			$sql = "DELETE FROM equipes WHERE id_equipes = {$id}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function contagemMembrosEquipe ($id) {
			$sql = "SELECT COUNT(*) as membros FROM colaborador_equipes WHERE id_equipes = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function relacionamentoEquipeEquipamento($equipe, $equipamento){
			$sql = "INSERT INTO equipes_equipamentos (id_equipes, id_equipamentos) VALUES ({$equipe},{$equipamento})";
			$stmt = $this->conn->exec($sql);
			if ($stmt) {
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

	}