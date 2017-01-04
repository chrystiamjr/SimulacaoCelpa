<?php

function conectar (){
	try{
		$conn = new PDO("mysql:dbname=db_equatorial;host=localhost;charset=utf8", "root", "root");
		return $conn;
		// echo "Sucesso";
	} catch(PDOException $e) {
		return "Falha: ".$e->getMessage();
	}
}
