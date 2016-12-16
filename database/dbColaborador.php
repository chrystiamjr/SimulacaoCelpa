<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	class dbColaborador
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

		public function listarTodosColaborador () {
			$sql = "SELECT * FROM colaborador";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmColaborador ($id) {
			$sql = "SELECT * FROM colaborador WHERE id_colaborador = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmColaboradorDisponível ($id) {
			$sql = "SELECT *
							FROM
							  colaborador
							WHERE
							  id_colaborador NOT IN (
							  SELECT 
            			id_colaborador
				        FROM
			            colaborador_equipes)
			        AND id_colaborador = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function cadastroColaborador ($id_distribuidora, $id_diretoria, $id_gerencia, $area_executiva, $id_regional, $nome, $cpf, $matricula) {
			$sql = "INSERT INTO colaborador (id_distribuidora, id_diretoria, id_gerencia_executiva, id_area_executiva, id_regional, nm_colaborador, cpf_colaborador, matricula) values ({$id_distribuidora}, {$id_diretoria}, {$id_gerencia}, {$area_executiva}, {$id_regional}, '{$nome}', '{$cpf}', '{$matricula}')";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function alterarColaborador ($id_colaborador, $id_distribuidora, $id_diretoria, $id_gerencia, $area_executiva, $id_regional, $nome, $cpf, $matricula) {
			$sql = "UPDATE colaborador SET id_distribuidora={$id_distribuidora}, id_diretoria={$id_diretoria}, id_gerencia_executiva={$id_gerencia}, id_area_executiva={$area_executiva}, id_regional={$id_regional}, nm_colaborador='{$nome}', cpf_colaborador='{$cpf}', matricula='{$matricula}' WHERE id_colaborador = {$id_colaborador}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados alterados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao modificar os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function removerColaborador_Usuario ($id) {
			$sql1 = "DELETE FROM usuario WHERE id_colaborador = {$id};"; /* --- */ $stmt1 = $this->conn->exec($sql1);
			$sql2 = "DELETE FROM colaborador WHERE id_colaborador = {$id};"; /* --- */ $stmt2 = $this->conn->exec($sql2);
			if($stmt1 || $stmt2){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function removerColaborador ($id) {
			$sql = "DELETE FROM colaborador WHERE id_colaborador = {$id}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function  relacionamentoColaboradorEquipe($colaborador, $equipe){
			$sql = "INSERT INTO colaborador_equipes (id_colaborador, id_equipes) VALUES ({$colaborador}, {$equipe})";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function  relacionamentoColaboradorEquipamentos($colaborador, $equipamentos){
			$sql = "INSERT INTO colaborador_equipamentos (id_colaborador, id_equipamentos) VALUES ({$colaborador}, {$equipamentos})";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

	}