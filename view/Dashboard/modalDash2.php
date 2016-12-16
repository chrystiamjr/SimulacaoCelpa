
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
						<select name="idEquipeRemover" style="margin-left: 25%;width: 50%">
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

<!-- Modal Listar todos colaboradores baseado em uma equipe -->
<div tabindex="-1" class="modal fade" id="listarColaboradoresPorEquipes">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Listagem de Colaboradores por Equipe</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="content">
						<table class="table table-bordered" id="listaRelacionamentoColaboradorPorEquipe">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">Nome do Colaborador</th>
								<th style="color: white; text-align: center;">CPF do Colaborador</th>
								<th style="color: white; text-align: center;">Matrícula</th>
								<th style="color: white; text-align: center;">#</th>
							</tr>
							</thead>
							<tbody id="listagemColab" style="text-align: center"></tbody>
						</table>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Listar todos EPI baseado em um colaborador -->
<div tabindex="-1" class="modal fade" id="listaEPIPorColaborador" role="dialog" aria-labelledby="myModalLabel" style="width: auto">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Listagem de EPIs por Colaborador</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="content">
						<table class="table table-bordered" id="listaRelacionamentoEPIPorColaborador">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">Código do Equipamento</th>
								<th style="color: white; text-align: center;">Tipo</th>
								<th style="color: white; text-align: center;">Descrição</th>
<!--								<th style="color: white; text-align: center;">#</th>-->
							</tr>
							</thead>
							<tbody id="listagemEPI" style="text-align: center"></tbody>
						</table>
					</div>
					<br>
					<div class="modal-footer">
						<button class="btn btn-default" id="closeAll">Fechar todas abas</button>
						<button class="btn btn-primary" id="retornar" type="button" data-dismiss="modal">Voltar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Listar todos EPC e Ferramenta baseado em um equipe -->
<div class="modal fade" id="listaEquipamentosPorEquipe" role="dialog" aria-labelledby="myModalLabel" style="width: auto">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Listagem de EPIs por Colaborador</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="content">
						<table class="table table-bordered" id="listaRelacionamentoEquipamentosPorEquipe">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">Código do Equipamento</th>
								<th style="color: white; text-align: center;">Tipo</th>
								<th style="color: white; text-align: center;">Descrição</th>
								<!--								<th style="color: white; text-align: center;">#</th>-->
							</tr>
							</thead>
							<tbody id="listagemEquipamentos" style="text-align: center"></tbody>
						</table>
					</div>
					<br>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>