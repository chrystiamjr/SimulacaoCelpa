<!-- Modal Adicionar -->
<div class="modal fade" id="Adicionar" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Adicionar novo item</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="/SimulacaoCelpa/controller/veiculoCtrl.php" method="post" style="text-orientation:">
						<input type="hidden" name="sOP" value="Cadastro">
							<div class="form-group">
								<label for="placaVeiculo" class="col-sm-4 control-label">Placa do veículo:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="placaVeiculo" name="placa" required>
								</div>
							</div>
							<div class="form-group">
								<label for="tipoVeiculo" class="col-sm-4 control-label">Tipo do veículo:</label>
								<div class="col-sm-8">
									<select class="form-control" id="tipoVeiculo" name="tipo" required>
									  <option value="0">CARRO</option>
									  <option value="1">MOTO</option>
									</select>
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
						<form class="form-horizontal" action="/SimulacaoCelpa/controller/veiculoCtrl.php" method="post">
							<input type="hidden" name="sOP" value="Editar">
							<input type="hidden" name="idVeiculo" id="idVeiculo">
							<div class="form-group">
								<label for="placaVeiculoEditar" class="col-sm-4 control-label">Placa do veículo:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="placaVeiculoEditar" name="placa" required>
								</div>
							</div>
							<div class="form-group">
								<label for="tipoVeiculoEditar" class="col-sm-4 control-label">Tipo do veículo:</label>
								<div class="col-sm-8">
									<select class="form-control" id="tipoVeiculoEditar" name="tipoEditar" required>
									  <option value="0">CARRO</option>
									  <option value="1">MOTO</option>
									</select>
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
						<form class="form-horizontal" action="/SimulacaoCelpa/controller/veiculoCtrl.php" method="post">
							<input type="hidden" name="sOP" value="Deletar">
							<input type="hidden" name="idVeiculo" id="idVeiculoRemover">
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