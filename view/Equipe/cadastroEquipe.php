
<?php
require_once "../../database/dbEquipe.php";
require_once "../../database/dbAtividade.php";
require_once "../../database/dbVeiculo.php";
require_once "../../database/dbRegional.php";
$eqp = new dbEquipe();
$ativ = new dbAtividade();
$veic = new dbVeiculo();
$reg = new dbRegional();
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>Cadastro - Equipes</title>
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
			.addEquipe{
				color: #31708f;
				background-color: transparent;
				border:none;
			}
			.addEquipe:hover{
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
				<h2 class="pull-left" style=" color: white">Equipes
					<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Cadastro de equipes</span>
				</h2>
				<!-- Breadcrumb -->
				<div class="bread-crumb pull-right">
					<a href="/SimulacaoCelpa/view/Dashboard/dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
					<!-- Divider -->
					<span class="divider">/</span>
					<a href="#" class="bread-current" style=" color: white">Equipes</a>
				</div>
				<div class="clearfix"></div>
			</div> <!--/ Page heading ends -->

			<div class="matter">
				<div class="container">
					<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>

					<div class="col-md-12">
						<div class="pull-right" style="margin-right: 10px;margin-bottom: 10px; font-size: 40px;">
							<button type="button" class="addEquipe" data-toggle="modal" data-target="#Adicionar">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
							</button>
						</div>
						<table class="table table-bordered" id="listaEquipe">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;vertical-align: middle">#</th>
								<th style="color: white; text-align: center;vertical-align: middle">Atividade</th>
								<th style="color: white; text-align: center;vertical-align: middle">Veículo</th>
								<th style="color: white; text-align: center;vertical-align: middle">Regional</th>
								<th style="color: white; text-align: center;vertical-align: middle">Código Equatorial</th>
								<th style="color: white; text-align: center;vertical-align: middle">Nome da equipe</th>
								<th style="color: white; text-align: center;vertical-align: middle">Ações</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($eqp->listarTodosEquipe() != null){ foreach ($eqp->listarTodosEquipe() as $dado) { ?>
								<tr style="font-size: 12px">
									<td style="vertical-align: middle;"><?php echo $dado['id_equipes']; ?></td>
									<td style="vertical-align: middle;"><?php echo $ativ->listarUmAtividade($dado['id_atividades'])[0]['descricao'] ?></td>
									<td style="vertical-align: middle;"><?php
										if($veic->listarUmVeiculo($dado['id_veiculo'])[0]['tpo_veiculo'] == 0){ echo "CARRO : ".$veic->listarUmVeiculo($dado['id_veiculo'])[0]['placa'];}
										elseif($veic->listarUmVeiculo($dado['id_veiculo'])[0]['tpo_veiculo'] == 1){ echo "MOTO : ".$veic->listarUmVeiculo($dado['id_veiculo'])[0]['placa'];}
									?></td>
									<td style="vertical-align: middle;"><?php echo $reg->listarUmRegional($dado['id_regional'])[0]['nm_regional']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['cod_equatorial']; ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['nm_equipe']; ?></td>
									<td style="vertical-align: middle;font-size: 18px;">
										<button class="addEquipe editar" title="Editar" style="margin: 0" data-toggle="modal" data-target="#Editar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_equipes']; ?>">
											<input type="hidden" class="editaAtividade" value="<?php echo $dado['id_atividades']; ?>">
											<input type="hidden" class="editaVeiculo" value="<?php echo $dado['id_veiculo']; ?>">
											<input type="hidden" class="editaRegional" value="<?php echo $dado['id_regional']; ?>">
											<input type="hidden" class="editaCodigo" value="<?php echo $dado['cod_equatorial']; ?>">
											<input type="hidden" class="editaNome" value="<?php echo $dado['nm_equipe']; ?>">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addEquipe remover" title="Remover" style="margin: 0" data-toggle="modal" data-target="#Deletar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_equipes']; ?>">
											<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addEquipe codigo" title="Código de Barras" style="margin: 0;" data-toggle="modal" data-target="#Codigo">
											<input type="hidden" class="codigoNome" value="<?php echo $dado['nm_equipe']; ?>">
											<input type="hidden" class="codigoAtividade" value="<?php echo $ativ->listarUmAtividade($dado['id_atividades'])[0]['descricao']; ?>">
											<input type="hidden" class="codigoMembros" value="<?php echo $eqp->contagemMembrosEquipe($dado['id_equipes'])[0]['membros']; ?>">
											<input type="hidden" class="codigoEquatorial" value="<?php echo $dado['cod_equatorial']; ?>">
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
			$('#listaEquipe').DataTable({
				"bLengthChange": false,"language": {"search":"Pesquisar:","paginate": {"first":"Primeiro","last":"Ultimo","next":"Próximo","previous": "Anterior"}},
				"info": false
			});
		});

		window.onbeforeunload = function() {
			<?php unset($_SESSION['msg']); ?>
			console.log('Dados da session[msg] apagados');
		}

		$(".editar").click(function(){
			var id = $(this).find('.editaID').val();
			var ativ = $(this).find('.editaAtividade').val();
			var veic = $(this).find('.editaVeiculo').val();
			var reg = $(this).find('.editaRegional').val();
			var cod = $(this).find('.editaCodigo').val();
			var nm = $(this).find('.editaNome').val();

			$('#idEquipe').val(id);
			$('#atividadeEditar').val(ativ);
			$('#veiculoEditar').val(veic);
			$('#regionalEditar').val(reg);
			$('#cod_equatorialEditar').val(cod);
			$('#nomeEditar').val(nm);
		});

		$(".remover").click(function(){
			var id = $(this).find('.editaID').val();
			$('#idEquipeRemover').val(id);
		});

		var nomeCodigo = "";
		var atividadeCodigo = "";
		var mebroCodigo = "";
		var codigoCodigo = "";

		$(".codigo").click(function(){
			if(nomeCodigo != $(this).find('.codigoNome').val() &&
				atividadeCodigo != $(this).find('.codigoAtividade').val() &&
				mebroCodigo != $(this).find('.codigoMembros').val() &&
				codigoCodigo != $(this).find('.codigoEquatorial').val())
			{
				$('#dadosEquipe #itens').remove();

				nomeCodigo = $(this).find('.codigoNome').val();
				atividadeCodigo = $(this).find('.codigoAtividade').val();
				mebroCodigo = $(this).find('.codigoMembros').val();
				codigoCodigo = $(this).find('.codigoEquatorial').val();

				var dados = '';
					dados += '<div id="itens">'
						dados += '<h5 id="printNomeEquipe"></h5>';
						dados += '<h5 id="printAtividadeEquipe"></h5>';
						dados += '<h5 id="printMembrosEquipe"></h5>';
						dados += '<hr>';
						dados += '<div id="barcodecontainer">';
							dados += '<div id="barcode"></div>';
						dados += '</div>';
					dados += '</div>';
				$('#dadosEquipe').append(dados);

				$('#barcode').append(DrawHTMLBarcode_Code39ASCII(codigoCodigo,1,"yes","in",0,3,1,3,"bottom","center","","black","white"));
				$('#printNomeEquipe').append("Nome da Equipe: "+nomeCodigo);
				$('#printAtividadeEquipe').append("Atividade: "+atividadeCodigo);
				$('#printMembrosEquipe').append("Membros: "+mebroCodigo);

				$('#imprimirCodigo').on('click', function(){$("#Codigo").print({addGlobalStyles : true,stylesheet : null,rejectWindow : true,noPrintSelector : ".no-print",append : null,prepend : null});});
			}
		});

	</script>

	</body>
	</html>

<?php include 'modalEquipe.php'; ?>