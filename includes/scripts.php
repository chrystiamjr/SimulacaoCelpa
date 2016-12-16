<!-- jQuery -->
<script src="/SimulacaoCelpa/js/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="/SimulacaoCelpa/js/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="/SimulacaoCelpa/js/jquery-ui.min.js"></script>
<!-- jQuery Flot -->
<script src="/SimulacaoCelpa/js/excanvas.min.js"></script>
<script src="/SimulacaoCelpa/js/jquery.flot.js"></script>
<script src="/SimulacaoCelpa/js/jquery.flot.resize.js"></script>
<script src="/SimulacaoCelpa/js/jquery.flot.pie.js"></script>
<script src="/SimulacaoCelpa/js/jquery.flot.stack.js"></script>
<!-- Sparklines -->
<script src="/SimulacaoCelpa/js/sparklines.js"></script>
<!-- jQuery Gritter -->
<!-- <script src="js/jquery.gritter.min.js"></script> -->
<!-- Respond JS for IE8 -->
<script src="/SimulacaoCelpa/js/respond.min.js"></script>
<!-- HTML5 Support for IE -->
<script src="/SimulacaoCelpa/js/html5shiv.js"></script>
<!-- Custom JS -->
<script src="/SimulacaoCelpa/js/custom.js"></script>

<!-- Script for this page -->
<script src="/SimulacaoCelpa/js/sparkline-index.js"></script>

<script src="/SimulacaoCelpa/js/jQuery.print.js"></script>

<!-- <script src="js/dataTables.min.js"></script> -->
<script type="text/javascript" src="/SimulacaoCelpa/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/SimulacaoCelpa/js/dataTables.bootstrap.min.js"></script>

<script src="/SimulacaoCelpa/js/code39ascii.js"></script>

<script>
	function formatar(mascara, documento) {
		var i = documento.value.length;
		var saida = mascara.substring(0, 1);
		var texto = mascara.substring(i);

		if (texto.substring(0, 1) != saida) {
			documento.value += texto.substring(0, 1);
		}
	}
</script>

<style>
	.hideSidebar {
		margin-left: 20px;
		margin-right: 20px;
	}
</style>

<script type="text/javascript">
	var toggle = false;
	$('#ShowHide').click(toggleBar);

	function toggleBar() {
		toggle = !toggle;
		if (toggle) {
			$('.mainbar').animate({marginLeft: "0"});
			$('.sidebar').animate({left: -400});
			$('div.matter').find('.container').addClass("hideSidebar");
			$('div.matter').find('.container').removeClass("container");
		}
		else {
			$('.mainbar').animate({marginLeft: "230px"},400);
			$('.sidebar').animate({left: 0});
			$('div.matter').find('.container').removeClass("hideSidebar");
		}
	}

	if ($(window).width() < 755) {
		toggle = false;
		$('div.matter').find('.container').removeClass("hideSidebar");
		$('#ShowHide').hide();
	}

	$(window).resize(function() {
//		console.log($(window).width());
		if ($(window).width() < 755) {
			toggle = false;
			$('div.matter').find('.container').removeClass("hideSidebar");
			$('#ShowHide').hide();
		} else{
			$('#ShowHide').show();
		}
	});
</script>

<script>

</script>