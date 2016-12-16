<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Title here -->
	<title>Login - Simulação</title>
	<!-- Description, Keywords and Author -->
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your,Keywords">
	<meta name="author" content="ResponsiveWebInc">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Font awesome CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="shortcut icon" href="/SimulacaoCelpa/img/favicon/favicon.png">
</head>

<body>

<style>
	#overlay {
		background: rgba(255,255,255,0.6);
		color: #666666;
		position: fixed;
		height: 100%;
		width: 100%;
		z-index: 5000;
		top: 0;
		left: 0;
		float: left;
		text-align: center;
		padding-top: 12%;
	}

	.admin-form {
		margin-top: 120px;
	}

	body {
		background: linear-gradient(rgba(0, 0, 0, 0.69), rgba(0, 0, 0, 0.69)),url('img/bg.jpg') no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
</style>

<div id="loader"></div>

<!-- Form area -->
<div class="admin-form">
	<!-- Widget starts -->
	<div class="form-horizontal">
		<div class="widget wblue">
			<!-- Widget head -->
			<div class="widget-head">
				<i class="fa fa-lock"></i> Login
			</div>

			<div class="widget-content">
				<div class="padd">
					<!-- Email -->
					<div class="form-group">
						<label class="control-label col-md-2" for="cpfLogin" style="text-align: center">CPF:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" id="cpfLogin" pattern=".{14,}" required maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" placeholder="CPF">
						</div>
					</div>
					<!-- Password -->
					<div class="form-group">
						<label class="control-label col-md-2" for="inputPassword" style="text-align: center">Senha:</label>
						<div class="col-lg-9">
							<input type="password" class="form-control" id="inputPassword" placeholder="Senha" required>
						</div>
					</div>
					<!-- Remember me checkbox and sign in button -->
					<div class="form-group">
						<div class="pull-right" style="margin-right: 60px">
							<div class="checkbox" >
								<label>
									<input type="checkbox"> Lembre de mim
								</label>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="widget-foot">
				<button type="submit" class="btn btn-primary" id="loginSistema">Entar no sistema</button>
				<button type="reset" class="btn btn-default pull-right">Limpar campos</button>
			</div>
		</div>

	</div>
</div>

<?php include 'includes/scripts.php'?>

<script>
	$("#loginSistema").click(function(){
		var cpf = $('#cpfLogin').val();
		cpf = cpf.split('.').join("");
		cpf = cpf.split('-').join("");
		var senha = $('#inputPassword').val();
		$.ajax({
			url: '/SimulacaoCelpa/database/dbUsuario.php',
			type: 'post',
			data: {'cpf': cpf, 'senha': senha, 'action': 'login'},
			datatype: 'json',
			start: function(){
				var loading = '<div id="overlay"><img src="img/spinner/loader.gif" alt="Loading" /><br/></div>';
				$('#loader').append(loading);
			},
			success: function(data){
				$('#loader#overlay').remove();
				if(data == 1){
					window.location.href = window.location.href+"view/Dashboard/dash2.php";
				}else{
					alert('CPF e senha inválidos ou inexistentes');
					$('#cpfLogin').val("");
					$('#inputPassword').val("");
				}
			}
		});
	})
</script>

</body>
</html>