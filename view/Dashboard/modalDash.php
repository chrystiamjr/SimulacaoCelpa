
<!-- Modal Deletar todos colaboradores baseado em uma equipe -->
<div class="modal fade" id="DeletarTodosColaboradoresPorEquipe" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/dashCtrl.php" method="post">
					<input type="hidden" name="sOP" value="DeletarTodosColaboradoresPorEquipe">
					<div class="content">
						<h4 style="text-align: center;">Deseja remover a entrada?</h4>
						<select name="idEquipeRemover" style="margin-left: 25%;width: 50%";>
							<?php foreach ($equipe->listarTodosEquipe() as $dado) { ?>
								<option value="<?php echo $dado['id_equipes']?>"><?php echo $dado['nm_equipe'] ?></option>
							<?php } ?>
						</select>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Remover</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Deletar um colaborador baseado em uma equipe -->
<div class="modal fade" id="DeletarUmColaboradorPorEquipe" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/dashCtrl.php" method="post">
					<input type="hidden" name="sOP" value="DeletarUmColaboradorPorEquipe">
					<input type="hidden" id="idEquipeRemoveColab" name="id_equipes">
					<input type="hidden" id="cpfColaboradorRemoveColab" name="cpf_colaborador">
					<div class="content">
						<h4 style="text-align: center;">Deseja remover a entrada?</h4>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Remover</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Deletar todos equipamentos baseado em um colaborador -->
<div class="modal fade" id="DeletarTodosEquipamentosPorColaborador" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/dashCtrl.php" method="post">
					<input type="hidden" name="sOP" value="DeletarTodosEquipamentosPorColaborador">
					<div class="content">
						<h4 style="text-align: center;">Deseja remover a entrada?</h4>
						<select name="idColaboradorRemover" style="margin-left: 25%;width: 50%";>
							<?php foreach ($colaborador->listarTodosColaborador() as $dado) { ?>
								<option value="<?php echo $dado['id_colaborador']?>"><?php echo $dado['nm_colaborador'] ?></option>
							<?php } ?>
						</select>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Remover</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Deletar um equipamento baseado em um colaborador -->
<div class="modal fade" id="DeletarUmEquipamentoPorColaborador" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/dashCtrl.php" method="post">
					<input type="hidden" name="sOP" value="DeletarUmEquipamentoPorColaborador">
					<input type="hidden" id="idEquipamentoRemoveEquipamento" name="id_equipamentos">
					<input type="hidden" id="cpfColaboradorRemoveEquipamento" name="cpf_colaborador">
					<div class="content">
						<h4 style="text-align: center;">Deseja remover a entrada?</h4>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Remover</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Deletar todos equipamentos baseado em uma equipe -->
<div class="modal fade" id="DeletarTodosEquipamentosPorEquipe" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/dashCtrl.php" method="post">
					<input type="hidden" name="sOP" value="DeletarTodosEquipamentosPorEquipe">
					<div class="content">
						<h4 style="text-align: center;">Deseja remover a entrada?</h4>
						<select name="idEquipeRemover" style="margin-left: 25%;width: 50%";>
							<?php foreach ($equipe->listarTodosEquipe() as $dado) { ?>
								<option value="<?php echo $dado['id_equipes']?>"><?php echo $dado['nm_equipe'] ?></option>
							<?php } ?>
						</select>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Remover</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Deletar um equipamento baseado em um equipe -->
<div class="modal fade" id="DeletarUmEquipamentoPorEquipe" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/dashCtrl.php" method="post">
					<input type="hidden" name="sOP" value="DeletarUmEquipamentoPorEquipe">
					<input type="hidden" id="idEquipamentoRemoveEquipe" name="id_equipamentos">
					<input type="hidden" id="equatorialRemoveEquipe" name="cod_equatorial">
					<div class="content">
						<h4 style="text-align: center;">Deseja remover a entrada?</h4>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Remover</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>