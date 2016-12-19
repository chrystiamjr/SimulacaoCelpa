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
			.relacionamento {
				color: #31708f;
				background-color: transparent;
				border: none;
			}

			.relacionamento:hover {
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
					<a href="/SimulacaoCelpa/view/Dashboard/dash.php" style=" color: white"><i class="fa fa-home"></i> Página
						Inicial</a>
					<!-- Divider -->
					<span class="divider">/</span>
				</div>
				<div class="clearfix"></div>
			</div> <!--/ Page heading ends -->

			<div class="matter">
				<div class="container">

					<div class="table-responsive">
						<div class="container">
							<h4 align="center">Equipes/Colaboradores
								<div class="pull-right" style="position:relative; bottom: 4px; font-size: 40px;">
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
									<th style="color: white; text-align: center;">#</th>
								</tr>
								</thead>
								<tbody align="center">
								<?php if ($relacionamento->listarEquipes_ColaboradorEquipe() != null) {
									foreach ($relacionamento->listarEquipes_ColaboradorEquipe() as $dado) { ?>
										<tr style="font-size: 12px">
											<td style="vertical-align: middle;"><?php echo $dado['nm_equipe']; ?></td>
											<td style="vertical-align: middle;"><?php echo $dado['cod_equatorial']; ?></td>
											<td style="vertical-align: middle;font-size: 18px;">
												<button class="relacionamento listaColaboradores"  title="Listar Colaboradores" style="margin: 0" data-toggle="modal" href="#listarColaboradoresPorEquipes" data-backdrop="static" data-keyboard="false">
													<input type="hidden" class="idEquipe" value="<?php echo $dado['id_equipes']; ?>">
													<i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;
												</button>
												<button class="relacionamento listaEPC"  title="Listar EPCs" style="margin: 0" data-toggle="modal" href="#listaEPCPorEquipe" data-backdrop="static" data-keyboard="false">
													<input type="hidden" class="idEquipe" value="<?php echo $dado['id_equipes']; ?>">
													<i class="fa fa-fire-extinguisher" aria-hidden="true"></i>&nbsp;
												</button>
												<button class="relacionamento listaFerramenta"  title="Listar Ferramentas" style="margin: 0" data-toggle="modal" href="#listaFerramentaPorEquipe" data-backdrop="static" data-keyboard="false">
													<input type="hidden" class="idEquipe" value="<?php echo $dado['id_equipes']; ?>">
													<i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;
												</button>
												<button class="relacionamento removerTudoPorEquipe" title="Remover" style="margin: 0" data-toggle="modal" data-target="#DeletarUmColaboradorPorEquipe" data-backdrop="static" data-keyboard="false">
													<input type="hidden" class="idEquipeRemoveAll" value="<?php echo $dado['id_equipes']; ?>">
													<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
												</button>
											</td>
										</tr>
									<?php }
								} ?>
								</tbody>
							</table>
						</div>
						<br>
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
		window.onbeforeunload = function () {
			<?php unset($_SESSION['msg']); ?>
			console.log('Dados da session[msg] apagados');
		};
	</script>

	<script type="text/javascript" src="dash.js"></script>

	</body>
	</html>

<?php include_once 'modalDash.php';