<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
class dbUsuario
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

	public function listarTodosUsuario () {
		$sql = "SELECT * FROM usuario";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function listarUmUsuario ($id) {
		$sql = "SELECT * FROM usuario WHERE id_usuario = {$id}";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

	public function cadastroUsuario ($id_colaborador,$tipo, $passwd) {
		$sql = "INSERT INTO usuario (id_colaborador, tp_user, pswd) values ({$id_colaborador}, {$tipo}, '{$passwd}')";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados cadastrados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro no cadastro dos dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function alterarUsuario ($id_usuario,$id_colaborador,$tipo, $passwd) {
		$sql = "UPDATE usuario SET id_colaborador = {$id_colaborador}, tp_user = {$tipo}, pswd = '{$passwd}' WHERE 	id_usuario = {$id_usuario}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados alterados com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao modificar os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function removerUsuario ($id) {
		$sql = "DELETE FROM usuario WHERE id_usuario = {$id}";
		$stmt = $this->conn->exec($sql);
		if($stmt){
			$_SESSION['msg'] = '<div class="alert alert-info" role="alert" id="msg">Dados removidos com sucesso!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return true;
		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert" id="msg">Erro ao remover os dados!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
			return false;
		}
	}

	public function loginUsuarioColaborador ($cpf, $senha) {
		$sql = "SELECT 
						    colab.nm_colaborador, colab.cpf_colaborador, user.pswd
						FROM
						    usuario user
						        INNER JOIN
						    colaborador colab ON colab.id_colaborador = user.id_colaborador
						WHERE
						    colab.cpf_colaborador = '{$cpf}' AND user.pswd = '{$senha}'";
		$stmt = $this->conn->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result) && $result != null) {
			return $result;
		} else {
			return false;
		}
	}

}

function login(){
	$usuario = new dbUsuario();
	if($usuario->loginUsuarioColaborador($_POST['cpf'], $_POST['senha'])){
		echo "1";
	} else{
		echo "0";
	}
}
if(isset($_POST['action']) && !empty($_POST['action'])) {
	switch ($_POST['action']) {
		case 'login' : login();break;
	}
}