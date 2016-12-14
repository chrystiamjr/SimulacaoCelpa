<!-- Modal Adicionar -->
<div class="modal fade" id="Adicionar" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Adicionar novo item</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="/SimulacaoCelpa/controller/equipamentoCtrl.php" method="post" style="text-orientation:">
						<input type="hidden" name="sOP" value="Cadastro">
						<div class="form-group">
								<label for="tipoEquipamento" class="col-sm-4 control-label">Tipo do equipamento:</label>
								<div class="col-sm-8">
									<select class="form-control" id="tipoEquipamento" name="tipo" required>
									  <option value="0">EPI</option>
									  <option value="1">EPC</option>
									  <option value="2">FERRAMENTA</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="descricaoEquipamento" class="col-sm-4 control-label">Descrição do equipamento:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="descricaoEquipamento" name="descricao" required>
								</div>
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-primary">Adicionar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Editar -->
	<div class="modal fade" id="Editar" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #31708f;">
					<h4 class="modal-title" id="myModalLabel" style="color: white">
						<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Modificar item</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="/SimulacaoCelpa/controller/equipamentoCtrl.php" method="post">
							<input type="hidden" name="sOP" value="Editar">
							<input type="hidden" name="idEquipamento" id="idEquipamento">
							<div class="form-group">
								<label for="tipoEquipamentoEditar" class="col-sm-4 control-label">Tipo do equipamento:</label>
								<div class="col-sm-8">
									<select class="form-control" id="tipoEquipamentoEditar" name="tipoEditar" required>
									  <option value="0">EPI</option>
									  <option value="1">EPC</option>
									  <option value="2">FERRAMENTA</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="descricaoEquipamentoEditar" class="col-sm-4 control-label">Descrição do equipamento:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="descricaoEquipamentoEditar" name="descricao" required>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary">Alterar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	<!-- Modal Deletar -->
	<div class="modal fade" id="Deletar" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #31708f;">
					<h4 class="modal-title" id="myModalLabel" style="color: white">
						<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="/SimulacaoCelpa/controller/equipamentoCtrl.php" method="post">
							<input type="hidden" name="sOP" value="Deletar">
							<input type="hidden" name="idEquipamento" id="idEquipamentoRemover">
							<div class="content">
								<h4 style="text-align: center;">Deseja remover a entrada?
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary">Remover</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<div class="modal fade" id="Codigo" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Etiqueta de Identificação</h4>
			</div>
			<div class="modal-body">
				<div class="content">
					<div id="dados">
					</div>
				</div>
				<div class="modal-footer no-print">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-default" id="imprimirCodigo">Imprimir</button>
				</div>
			</div>
		</div>
	</div>
</div>