<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
class dbInstalacao
{

	private $conn;

	function __construct (){
		require_once 'dbConexao.php';
		$this->conn = conectar();
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

	public function listarTodosInstalacaoComAtivos () {
		$sql = "SELECT * FROM instalacoes ins
INNER JOIN instalacoes_ativos ia ON ia.id_instalacoes = ins.id_instalacoes";
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

	public function listarTodosInstalacaoAtivo () {
		$sql = "SELECT * FROM instalacoes_ativos";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function listarUmInstalacaoAtivo ($id) {
		$sql = "SELECT * FROM instalacoes_ativos WHERE id_instalacoes_ativos = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function cadastroInstalacaoAtivo ($id_instalacoes, $nm_ativo, $sigla, $cod_equatorial) {
		$sql = "INSERT INTO instalacoes_ativos (id_instalacoes, nm_ativo, sigla_ativo, codigo_equatorial) values ({$id_instalacoes}, '{$nm_ativo}', '{$sigla}', '{$cod_equatorial}')";
//			echo $sql;
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function alterarInstalacaoAtivo ($id, $id_instalacoes, $nm_ativo, $sigla, $cod_equatorial) {
		$sql = "UPDATE instalacoes SET id_instalacoes={$id_instalacoes}, nm_ativo='{$nm_ativo}', sigla_ativo='{$sigla}', codigo_equatorial='{$cod_equatorial}' WHERE id_instalacoes_ativos = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados alterados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao modificar os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerInstalacaoAtivo ($id) {
		$sql = "DELETE FROM instalacoes_ativos WHERE id_instalacoes_ativos = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	// CODIGO PERSONALIZADO
	public function listarUmInstalacaoEquatorial ($cod) {
		$sql = "SELECT id_instalacoes FROM instalacoes WHERE cod_equatorial = '{$cod}'";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function listarTodosInstalacaoAtivoPorInstalacaoID ($id) {
		$sql = "SELECT * FROM instalacoes_ativos WHERE id_instalacoes = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

}

function listarAtivoPorInstalacaoID($id)
{
	$inst = new dbInstalacao();
	$result = $inst->listarTodosInstalacaoAtivoPorInstalacaoID($id);
	header('Content-Type: application/json');
	$coded = json_encode($result);
	echo $coded;
}

if(isset($_POST['action']) && !empty($_POST['action'])) {
	switch ($_POST['action']) {
		case 'editarAtivos' : listarAtivoPorInstalacaoID($_POST['id']);break;
	}
}