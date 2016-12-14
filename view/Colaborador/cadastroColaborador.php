<?php
require_once "../../database/dbColaborador.php";
require_once "../../database/dbDistribuidora.php";
require_once "../../database/dbDiretoria.php";
require_once "../../database/dbGerenciaExecutiva.php";
require_once "../../database/dbAreaExecutiva.php";
require_once "../../database/dbRegional.php";
$colaborador = new dbColaborador();
$distribuidora = new dbDistribuidora();
$diretoria = new dbDiretoria();
$gerencia = new dbGerenciaExecutiva();
$area = new dbAreaExecutiva();
$regional = new dbRegional();
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>Cadastro - Colaboradores</title>
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
				<h2 class="pull-left" style=" color: white">Colaboradores
					<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Cadastro de colaboradores</span>
				</h2>
				<!-- Breadcrumb -->
				<div class="bread-crumb pull-right">
					<a href="dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
					<!-- Divider -->
					<span class="divider">/</span>
					<a href="#" class="bread-current" style=" color: white">Colaboradores</a>
				</div>
				<div class="clearfix"></div>
			</div> <!--/ Page heading ends -->

			<div class="matter">
				<div class="container" id="conteudoPrincipal">
					<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>

<!--					<div class="col-md-12">-->
						<div class="pull-right" style="margin-right: 10px;margin-bottom: 10px; font-size: 40px;">
							<button type="button" class="addColaborador" data-toggle="modal" data-target="#Adicionar">
								<i class="fa fa-plus-circle" aria-hidden="true"></i>
							</button>
						</div>
						<table class="table table-bordered table-responsive" id="listaColaborador">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;vertical-align: middle">#</th>
								<th style="color: white; text-align: center;vertical-align: middle">Distribuidora</th>
								<th style="color: white; text-align: center;vertical-align: middle">Diretoria</th>
								<th style="color: white; text-align: center;vertical-align: middle">Gerência Executiva</th>
								<th style="color: white; text-align: center;vertical-align: middle">Área Executiva</th>
								<th style="color: white; text-align: center;vertical-align: middle">Regional</th>
								<th style="color: white; text-align: center;vertical-align: middle">Nome do Colaborador</th>
								<th style="color: white; text-align: center;vertical-align: middle">CPF</th>
								<th style="color: white; text-align: center;vertical-align: middle">Matrícula</th>
								<th style="color: white; text-align: center;vertical-align: middle">Ações</th>
							</tr>
							</thead>
							<tbody align="center">
							<?php if($colaborador->listarTodosColaborador() != null){ foreach ($colaborador->listarTodosColaborador() as $dado) { ?>
								<tr style="font-size: 12px">
									<td width="5%" style="vertical-align: middle;"><?php echo $dado['id_colaborador']; ?></td>
									<td width="8%" style="vertical-align: middle;"><?php echo $distribuidora->listarUmDistribuidora($dado['id_distribuidora'])[0]['nm_distribuidora'] ?></td>
									<td style="vertical-align: middle;"><?php echo $diretoria->listarUmDiretoria($dado['id_diretoria'])[0]['nm_diretoria'] ?></td>
									<td style="vertical-align: middle;"><?php echo $gerencia->listarUmGerenciaExecutiva($dado['id_gerencia_executiva'])[0]['nm_gerencia'] ?></td>
									<td style="vertical-align: middle;"><?php echo $area->listarUmAreaExecutiva($dado['id_area_executiva'])[0]['nm_area_executiva'] ?></td>
									<td style="vertical-align: middle;"><?php echo $regional->listarUmRegional($dado['id_regional'])[0]['nm_regional'] ?></td>
									<td style="vertical-align: middle;"><?php echo $dado['nm_colaborador']; ?></td>
									<td style="vertical-align: middle;"><?php
										$d1 = $codSequencial = substr($dado['cpf_colaborador'], 0, 3);
										$d2 = $codSequencial = substr($dado['cpf_colaborador'], 3, 3);
										$d3 = $codSequencial = substr($dado['cpf_colaborador'], 6, 3);
										$d4 = $codSequencial = substr($dado['cpf_colaborador'], 9, 2);
										echo $d1.'.'.$d2.'.'.$d3.'-'.$d4;
									?></td>
									<td style="vertical-align: middle;"><?php echo $dado['matricula']; ?></td>
									<td width="15%" style="vertical-align: middle;font-size: 18px;">
										<button class="addColaborador editar" title="Editar" style="margin: 0" data-toggle="modal" data-target="#Editar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_colaborador']; ?>">
											<input type="hidden" class="editaDistribuidoraID" value="<?php echo $dado['id_distribuidora']; ?>">
											<input type="hidden" class="editaDiretoriaID" value="<?php echo $dado['id_diretoria']; ?>">
											<input type="hidden" class="editaGerenciaID" value="<?php echo $dado['id_gerencia_executiva']; ?>">
											<input type="hidden" class="editaAreaID" value="<?php echo $dado['id_area_executiva']; ?>">
											<input type="hidden" class="editaRegionalID" value="<?php echo $dado['id_regional']; ?>">
											<input type="hidden" class="editaNome" value="<?php echo $dado['nm_colaborador']; ?>">
											<input type="hidden" class="editaCPF" value="<?php echo $dado['cpf_colaborador']; ?>">
											<input type="hidden" class="editaMatricula" value="<?php echo $dado['matricula']; ?>">
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addColaborador remover" title="Remover" style="margin: 0" data-toggle="modal" data-target="#Deletar">
											<input type="hidden" class="editaID" value="<?php echo $dado['id_colaborador']; ?>">
											<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
										</button>
										<button class="addColaborador codigo" title="Código de Barras" style="margin: 0;" data-toggle="modal" data-target="#Codigo">
											<input type="hidden" class="codigoID" value="<?php echo $dado['id_colaborador']; ?>">
											<input type="hidden" class="codigoNome" value="<?php echo $dado['nm_colaborador']; ?>">
											<input type="hidden" class="codigoCPF" value="<?php echo $dado['cpf_colaborador']; ?>">
											<i class="fa fa-barcode" aria-hidden="true"></i>&nbsp;
										</button>
									</td>
								</tr>
							<?php } } ?>
							</tbody>
						</table>
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
				"info": false
			});
		});

		window.onbeforeunload = function() {
			<?php unset($_SESSION['msg']); ?>
			console.log('Dados da session[msg] apagados');
		}

		$(".editar").click(function(){
			var id = $(this).find('.editaID').val();
			var dist = $(this).find('.editaDistribuidoraID').val();
			var dir = $(this).find('.editaDiretoriaID').val();
			var ger = $(this).find('.editaGerenciaID').val();
			var are = $(this).find('.editaAreaID').val();
			var reg = $(this).find('.editaRegionalID').val();
			var nm = $(this).find('.editaNome').val();
			var cpf = $(this).find('.editaCPF').val();
			var mat = $(this).find('.editaMatricula').val();

			$('#idColaborador').val(id);
			$('#distribuidoraEditar').val(dist);
			$('#diretoriaEditar').val(dir);
			$('#gerenciaEditar').val(ger);
			$('#areaEditar').val(are);
			$('#regionalEditar').val(reg);
			$('#nomeEditar').val(nm);
			$('#cpfEditar').val(cpf);
			$('#matriculaEditar').val(mat);
		});

		$(".remover").click(function(){
			var id = $(this).find('.editaID').val();
			$('#idColaboradorRemover').val(id);
		});

		var idCodigo = "";
		var nomeCodigo = "";
		var cpfCodigo = "";

		$(".codigo").click(function(){
			if(idCodigo != $(this).find('.codigoID').val() &&
				nomeCodigo != $(this).find('.codigoNome').val() &&
				cpfCodigo != $(this).find('.codigoCPF').val())
			{
				$('#dados #itens').remove();

				idCodigo = $(this).find('.codigoID').val();
				nomeCodigo = $(this).find('.codigoNome').val();
				cpfCodigo = $(this).find('.codigoCPF').val();

				var dados = '';
				dados += '<div id="itens">'
				dados += '<h5 id="printNomeColaborador"></h5>';
				dados += '<h5 id="printCPFColaborador"></h5>';
				dados += '<hr>';
				dados += '<div id="barcodecontainer">';
				dados += '<div id="barcode"></div>';
				dados += '</div>';
				dados += '</div>';
				$('#dados').append(dados);

				$('#barcode').append(DrawHTMLBarcode_Code39ASCII(idCodigo,1,"yes","in",0,3,1,3,"bottom","center","","black","white"));
				$('#printNomeColaborador').append("Nome do Colaborador: "+nomeCodigo);
				$('#printCPFColaborador').append("CPF: "+cpfCodigo);

				$('#imprimirCodigo').on('click', function(){$("#Codigo").print({addGlobalStyles : true,stylesheet : null,rejectWindow : true,noPrintSelector : ".no-print",append : null,prepend : null});});
			}
		});

	</script>

	</body>
	</html>

<?php include 'modalColaborador.php'; ?>