
<?php
require_once "../../database/dbVeiculo.php";
$veic = new dbVeiculo();
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>Cadastro - Veículos</title>
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
			.addVeiculo{
				color: #31708f;
				background-color: transparent;
				border:none;
			}
			.addVeiculo:hover{
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
				<h2 class="pull-left" style=" color: white">Veículos
					<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Cadastro de veículos</span>
				</h2>
				<!-- Breadcrumb -->
				<div class="bread-crumb pull-right">
					<a href="/SimulacaoCelpa/view/Dashboard/dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
					<!-- Divider -->
					<span class="divider">/</span>
					<a href="#" class="bread-current" style=" color: white">Veículos</a>
				</div>
				<div class="clearfix"></div>
			</div> <!--/ Page heading ends -->

			<div class="matter">
				<div class="container">
					<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>

					<div class="table-responsive">
						<div class="pull-right" style="margin-right: 10px;margin-bottom: 10px; font-size: 40px;">
							<button type="button" class="addVeiculo" data-toggle="modal" data-target="#Adicionar">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
							</button>
						</div>
						<table class="table table-bordered" id="listaVeiculos">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">#</th>
								<th style="color: white; text-align: center;">Placa</th>
								<th style="color: white; text-align: center;">Tipo</th>
								<th style="color: white; text-align: center;">Ações</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($veic->listarTodosVeiculo() != null){ foreach ($veic->listarTodosVeiculo() as $dado) { ?>
								<tr style="font-size: 12px">
									<td style="vertical-align: middle;"><?php echo $dado['id_veiculo']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['placa']; ?></td>
									<td style="vertical-align: middle;">
										<?php
										if($dado['tpo_veiculo'] == 0){ echo "CARRO";}
										elseif($dado['tpo_veiculo'] == 1){ echo "MOTO";}
										?>
									</td>
									<td width="15%" style="vertical-align: middle; font-size: 18px;">
										<button class="addVeiculo editar" title="Editar" style="margin: 0" data-toggle="modal" data-target="#Editar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_veiculo']; ?>">
											<input type="hidden" class="editaPlaca" value="<?php echo $dado['placa']; ?>">
											<input type="hidden" class="editaTipo" value="<?php echo $dado['tpo_veiculo']; ?>">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addVeiculo remover" title="Remover" style="margin: 0" data-toggle="modal" data-target="#Deletar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_veiculo']; ?>">
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

		</div><!--/ Mainbar ends -->

		<div class="clearfix"></div>
	</div><!--/ Content ends -->

	<!-- Scroll to top -->
	<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

	<?php include '../../includes/scripts.php'; ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#listaVeiculos').DataTable({
				"bLengthChange": false,
				"language": { 				"search":"Pesquisar:", 				"paginate": { 					"first": "Primeiro", 					"last": "Ultimo", 					"next": "Próximo", 					"previous": "Anterior" 				} 			}
				"info": false
			});
		});

		window.onbeforeunload = function() {
			<?php unset($_SESSION['msg']); ?>
			console.log('Dados da session[msg] apagados');
		};

		$(".editar").click(function(){
			var placa = $(this).find('.editaPlaca').val();
			var tpo = $(this).find('.editaTipo').val();
			var id = $(this).find('.editaID').val();
			// alert(tpo);

			$('#placaVeiculoEditar').val(placa);
			$('#tipoVeiculoEditar').val(tpo);
			$('#idVeiculo').val(id);
		});

		$(".remover").click(function(){
			var id = $(this).find('.editaID').val();
			$('#idVeiculoRemover').val(id);
		});

	</script>

	</body>
	</html>

<?php include 'modalVeiculo.php'; ?>