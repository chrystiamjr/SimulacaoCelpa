<!-- Modal Adicionar -->
<div class="modal fade" id="Adicionar" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Adicionar novo item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/colaboradorCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Cadastro">
					<div class="form-group">
						<label for="distribuidora" class="col-sm-4 control-label">Distribuidora:</label>
						<div class="col-sm-8">
							<select class="form-control" id="distribuidora" name="distribuidora" required>
								<?php
								foreach ($distribuidora->listarTodosDistribuidora() as $dado) {
									?>
									<option value="<?php echo $dado['id_distribuidora']; ?>"><?php echo $dado['nm_distribuidora']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="diretoria" class="col-sm-4 control-label">Diretoria:</label>
						<div class="col-sm-8">
							<select class="form-control" id="diretoria" name="diretoria" required>
								<?php
								foreach ($diretoria->listarTodosDiretoria() as $dado) {
									?>
									<option value="<?php echo $dado['id_diretoria']; ?>"><?php echo $dado['nm_diretoria']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="gerencia" class="col-sm-4 control-label">Gerência Executiva:</label>
						<div class="col-sm-8">
							<select class="form-control" id="gerencia" name="gerencia" required>
								<?php
								foreach ($gerencia->listarTodosGerenciaExecutiva() as $dado) {
									?>
									<option value="<?php echo $dado['id_gerencia_executiva']; ?>"><?php echo $dado['nm_gerencia']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="area" class="col-sm-4 control-label">Área Executiva:</label>
						<div class="col-sm-8">
							<select class="form-control" id="area" name="area" required>
								<?php
								foreach ($area->listarTodosAreaExecutiva() as $dado) {
									?>
									<option value="<?php echo $dado['id_area_executiva']; ?>"><?php echo $dado['nm_area_executiva']; ?></option>
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
								foreach ($regional->listarTodosRegional() as $dado) {
									?>
									<option value="<?php echo $dado['id_regional']; ?>"><?php echo $dado['nm_regional']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="nome" class="col-sm-4 control-label">Nome do colaborador:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nome" name="nome" required>
						</div>
					</div>
					<div class="form-group">
						<label for="cpf" class="col-sm-4 control-label">CPF:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="cpf" name="cpf" pattern=".{14,}" required maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
						</div>
					</div>
					<div class="form-group">
						<label for="matricula" class="col-sm-4 control-label">Matrícula:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="matricula" name="matricula" maxlength="11">
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
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/colaboradorCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Editar">
					<input type="hidden" name="idColaborador" id="idColaborador">
					<div class="form-group">
						<label for="distribuidoraEditar" class="col-sm-4 control-label">Distribuidora:</label>
						<div class="col-sm-8">
							<select class="form-control" id="distribuidoraEditar" name="distribuidoraEditar" required>
								<?php
								foreach ($distribuidora->listarTodosDistribuidora() as $dado) {
									?>
									<option value="<?php echo $dado['id_distribuidora']; ?>"><?php echo $dado['nm_distribuidora']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="diretoriaEditar" class="col-sm-4 control-label">Diretoria:</label>
						<div class="col-sm-8">
							<select class="form-control" id="diretoriaEditar" name="diretoriaEditar" required>
								<?php
								foreach ($diretoria->listarTodosDiretoria() as $dado) {
									?>
									<option value="<?php echo $dado['id_diretoria']; ?>"><?php echo $dado['nm_diretoria']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="gerenciaEditar" class="col-sm-4 control-label">Gerência Executiva:</label>
						<div class="col-sm-8">
							<select class="form-control" id="gerenciaEditar" name="gerenciaEditar" required>
								<?php
								foreach ($gerencia->listarTodosGerenciaExecutiva() as $dado) {
									?>
									<option value="<?php echo $dado['id_gerencia_executiva']; ?>"><?php echo $dado['nm_gerencia']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="areaEditar" class="col-sm-4 control-label">Área Executiva:</label>
						<div class="col-sm-8">
							<select class="form-control" id="areaEditar" name="areaEditar" required>
								<?php
								foreach ($area->listarTodosAreaExecutiva() as $dado) {
									?>
									<option value="<?php echo $dado['id_area_executiva']; ?>"><?php echo $dado['nm_area_executiva']; ?></option>
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
								foreach ($regional->listarTodosRegional() as $dado) {
									?>
									<option value="<?php echo $dado['id_regional']; ?>"><?php echo $dado['nm_regional']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="nomeEditar" class="col-sm-4 control-label">Nome do colaborador:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nomeEditar" name="nomeEditar" required>
						</div>
					</div>
					<div class="form-group">
						<label for="cpfEditar" class="col-sm-4 control-label">CPF:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="cpfEditar" name="cpfEditar" pattern=".{14,}" required maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
						</div>
					</div>
					<div class="form-group">
						<label for="matriculaEditar" class="col-sm-4 control-label">Matrícula:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="matriculaEditar" name="matriculaEditar" required maxlength="11">
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
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/colaboradorCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Deletar">
					<input type="hidden" name="idColaboradorRemover" id="idColaboradorRemover">
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