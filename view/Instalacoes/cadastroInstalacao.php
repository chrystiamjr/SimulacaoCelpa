
<?php
require_once "../../database/dbInstalacao.php";
require_once "../../database/dbRegional.php";
require_once "../../database/dbAtividade.php";
$inst = new dbInstalacao();
$reg = new dbRegional();
$ativ = new dbAtividade();
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>Cadastro - Instalações</title>
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
			.addInstalacao{
				color: #31708f;
				background-color: transparent;
				border:none;
			}
			.addInstalacao:hover{
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
				<h2 class="pull-left" style=" color: white">Instalações
					<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Cadastro de instalações</span>
				</h2>
				<!-- Breadcrumb -->
				<div class="bread-crumb pull-right">
					<a href="/SimulacaoCelpa/view/Dashboard/dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
					<!-- Divider -->
					<span class="divider">/</span>
					<a href="#" class="bread-current" style=" color: white">Instalações</a>
				</div>
				<div class="clearfix"></div>
			</div> <!--/ Page heading ends -->

			<div class="matter">
				<div class="container">
					<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>

					<div class="table-responsive">
						<div class="pull-right" style="margin-right: 10px;margin-bottom: 10px; font-size: 40px;">
							<button type="button" class="addInstalacao" data-toggle="modal" data-target="#Adicionar">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
							</button>
						</div>
						<table class="table table-bordered" id="listaInstalacao">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;vertical-align: middle">#</th>
								<th style="color: white; text-align: center;vertical-align: middle">Regional</th>
								<th style="color: white; text-align: center;vertical-align: middle">Atividade</th>
								<th style="color: white; text-align: center;vertical-align: middle">Código Equatorial</th>
								<th style="color: white; text-align: center;vertical-align: middle">Nome da instalação</th>
								<th style="color: white; text-align: center;vertical-align: middle">Tipo</th>
								<th style="color: white; text-align: center;vertical-align: middle">Sigla</th>
								<th style="color: white; text-align: center;vertical-align: middle">Ações</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($inst->listarTodosInstalacao() != null){ foreach ($inst->listarTodosInstalacao() as $dado) { ?>
								<tr style="font-size: 12px">
									<td style="vertical-align: middle;"><?php echo $dado['id_instalacoes']; ?></td>
									<td style="vertical-align: middle;"><?php echo $reg->listarUmRegional($dado['id_regional'])[0]['nm_regional'] ?></td>
									<td style="vertical-align: middle;"><?php echo $ativ->listarUmAtividade($dado['id_atividades'])[0]['descricao'] ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['cod_equatorial']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['nm_instalacao']; ?></td>
									<td style="vertical-align: middle;">
										<?php
										if($dado['tp_instalacao'] == 0){ echo "SUBESTAÇÃO";}
										elseif($dado['tp_instalacao'] == 1){ echo "AGÊNCIA";}
										elseif($dado['tp_instalacao'] == 2){ echo "USINA";}
										elseif($dado['tp_instalacao'] == 3){ echo "ALMOXARIFADO";}
										elseif($dado['tp_instalacao'] == 4){ echo "OFICINA";}
										?>
									</td>
									<td style="vertical-align: middle;"><?php echo $dado['sigla']; ?></td>
									<td style="vertical-align: middle;font-size: 18px;">
										<button class="addInstalacao editar" title="Editar" style="margin: 0" data-toggle="modal" data-target="#Editar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_instalacoes']; ?>">
											<input type="hidden" class="editaCodigo" value="<?php echo $dado['cod_equatorial']; ?>">
											<input type="hidden" class="editaRegional" value="<?php echo $dado['id_regional']; ?>">
											<input type="hidden" class="editaAtividade" value="<?php echo $dado['id_atividades']; ?>">
											<input type="hidden" class="editaNome" value="<?php echo $dado['nm_instalacao']; ?>">
											<input type="hidden" class="editaTipo" value="<?php echo $dado['tp_instalacao']; ?>">
											<input type="hidden" class="editaSigla" value="<?php echo $dado['sigla']; ?>">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addInstalacao remover" title="Remover" style="margin: 0" data-toggle="modal" data-target="#Deletar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_instalacoes']; ?>">
											<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addInstalacao codigo" title="Código de Barras" style="margin: 0;" data-toggle="modal" data-target="#Codigo">
											<i class="fa fa-barcode" aria-hidden="true"></i>&nbsp;
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
			$('#listaInstalacao').DataTable({
				"bLengthChange": false,"language": {"search":"Pesquisar:","paginate": {"first":"Primeiro","last":"Ultimo","next":"Próximo","previous": "Anterior"}},
				"info": false
			});
		});

		window.onbeforeunload = function() {
			<?php unset($_SESSION['msg']); ?>
			console.log('Dados da session[msg] apagados');
		};

		$(".editar").click(function(){
			var id = $(this).find('.editaID').val();
			var reg = $(this).find('.editaRegional').val();
			var ativ = $(this).find('.editaAtividade').val();
			var cod = $(this).find('.editaCodigo').val();
			var nm = $(this).find('.editaNome').val();
			var tpo = $(this).find('.editaTipo').val();
			var sig = $(this).find('.editaSigla').val();

			$('#idInstalacao').val(id);
			$('#regionalEditar').val(reg);
			$('#atividadeEditar').val(ativ);
			$('#cod_equatorialEditar').val(cod);
			$('#nomeInstalacaoEditar').val(nm);
			$('#tipoInstalacaoEditar').val(tpo);
			$('#siglaInstalacaoEditar').val(sig);
		});

		$(".remover").click(function(){
			var id = $(this).find('.editaID').val();
			$('#idInstalacaoRemover').val(id);
		});

	</script>

	</body>
	</html>

<?php include 'modalInstalacao.php'; ?>