
<?php
// Connection

//$conn=mysql_connect('localhost','root','root');
//$db=mysql_select_db('db_equatorial',$conn);

require_once '../../database/dbConexao.php';

$con = conectar();

$filename = "planilha.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
/*
1- Definir o select que será utilizado.
2- Alterar os alias, pois os mesmos serão exibidos na planilha.
3- Ao abrir, o arquivo será executado.
*/
//mysql_set_charset('utf8',$conn);

$user_query ="
	SELECT 
    hol.nm_holding nome_holding, dist.nm_distribuidora nome_distribuidora, dir.nm_diretoria nome_diretoria, 
    ge.nm_gerencia nome_gerência_executiva, ae.nm_area_executiva nome_area_executiva, reg.nm_regional nome_regional, 
    eqp.nm_equipe nome_equipe, eqp.cod_equatorial codigo_equatorial, 
    CASE eqpmt.tipo_equipamento WHEN 1 THEN 'EPC' WHEN 2 THEN 'FERRAMENTA' END tipo_equipamento_equipe, 
    eqpmt.descricao descricao_equipamento_equipe, CASE veic.tpo_veiculo WHEN 0 THEN 'CARRO' WHEN 1 THEN 'MOTO' END tipo_veiculo, veic.placa placa_veículo,
    col.nm_colaborador nome_colaborador, col.cpf_colaborador, col.matricula matricula_colaborador, 
    CASE eqpmtcol.tipo_equipamento WHEN 0 THEN 'EPI' END tipo_equipamento_colaborador, 
    eqpmtcol.descricao descricao_equipamento_colaborador
	FROM
    holding hol
		INNER JOIN
	distribuidora dist ON dist.id_holding = hol.id_holding
        INNER JOIN
    diretoria dir ON dir.id_distribuidora = dist.id_distribuidora
        INNER JOIN
    gerencia_executiva ge ON ge.id_diretoria = dir.id_diretoria
        INNER JOIN
    area_executiva ae ON ae.id_gerencia_executiva = ge.id_gerencia_executiva
        INNER JOIN
    regional reg ON reg.id_area_executiva = ae.id_area_executiva
			INNER JOIN
		colaborador col ON col.id_regional = reg.id_regional
			INNER JOIN
		colaborador_equipamentos coleqp ON coleqp.id_colaborador = col.id_colaborador
			INNER JOIN
		equipamentos eqpmtcol ON eqpmtcol.id_equipamentos = coleqp.id_equipamentos
			INNER JOIN
		colaborador_equipes coleq ON coleq.id_colaborador = col.id_colaborador
			INNER JOIN
		equipes eqp ON eqp.id_equipes = coleq.id_equipes
			INNER JOIN
		equipes_equipamentos eqqmt ON eqqmt.id_equipes = eqp.id_equipes
			INNER JOIN
		equipamentos eqpmt ON eqpmt.id_equipamentos = eqqmt.id_equipamentos
			INNER JOIN
		veiculo veic ON veic.id_veiculo = eqp.id_veiculo;
";

// Write data to file
$flag = false;

foreach ($con->query($user_query)->fetchAll(PDO::FETCH_ASSOC) as $row) {
	if (!$flag) {
// display field/column names as first row
		echo  implode("\t", array_keys($row))  . "\r\n";
		$flag = true;
	}
	echo implode("\t", array_values($row)) . "\r\n" ;
}
?>