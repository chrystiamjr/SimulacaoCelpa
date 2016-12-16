
<?php
require '../../database/dbRelacionamento.php';
require '../../database/dbEquipe.php';
require '../../database/dbColaborador.php';
$relacionamento = new dbRelacionamento();
$equipe = new dbEquipe();
$colaborador = new dbColaborador();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Title here -->
	<title>Cadastro - Atividade</title>
	<!-- Description, Keywords and Author -->
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your,Keywords">
	<meta name="author" content="ResponsiveWebInc">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="/SimulacaoCelpa/css/bootstrap.min.css" rel="stylesheet">

	<link href="/SimulacaoCelpa/css/dataTables.min.css" rel="stylesheet">
	<link href="/SimulacaoCelpa/css/dataTables.bootstrap.min.css" rel="stylesheet">

	<!-- jQuery UI -->
	<link rel="stylesheet" href="/SimulacaoCelpa/css/jquery-ui.css">
	<!-- jQuery Gritter -->
	<link rel="stylesheet" href="/SimulacaoCelpa/css/jquery.gritter.css">
	<!-- Font awesome CSS -->
	<link href="/SimulacaoCelpa/css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="/SimulacaoCelpa/css/style.css" rel="stylesheet">
	<!-- Widgets stylesheet -->
	<link href="/SimulacaoCelpa/css/widgets.css" rel="stylesheet">

	<style type="text/css">
		.relacionamento{
			color: #31708f;
			background-color: transparent;
			border:none;
		}
		.relacionamento:hover{
			color: rgba(39, 72, 114, 1)
		}
	</style>

	<!-- Favicon -->
	<link rel="shortcut icon" href="/SimulacaoCelpa/img/favicon/favicon.png">

</head>

<body>

<?php include '../../includes/header.php'; ?>

<!-- Main content starts -->
<div class="content" style="margin-top: 36px;">
	<?php include '../../includes/sidebar.php'; ?>

	<!-- Main bar -->
	<div class="mainbar">

		<!-- Page heading -->
		<div class="page-head" style="background-color: #31708f;">
			<h2 class="pull-left" style=" color: white">Página Inicial
				<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Listagem de relacionamentos</span>
			</h2>
			<!-- Breadcrumb -->
			<div class="bread-crumb pull-right">
				<a href="/SimulacaoCelpa/view/Dashboard/dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
				<!-- Divider -->
				<span class="divider">/</span>
			</div>
			<div class="clearfix"></div>
		</div> <!--/ Page heading ends -->

		<div class="matter">
			<div class="container">

				<div class="col-md-12">
					<div class="container">
						<h4 align="center">Equipes/Colaboradores
							<div class="pull-right" style="position:relative; bottom: 4px; font-size: 40px;">
								<button type="button" class="relacionamento" data-toggle="modal" data-target="#DeletarTodosColaboradoresPorEquipe">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button>
								<button type="button" class="relacionamento" id="compactarTab1">
									<i class="fa fa-sort-desc" aria-hidden="true"></i>
								</button>
							</div>
						</h4>
					</div>
					<hr>

					<div id="Tab1">
						<table class="table table-bordered listaRelacionamento">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">Nome da Equipe</th>
								<th style="color: white; text-align: center;">Código Equatorial</th>
								<th style="color: white; text-align: center;">Nome do Colaborador</th>
								<th style="color: white; text-align: center;">CPF do Colaborador</th>
								<th style="color: white; text-align: center;">Matrícula</th>
								<th style="color: white; text-align: center;">#</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($relacionamento->listarRelacionamentoColaboradorEquipes() != null){ foreach ($relacionamento->listarRelacionamentoColaboradorEquipes() as $dado) { ?>
								<tr style="font-size: 12px">
									<td style="vertical-align: middle;"><?php echo $dado['nm_equipe']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['cod_equatorial']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['nm_colaborador']; ?></td>
									<td style="vertical-align: middle;"><?php
										$d1 = $codSequencial = substr($dado['cpf_colaborador'], 0, 3);
										$d2 = $codSequencial = substr($dado['cpf_colaborador'], 3, 3);
										$d3 = $codSequencial = substr($dado['cpf_colaborador'], 6, 3);
										$d4 = $codSequencial = substr($dado['cpf_colaborador'], 9, 2);
										echo $d1.'.'.$d2.'.'.$d3.'-'.$d4;
										?></td>
									<td style="vertical-align: middle;"><?php echo $dado['matricula']; ?></td>
									<td style="vertical-align: middle;font-size: 18px;">
										<button class="relacionamento removerUmColaboradorPorEquipe" title="Remover" style="margin: 0" data-toggle="modal" data-target="#DeletarUmColaboradorPorEquipe">
											<input type="hidden" class="idEquipeRemoveColab" value="<?php echo $dado['id_equipes']; ?>">
											<input type="hidden" class="cpfColaboradorRemoveColab" value="<?php echo $dado['cpf_colaborador']; ?>">
											<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
										</button>
									</td>
								</tr>
							<?php } } ?>
							</tbody>
						</table>
					</div>
					<br>
				</div>

				<div class="col-md-12">
					<div class="container">
						<h4 align="center">Colaboradores/Equipamentos
							<div class="pull-right" style="position:relative; bottom: 4px; font-size: 40px;">
								<button type="button" class="relacionamento" data-toggle="modal" data-target="#DeletarTodosEquipamentosPorColaborador">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button>
								</button>
								<button type="button" class="relacionamento" id="compactarTab2">
									<i class="fa fa-sort-desc" aria-hidden="true"></i>
								</button>
							</div>
						</h4>
					</div>
					<hr>

					<div id="Tab2">
						<table class="table table-bordered listaRelacionamento">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">Nome do Colaborador</th>
								<th style="color: white; text-align: center;">CPF do Colaborador</th>
								<th style="color: white; text-align: center;">Matrícula</th>
								<th style="color: white; text-align: center;">Código do Equipamento</th>
								<th style="color: white; text-align: center;">Tipo do Equipamento</th>
								<th style="color: white; text-align: center;">Descrição</th>
								<th style="color: white; text-align: center;">#</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($relacionamento->listarRelacionamentoColaboradorEquipamentos() != null){ foreach ($relacionamento->listarRelacionamentoColaboradorEquipamentos() as $dado) { ?>
								<tr style="font-size: 12px">
									<td style="vertical-align: middle;"><?php echo $dado['nm_colaborador']; ?></td>
									<td style="vertical-align: middle;"><?php
										$d1 = $codSequencial = substr($dado['cpf_colaborador'], 0, 3);
										$d2 = $codSequencial = substr($dado['cpf_colaborador'], 3, 3);
										$d3 = $codSequencial = substr($dado['cpf_colaborador'], 6, 3);
										$d4 = $codSequencial = substr($dado['cpf_colaborador'], 9, 2);
										echo $d1.'.'.$d2.'.'.$d3.'-'.$d4;
										?></td>
									<td style="vertical-align: middle;"><?php echo $dado['matricula']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['id_equipamentos']; ?></td>
									<td style="vertical-align: middle;"><?php
										if($dado['tipo_equipamento'] == 0){ echo "EPI";}
										elseif($dado['tipo_equipamento'] == 1){ echo "EPC";}
										elseif($dado['tipo_equipamento'] == 2){ echo "FERRAMENTA";}
										?></td>
									<td style="vertical-align: middle;"><?php echo $dado['descricao']; ?></td>
									<td style="vertical-align: middle;font-size: 18px;">
										<button class="relacionamento removerUmEquipamentoPorColaborador" title="Remover" style="margin: 0" data-toggle="modal" data-target="#DeletarUmEquipamentoPorColaborador">
											<input type="hidden" class="idEquipamentoRemoveEquipamento" value="<?php echo $dado['id_equipamentos']; ?>">
											<input type="hidden" class="cpfColaboradorRemoveEquipamento" value="<?php echo $dado['cpf_colaborador']; ?>">
											<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
										</button>
									</td>
								</tr>
							<?php } } ?>
							</tbody>
						</table>
					</div>
					<br>
				</div>


				<div class="col-md-12">
					<div class="container"">
						<h4 align="center">Equipes/Equipamentos
							<div class="pull-right" style="position:relative; bottom: 4px; font-size: 40px;">
								<button type="button" class="relacionamento" data-toggle="modal" data-target="#DeletarTodosEquipamentosPorEquipe">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button>
								</button>
								<button type="button" class="relacionamento" id="compactarTab3">
									<i class="fa fa-sort-desc" aria-hidden="true"></i>
								</button>
							</div>
						</h4>
					</div>
					<hr>

					<div id="Tab3">
						<table class="table table-bordered listaRelacionamento">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">Nome da Equipe</th>
								<th style="color: white; text-align: center;">Código Equatorial</th>
								<th style="color: white; text-align: center;">Código do Equipamento</th>
								<th style="color: white; text-align: center;">Tipo do Equipamento</th>
								<th style="color: white; text-align: center;">Descrição</th>
								<th style="color: white; text-align: center;">#</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($relacionamento->listarRelacionamentoEquipesEquipamentos() != null){ foreach ($relacionamento->listarRelacionamentoEquipesEquipamentos() as $dado) { ?>
								<tr style="font-size: 12px">
									<td style="vertical-align: middle;"><?php echo $dado['nm_equipe']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['cod_equatorial']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['id_equipamentos']; ?></td>
									<td style="vertical-align: middle;"><?php
										if($dado['tipo_equipamento'] == 0){ echo "EPI";}
										elseif($dado['tipo_equipamento'] == 1){ echo "EPC";}
										elseif($dado['tipo_equipamento'] == 2){ echo "FERRAMENTA";}
										?></td>
									<td style="vertical-align: middle;"><?php echo $dado['descricao']; ?></td>
									<td style="vertical-align: middle;font-size: 18px;">
										<button class="relacionamento removerUmEquipamentoPorEquipe" title="Remover" style="margin: 0" data-toggle="modal" data-target="#DeletarUmEquipamentoPorEquipe">
											<input type="hidden" class="idEquipamentoRemoveEquipe" value="<?php echo $dado['id_equipamentos']; ?>">
											<input type="hidden" class="equatorialRemoveEquipe" value="<?php echo $dado['cod_equatorial']; ?>">
											<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
										</button>
									</td>
								</tr>
							<?php } } ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>

	</div><!--/ Mainbar ends -->
	<div class="clearfix"></div>
</div><!--/ Content ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<?php include '../../includes/scripts.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.listaRelacionamento').DataTable({
			"bLengthChange": false,"language": {"search":"Pesquisar:","paginate": {"first":"Primeiro","last":"Ultimo","next":"Próximo","previous": "Anterior"}},
			"info": false,
			"iDisplayLength": 5
		});
		$('#Tab1').hide();
		$('#Tab2').hide();
		$('#Tab3').hide();
	});

	window.onbeforeunload = function() {
		<?php unset($_SESSION['msg']); ?>
		console.log('Dados da session[msg] apagados');
	};

	$(".removerUmColaboradorPorEquipe").click(function(){
		var id = $(this).find('.idEquipeRemoveColab').val();
		var cpf = $(this).find('.cpfColaboradorRemoveColab').val();

		$('#idEquipeRemoveColab').val(id);
		$('#cpfColaboradorRemoveColab').val(cpf);
	});

	$(".removerUmEquipamentoPorColaborador").click(function(){
		var id = $(this).find('.idEquipamentoRemoveEquipamento').val();
		var cpf = $(this).find('.cpfColaboradorRemoveEquipamento').val();
		
		$('#idEquipamentoRemoveEquipamento').val(id);
		$('#cpfColaboradorRemoveEquipamento').val(cpf);
	});

	$(".removerUmEquipamentoPorEquipe").click(function(){
		var id = $(this).find('.idEquipamentoRemoveEquipe').val();
		var cod = $(this).find('.equatorialRemoveEquipe').val();

		$('#idEquipamentoRemoveEquipe').val(id);
		$('#equatorialRemoveEquipe').val(cod);
	});

	var toggle1 = true;
	$('#compactarTab1').click(function () {
		toggle1 = !toggle1;
		if (toggle1) {
			$( "#Tab1" ).slideUp( "slow", function() {
				$('#Tab1').hide();
			});
			$('#compactarTab1 i').remove();
			var dados = '<i class="fa fa-sort-desc" aria-hidden="true"></i>';
			$('#compactarTab1').append(dados);

		}
		else {
			$( "#Tab1" ).slideDown( "slow", function() {
				$('#Tab1').show();
			});
			$('#compactarTab1 i').remove();
			var dados = '<i class="fa fa-sort-asc" aria-hidden="true"></i>';
			$('#compactarTab1').append(dados);
		}
	});

	var toggle2 = true;
	$('#compactarTab2').click(function () {
		toggle2 = !toggle2;
		if (toggle2) {
			$( "#Tab2" ).slideUp( "slow", function() {
				$('#Tab2').hide();
			});
			$('#compactarTab2 i').remove();
			var dados = '<i class="fa fa-sort-desc" aria-hidden="true"></i>';
			$('#compactarTab2').append(dados);

		}
		else {
			$( "#Tab2" ).slideDown( "slow", function() {
				$('#Tab2').show();
			});
			$('#compactarTab2 i').remove();
			var dados = '<i class="fa fa-sort-asc" aria-hidden="true"></i>';
			$('#compactarTab2').append(dados);
		}
	});

	var toggle3 = true;
	$('#compactarTab3').click(function () {
		toggle3 = !toggle3;
		if (toggle3) {
			$( "#Tab3" ).slideUp( "slow", function() {
				$('#Tab3').hide();
			});
			$('#compactarTab3 i').remove();
			var dados = '<i class="fa fa-sort-desc" aria-hidden="true"></i>';
			$('#compactarTab3').append(dados);

		}
		else {
			$( "#Tab3" ).slideDown( "slow", function() {
				$('#Tab3').show();
			});
			$('#compactarTab3 i').remove();
			var dados = '<i class="fa fa-sort-asc" aria-hidden="true"></i>';
			$('#compactarTab3').append(dados);
		}
	});
</script>

</body>
</html>

<?php include_once 'modalDash.php';