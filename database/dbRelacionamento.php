<?php
function listarColaboradores($id)
{
	include "dbColaborador.php";
	$colab = new dbColaborador();
	$result = $colab->listarUmColaborador($id);
	header('Content-Type: application/json');
	$coded = json_encode($result);
	echo $coded;
}

function listarEquipamentos($id)
{
	include "dbEquipamento.php";
	$equip = new dbEquipamento();
	$result = $equip->listarUmEquipamento($id);
	header('Content-Type: application/json');
	$coded = json_encode($result);
	echo $coded;
}

function listarColaboradorporEquipeID($id)
{
	$colEq = new dbRelacionamento();
	$result = $colEq->listarColaboradores_ColaboradorEquipe($id);
	header('Content-Type: application/json');
	$coded = json_encode($result);
	echo $coded;
}

function listarEPIPorColaboradorID($id)
{
	$colEq = new dbRelacionamento();
	$result = $colEq->listarEquipamentosColaborador_ColaboradorEquipe($id);
	header('Content-Type: application/json');
	$coded = json_encode($result);
	echo $coded;
}

function listarEquipamentoPorEquipeID($id)
{
	$colEq = new dbRelacionamento();
	$result = $colEq->listarEquipamentosEquipe_ColaboradorEquipe($id);
	header('Content-Type: application/json');
	$coded = json_encode($result);
	echo $coded;
}

if (isset($_POST['action']) && !empty($_POST['action']) && isset($_POST['id']) && !empty($_POST['id'])) {
	$action = $_POST['action'];
	$id = $_POST['id'];
	switch ($action) {
		case 'colaborador' :
			listarColaboradores($id);
			break;
		case 'equipamento' :
			listarEquipamentos($id);
			break;
		case 'listarColaboradores' :
			listarColaboradorporEquipeID($id);
			break;
		case 'listarEquipamentoPorColaboradorID' :
			listarEPIPorColaboradorID($id);
			break;
		case 'listarEquipamentoPorEquipeID' :
			listarEquipamentoPorEquipeID($id);
			break;
	}
}

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

class dbRelacionamento
{
	private $conn;

	function __construct()
	{
		try {
			$this->conn = new PDO("mysql:dbname=db_equatorial;host=localhost;charset=utf8", "root", "");
			// echo "Sucesso";
		} catch (PDOException $e) {
			echo "Falha: " . $e->getMessage();
		}
	}

	public function listarRelacionamentoEquipesEquipamentos()
	{
		$sql = "SELECT 
					    eqp.cod_equatorial,
					    eqp.nm_equipe,
					    eqpmt.id_equipamentos,
					    eqpmt.tipo_equipamento,
					    eqpmt.descricao
						FROM
					    equipes eqp
		        INNER JOIN
					    equipes_equipamentos eqq ON eqq.id_equipes = eqp.id_equipes
		        INNER JOIN
					    equipamentos eqpmt ON eqpmt.id_equipamentos = eqq.id_equipamentos";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function removerTodosRelacionamentoEquipesEquipamentos($id_equipes)
	{
		$sql = "DELETE FROM equipes_equipamentos WHERE id_equipes = {$id_equipes}";
		$stmt = $this->conn->exec($sql);
		if ($stmt) {
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerUmRelacionamentoEquipesEquipamentos($cod_equatorial, $id_equipamentos)
	{
		$sql = "DELETE FROM equipes_equipamentos WHERE id_equipes = (SELECT id_equipes FROM equipes WHERE cod_equatorial = '{$cod_equatorial}') AND id_equipamentos = {$id_equipamentos}";
		$stmt = $this->conn->exec($sql);
		if ($stmt) {
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function listarRelacionamentoColaboradorEquipamentos()
	{
		$sql = "SELECT 
							colab.cpf_colaborador,
					    colab.nm_colaborador,
					    colab.matricula,
					    eqpmt.id_equipamentos,
					    eqpmt.tipo_equipamento,
					    eqpmt.descricao
						FROM
					    colaborador colab
		        INNER JOIN
					    colaborador_equipamentos ceq ON ceq.id_colaborador = colab.id_colaborador
		        INNER JOIN
					    equipamentos eqpmt ON eqpmt.id_equipamentos = ceq.id_equipamentos";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function removerTodosRelacionamentoColaboradorEquipamentos($id_colaborador)
	{
		$sql = "DELETE FROM colaborador_equipamentos WHERE id_colaborador = {$id_colaborador}";
		$stmt = $this->conn->exec($sql);
		if ($stmt) {
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerUmRelacionamentoColaboradorEquipamentos($cpf_colaborador, $id_equipamentos)
	{
		$sql = "DELETE FROM colaborador_equipamentos WHERE id_colaborador = (SELECT id_colaborador FROM colaborador WHERE cpf_colaborador = '{$cpf_colaborador}') AND id_equipamentos = {$id_equipamentos}";
		$stmt = $this->conn->exec($sql);
		if ($stmt) {
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function listarRelacionamentoColaboradorEquipes()
	{
		$sql = "SELECT 
							colab.cpf_colaborador,
					    colab.nm_colaborador,
					    colab.matricula,
					    eqp.cod_equatorial,
					    eqp.nm_equipe
						FROM
					    colaborador colab
		        INNER JOIN
					    colaborador_equipes ceq ON ceq.id_colaborador = colab.id_colaborador
		        INNER JOIN
					    equipes eqp ON eqp.id_equipes = ceq.id_equipes";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function removerTodosRelacionamentoColaboradorEquipes($id_equipes)
	{
		$sql = "DELETE FROM colaborador_equipes WHERE id_equipes = {$id_equipes}";
		$stmt = $this->conn->exec($sql);
		if ($stmt) {
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerUmRelacionamentoColaboradorEquipes($cpf_colaborador, $cod_equatorial)
	{
		$sql = "DELETE FROM colaborador_equipes WHERE id_colaborador = (SELECT id_colaborador FROM colaborador WHERE cpf_colaborador = '{$cpf_colaborador}') AND id_equipes = (SELECT id_equipes FROM equipes WHERE cod_equatorial = '{$cod_equatorial}')";
		$stmt = $this->conn->exec($sql);
		if ($stmt) {
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}


	public function listarEquipes_ColaboradorEquipe()
	{
		$sql = "SELECT 
							eqp.id_equipes,
					    eqp.cod_equatorial,
					    eqp.nm_equipe
						FROM
					    equipes eqp
		        LEFT JOIN
					    colaborador_equipes ceq ON ceq.id_equipes = eqp.id_equipes
					  LEFT JOIN
					  	colaborador_equipamentos ceqpm ON ceqpm.id_colaborador = ceq.id_colaborador
					  LEFT JOIN
					  	equipes_equipamentos eqq ON eqq.id_equipes = eqp.id_equipes
					  GROUP BY eqp.nm_equipe
						ORDER BY eqp.id_equipes";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function listarColaboradores_ColaboradorEquipe($id)
	{
		$sql = "SELECT 
							colab.id_colaborador,
							colab.cpf_colaborador,
					    colab.nm_colaborador,
					    colab.matricula
						FROM
					    colaborador colab
		        INNER JOIN
					    colaborador_equipes ceq ON ceq.id_colaborador = colab.id_colaborador
					  WHERE ceq.id_equipes = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function listarEquipamentosColaborador_ColaboradorEquipe($id)
	{
		$sql = "SELECT 
					    eqpmt.id_equipamentos,
					    eqpmt.tipo_equipamento,
					    eqpmt.descricao
						FROM
					    colaborador colab
		        INNER JOIN
					    colaborador_equipamentos ceq ON ceq.id_colaborador = colab.id_colaborador
		        INNER JOIN
					    equipamentos eqpmt ON eqpmt.id_equipamentos = ceq.id_equipamentos
					  WHERE colab.id_colaborador = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function listarEquipamentosEquipe_ColaboradorEquipe($id)
	{
		$sql = "SELECT 
					    eqpmt.id_equipamentos,
					    eqpmt.tipo_equipamento,
					    eqpmt.descricao
						FROM
					    equipes_equipamentos eqq
		        INNER JOIN
					    equipamentos eqpmt ON eqpmt.id_equipamentos = eqq.id_equipamentos
					  WHERE eqq.id_equipes = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}
}