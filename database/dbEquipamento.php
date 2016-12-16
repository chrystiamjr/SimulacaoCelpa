<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	class dbEquipamento
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

		public function listarTodosEquipamento (){
			$sql = "SELECT * FROM equipamentos";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null){
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEquipamento ($id){
			$sql = "SELECT * FROM equipamentos WHERE id_equipamentos = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEquipamentoEPI ($id){
			$sql = "SELECT * FROM equipamentos WHERE id_equipamentos = {$id} AND tipo_equipamento = 0";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEPCFerramenta ($id){
			$sql = "SELECT * FROM equipamentos WHERE id_equipamentos = {$id} AND tipo_equipamento != 0";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEPCFerramentaDisp ($id){
			$sql = "SELECT *
							FROM
						    equipamentos
							WHERE
						    id_equipamentos NOT IN (
						    	SELECT 
          				  id_equipamentos
                  FROM
            				equipes_equipamentos)
              AND id_equipamentos = {$id} AND tipo_equipamento != 0";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEquipamentoEPC ($id){
			$sql = "SELECT * FROM equipamentos WHERE id_equipamentos = {$id} AND tipo_equipamento = 1";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEquipamentoFerramenta ($id){
			$sql = "SELECT * FROM equipamentos WHERE id_equipamentos = {$id} AND tipo_equipamento = 2";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			} else {
				return false;
			}
		}

		public function listarUmEquipamentoDisponível ($id){
			$sql = "SELECT *
							FROM
							  equipamentos
							WHERE
							  id_equipamentos NOT IN (
							  SELECT 
            			id_equipamentos
        				FROM
            			colaborador_equipamentos)
        			AND tipo_equipamento = 0
        			AND id_equipamentos = {$id}";
			$stmt = $this->conn->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(isset($result) && $result != null) {
				return $result;
			}else {
				return false;
			}
		}

		public function cadastroEquipamento ($tipo, $desc){
			$sql = "INSERT INTO equipamentos (tipo_equipamento, descricao) values ({$tipo},'{$desc}')";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function alterarEquipamento ($id, $tipo, $desc){
			$sql = "UPDATE equipamentos SET tipo_equipamento = {$tipo}, descricao = '{$desc}' WHERE id_equipamentos = {$id}";
			$stmt = $this->conn->exec($sql);
			if($stmt){
				$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados alterados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return true;
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao modificar os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
				return false;
			}
		}

		public function removerEquipamento ($id){
			$sql = "DELETE FROM equipamentos WHERE id_equipamentos = {$id}";
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