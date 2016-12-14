<?php
require_once "../../database/dbColaborador.php";
$colaborador = new dbColaborador();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Title here -->
	<title>Relacionamento - Colaboradores e Equipamentos</title>
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
				<span class="page-meta" style=" color: white"><i class="fa fa-user-circle" aria-hidden="true"></i> Relacionamento de colaboradores para equipamentos</span>
			</h2>
			<!-- Breadcrumb -->
			<div class="bread-crumb pull-right">
				<a href="dash.php" style=" color: white"><i class="fa fa-home"></i> Página Inicial</a>
				<!-- Divider -->
				<span class="divider">/</span>
				<a href="#" class="bread-current" style=" color: white">Relacionamento Colaborador</a>
			</div>
			<div class="clearfix"></div>
		</div> <!--/ Page heading ends -->

		<div class="matter">
			<div class="container" id="conteudoPrincipal">
				<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];} ?>

				<div class="col-md-12">
					<div class="form-group">
						<label for="colaborador" class="col-sm-2 control-label" style="text-align: center !important">Colaborador:</label>
						<div class="col-sm-10">
							<select class="form-control" id="colaborador" required>
								<?php
								foreach ($colaborador->listarTodosColaborador() as $dado) {
									?>
									<option value="<?php echo $dado['id_colaborador']; ?>"><?php echo $dado['nm_colaborador']; ?></option>
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

					<br><br>
					<hr>
					<br>

				</div>

				<form method="post" action="/SimulacaoCelpa/controller/relacionamentoCtrl.php">
					<input type="hidden" name="tipo" value="colaboradorEquipamento">
					<input type="hidden" name="id_colaborador" id="id_colaborador">
					<table class="table table-bordered table-responsive" id="listaColaborador">
						<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
						<tr>
							<th style="color: white; text-align: center;vertical-align: middle">Código</th>
							<th style="color: white; text-align: center;vertical-align: middle">Tipo</th>
							<th style="color: white; text-align: center;vertical-align: middle">Descrição</th>
							<th style="color: white; text-align: center;vertical-align: middle">Ações</th>
						</tr>
						</thead>
						<tbody id="dadosColaborador" align="center"></tbody>
					</table>

					<br>
					<hr>
					<br>
					<button class="btn btn-success pull-right" type="submit" style="margin-right: 20px; width: 120px">Salvar</button>
				</form>


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
		$('#dadosColaborador tr').remove();
	});

	window.onbeforeunload = function() {
		<?php unset($_SESSION['msg']); ?>
		console.log('Dados da session[msg] apagados');
	}

	$('#id_colaborador').val($('#colaborador').val());

	$('#colaborador').on('change', function(){
		var id_equipe = $('#colaborador').val();
		$('#id_colaborador').val(id_equipe);
	});

	var id = new Array();
	var tp_Equip = '';
	$('#equipamento').keypress(function(event) {
		var keycode = event.keyCode || event.which;
		if (keycode == '13') {
			if($.inArray($('#equipamento').val(), id) == -1) {
				id.push($('#equipamento').val());
				$.ajax({
					url: '/SimulacaoCelpa/database/dbRelacionamento.php',
					type: 'post',
					data: {'id': $('#equipamento').val(), 'action': 'equipamento'},
					datatype: 'json',
					success: function (output) {
						console.log(output);
						if(output != false){
							if(output[0].tipo_equipamento == 0){
								tp_Equip = 'EPI';
							}else if(output[0].tipo_equipamento == 1){
								tp_Equip = 'EPC';
							}else if(output[0].tipo_equipamento == 2){
								tp_Equip = 'FERRAMENTA';
							}
							var dados = '';
							dados += '<tr id="itens">';
							dados += '<td style="vertical-align: middle;">' + output[0].id_equipamentos;
							dados += '<input type="hidden" name="id_equipamentos[]" value="' + output[0].id_equipamentos+ '"></td>';
							dados += '<td style="vertical-align: middle;">' + tp_Equip + '</td>';
							dados += '<td style="vertical-align: middle;">' + output[0].descricao + '</td>';
							dados += '<td style="vertical-align: middle;font-size: 18px;"><button class="addColaborador removerlinha"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;</button></td>';
							dados += '</tr>';
							$('#dadosColaborador').append(dados);

							$(".removerlinha").click(function () {
								$(this).closest('tr').remove();
							});
						} else {
							alert('Código não existente!');
							id.splice( $.inArray($('#equipamento').val(), id), 1 );
						}
					}
				});
			} else{
				alert('Dados repetidos!');
			}
			$('#equipamento').val('');
		}
	});
</script>

</body>
</html>