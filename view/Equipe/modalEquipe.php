<!-- Modal Adicionar -->
<div class="modal fade" id="Adicionar" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Adicionar novo item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/equipeCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Cadastro">
					<div class="form-group">
						<label for="atividade" class="col-sm-4 control-label">Atividade:</label>
						<div class="col-sm-8">
							<select class="form-control" id="atividade" name="atividade" required>
								<?php
								foreach ($ativ->listarTodosAtividade() as $dado) {
									?>
									<option value="<?php echo $dado['id_atividades']; ?>"><?php echo $dado['descricao']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="veiculo" class="col-sm-4 control-label">Veículo:</label>
						<div class="col-sm-8">
							<select class="form-control" id="veiculo" name="veiculo" required>
								<?php
								foreach ($veic->listarTodosVeiculo() as $dado) {
									?>
									<option value="<?php echo $dado['id_veiculo']; ?>">
										<?php
										if($dado['tpo_veiculo'] == 0){ echo "CARRO : ".$dado['placa'];}
										elseif($dado['tpo_veiculo'] == 1){ echo "MOTO : ".$dado['placa'];}
										?>
									</option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="regional" class="col-sm-4 control-label">Regional:</label>
						<div class="col-sm-8">
							<select class="form-control" id="regional" name="regional" required>
								<?php
								foreach ($reg->listarTodosRegional() as $dado) {
									?>
									<option value="<?php echo $dado['id_regional']; ?>"><?php echo $dado['nm_regional']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="nome" class="col-sm-4 control-label">Nome da equipe:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nome" name="nome" required>
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
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/equipeCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Editar">
					<input type="hidden" name="idEquipe" id="idEquipe">
					<input type="hidden" name="cod_equatorialEditar" id="cod_equatorialEditar">
					<div class="form-group">
						<label for="atividadeEditar" class="col-sm-4 control-label">Atividade:</label>
						<div class="col-sm-8">
							<select class="form-control" id="atividadeEditar" name="atividadeEditar" required>
								<?php
								foreach ($ativ->listarTodosAtividade() as $dado) {
									?>
									<option value="<?php echo $dado['id_atividades']; ?>"><?php echo $dado['descricao']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="veiculoEditar" class="col-sm-4 control-label">Veículo:</label>
						<div class="col-sm-8">
							<select class="form-control" id="veiculoEditar" name="veiculoEditar" required>
								<?php
								foreach ($veic->listarTodosVeiculo() as $dado) {
									?>
									<option value="<?php echo $dado['id_veiculo']; ?>">
										<?php
										if($dado['tpo_veiculo'] == 0){ echo "CARRO : ".$dado['placa'];}
										elseif($dado['tpo_veiculo'] == 1){ echo "MOTO : ".$dado['placa'];}
										?>
									</option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="regionalEditar" class="col-sm-4 control-label">Regional:</label>
						<div class="col-sm-8">
							<select class="form-control" id="regionalEditar" name="regionalEditar" required>
								<?php
								foreach ($reg->listarTodosRegional() as $dado) {
									?>
									<option value="<?php echo $dado['id_regional']; ?>"><?php echo $dado['nm_regional']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="nomeEditar" class="col-sm-4 control-label">Nome da equipe:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nomeEditar" name="nomeEditar" required>
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
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/equipeCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Deletar">
					<input type="hidden" name="idEquipeRemover" id="idEquipeRemover">
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
					<div id="dadosEquipe">
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