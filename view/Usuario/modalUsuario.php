<!-- Modal Adicionar -->
<div class="modal fade" id="Adicionar" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Adicionar novo item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/UsuarioCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Cadastro">
					<div class="form-group">
						<label for="colaborador" class="col-sm-4 control-label">Nome do colaborador:</label>
						<div class="col-sm-8">
							<select class="form-control" id="colaborador" name="colaborador" required>
								<?php
								foreach ($colab->listarTodosColaborador() as $dado) {
									?>
									<option value="<?php echo $dado['id_colaborador']; ?>"><?php echo $dado['nm_colaborador']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tipo" class="col-sm-4 control-label">Tipo de usuário:</label>
						<div class="col-sm-8">
							<select class="form-control" id="tipo" name="tipo" required>
								<option value="0">CORPORATIVO</option>
								<option value="1">GESTÃO</option>
								<option value="2">OPERAÇÃO</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-4 control-label">Senha de acesso:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password" name="password" pattern=".{5,}" required maxlength="15">
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
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/UsuarioCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Editar">
					<input type="hidden" name="idUsuarioEditar" id="idUsuarioEditar">
					<div class="form-group">
						<label for="colaboradorEditar" class="col-sm-4 control-label">Nome do colaborador:</label>
						<div class="col-sm-8">
							<select class="form-control" id="colaboradorEditar" name="colaboradorEditar" required>
								<?php
								foreach ($colab->listarTodosColaborador() as $dado) {
									?>
									<option value="<?php echo $dado['id_colaborador']; ?>"><?php echo $dado['nm_colaborador']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tipoEditar" class="col-sm-4 control-label">Tipo de usuário:</label>
						<div class="col-sm-8">
							<select class="form-control" id="tipoEditar" name="tipoEditar" required>
								<option value="0">CORPORATIVO</option>
								<option value="1">GESTÃO</option>
								<option value="2">OPERAÇÃO</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="passwordEditar" class="col-sm-4 control-label">Senha de acesso:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="passwordEditar" name="passwordEditar" pattern=".{5,}" required maxlength="15">
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
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/UsuarioCtrl.php" method="post">
					<input type="hidden" name="sOP" value="Deletar">
					<input type="hidden" name="idUsuarioRemover" id="idUsuarioRemover">
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