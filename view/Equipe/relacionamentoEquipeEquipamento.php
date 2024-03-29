<?php
require_once "../../database/dbEquipe.php";
$equipe = new dbEquipe();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Title here -->
	<title>Relacionamento - Equipes e Equipamentos</title>
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
		.addColaborador{
			color: #31708f;
			background-color: transparent;
			border:none;
		}
		.addColaborador:hover{
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
			<h2 class="pull-left" style=" color: white">Equipes
				<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Relacionamento de equipes para equipamentos</span>
			</h2>
			<!-- Breadcrumb -->
			<div class="bread-crumb pull-right">
				<a href="/SimulacaoCelpa/view/Dashboard/dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
				<!-- Divider -->
				<span class="divider">/</span>
				<a href="#" class="bread-current" style=" color: white">Relacionamento Equipes</a>
			</div>
			<div class="clearfix"></div>
		</div> <!--/ Page heading ends -->

		<div class="matter">
			<div class="container" id="conteudoPrincipal">
				<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>

				<div class="col-md-12">
					<div class="form-group">
						<label for="equipe" class="col-sm-2 control-label" style="text-align: center !important">Equipe:</label>
						<div class="col-sm-10">
							<select class="form-control" id="equipe" required>
								<?php
								foreach ($equipe->listarTodosEquipe() as $dado) {
									?>
									<option value="<?php echo $dado['id_equipes']; ?>"><?php echo $dado['nm_equipe']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>

					<br>

					<div class="form-group">
						<label for="equipamento" class="col-sm-2 control-label" style="text-align: center !important">Equipamento:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="equipamento" required>
						</div>
					</div>

					<center><div id="layourFluido"></div></center>
					<br><br>
					<hr>
					<br>

				</div>

				<div class="col-md-12 table-responsive">
					<form method="post" action="/SimulacaoCelpa/controller/relacionamentoCtrl.php">
						<input type="hidden" name="tipo" value="equipeEquipamento">
						<input type="hidden" name="id_equipes" id="id_equipes">
						<table class="table table-bordered table-responsive" id="listaColaborador">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;vertical-align: middle">Código do Equipamento</th>
								<th style="color: white; text-align: center;vertical-align: middle">Tipo do Equipamento</th>
								<th style="color: white; text-align: center;vertical-align: middle">Descrição do Equipamento</th>
								<th style="color: white; text-align: center;vertical-align: middle">Ações</th>
							</tr>
							</thead>
							<tbody id="dados" align="center"></tbody>
						</table>

						<br>
						<hr>
						<br>
						<button class="btn btn-success pull-right" type="submit" style="margin-right: 20px; width: 120px">Salvar</button>
					</form>
					<br>
					<br>
				</div>

			</div>
		</div>
		<!--			</div>-->

	</div><!--/ Mainbar ends -->

	<div class="clearfix"></div>
</div><!--/ Content ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<?php include '../../includes/scripts.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#listaColaborador').DataTable({
			"bLengthChange": false,"language": {"search":"Pesquisar:","paginate": {"first":"Primeiro","last":"Ultimo","next":"Próximo","previous": "Anterior"}},
			"bFilter": false,
			"paging": false,
			"info": false
		});
		$('#equipamento').focus();
		$('#dados tr').remove();
	});

	window.onbeforeunload = function() {
		<?php unset($_SESSION['msg']); ?>
		console.log('Dados da session[msg] apagados');
	};

	$('#id_equipes').val($('#equipe').val());

	$('#equipe').on('change', function(){
		var id_equipe = $('#equipe').val();
		$('#id_equipes').val(id_equipe);
	});
</script>

<script type="text/javascript" src="ajaxEquipeEquipamento.js"></script>

</body>
</html>