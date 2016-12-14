
<?php
require_once "../../database/dbAtividade.php";
$atv = new dbAtividade();
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
			.addAtividade{
				color: #31708f;
				background-color: transparent;
				border:none;
			}
			.addAtividade:hover{
				color: rgba(39, 72, 114, 1)
			}
		</style>

		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>

	<body>

	<?php include '../../includes/header.php'; ?>

	<!-- Main content starts -->
	<div class="content">
		<?php include '../../includes/sidebar.php'; ?>

		<!-- Main bar -->
		<div class="mainbar">

			<!-- Page heading -->
			<div class="page-head" style="background-color: #31708f;">
				<h2 class="pull-left" style=" color: white">Atividades
					<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Cadastro de atividades</span>
				</h2>
				<!-- Breadcrumb -->
				<div class="bread-crumb pull-right">
					<a href="/SimulacaoCelpa/view/Dashboard/dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
					<!-- Divider -->
					<span class="divider">/</span>
					<a href="#" class="bread-current" style=" color: white">Atividades</a>
				</div>
				<div class="clearfix"></div>
			</div> <!--/ Page heading ends -->

			<div class="matter">
				<div class="container">
					<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>

					<div class="col-md-12">
						<div class="pull-right" style="margin-right: 10px;margin-bottom: 10px; font-size: 40px;">
							<button type="button" class="addAtividade" data-toggle="modal" data-target="#Adicionar">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
							</button>
						</div>
						<table class="table table-bordered" id="listaAtividades">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">#</th>
								<th style="color: white; text-align: center;">Descrição</th>
								<th style="color: white; text-align: center;">Sigla</th>
								<th style="color: white; text-align: center;">Ações</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($atv->listarTodosAtividade() != null){ foreach ($atv->listarTodosAtividade() as $dado) { ?>
								<tr style="font-size: 12px">
									<td style="vertical-align: middle;"><?php echo $dado['id_atividades']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['descricao']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['sigla']; ?></td>
									<td style="vertical-align: middle;font-size: 18px;">
										<button class="addAtividade editar" title="Editar" style="margin: 0" data-toggle="modal" data-target="#Editar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_atividades']; ?>">
											<input type="hidden" class="editaDescricao" value="<?php echo $dado['descricao']; ?>">
											<input type="hidden" class="editaSigla" value="<?php echo $dado['sigla']; ?>">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addAtividade remover" title="Remover" style="margin: 0" data-toggle="modal" data-target="#Deletar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_atividades']; ?>">
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
			$('#listaAtividades').DataTable({
				"bLengthChange": false,"language": {"search":"Pesquisar:","paginate": {"first":"Primeiro","last":"Ultimo","next":"Próximo","previous": "Anterior"}},
				"info": false
			});
		});

		window.onbeforeunload = function() {
			<?php unset($_SESSION['msg']); ?>
			console.log('Dados da session[msg] apagados');
		}

		$(".editar").click(function(){
			var desc = $(this).find('.editaDescricao').val();
			var sig = $(this).find('.editaSigla').val();
			var id = $(this).find('.editaID').val();

			$('#descricaoAtividadeEditar').val(desc);
			$('#siglaAtividadeEditar').val(sig);
			$('#idAtividade').val(id);
		});

		$(".remover").click(function(){
			var id = $(this).find('.editaID').val();
			$('#idAtividadeRemover').val(id);
		});

	</script>

	</body>
	</html>

<?php include 'modalAtividade.php'; ?>