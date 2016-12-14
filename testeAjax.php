<!-- jQuery -->
<script src="/SimulacaoCelpa/js/jquery.js"></script>

<script>
	$.ajax({
		url: '/SimulacaoCelpa/database/dbRelacionamento.php',
		type: 'post',
		data: {'id': 1000000 , 'action': 'colaborador'},
		datatype: 'json',
		success: function(output) {
			console.log(output);
		}
	});
</script>