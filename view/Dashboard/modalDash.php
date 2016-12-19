<!-- Modal Deletar uma equipe com conteudo -->
<div class="modal fade" id="DeletarUmColaboradorPorEquipe" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Remover item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="/SimulacaoCelpa/controller/dashCtrl.php" method="post">
					<input type="hidden" name="sOP" value="DeletarTudoPorEquipe">
					<input type="hidden" id="id_equipes" name="id_equipes">
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
					<div class="content table-responsive">
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
					<div class="content table-responsive">
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
<div class="modal fade" id="listaEPCPorEquipe" role="dialog" aria-labelledby="myModalLabel" style="width: auto">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Listagem de EPCs por Equipe</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="content table-responsive">
						<table class="table table-bordered" id="listaRelacionamentoEPCPorEquipe">
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

<!-- Modal Listar todos EPC e Ferramenta baseado em um equipe -->
<div class="modal fade" id="listaFerramentaPorEquipe" role="dialog" aria-labelledby="myModalLabel" style="width: auto">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #31708f;">
				<h4 class="modal-title" id="myModalLabel" style="color: white">
					<i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Listagem de Ferramentas por Equipe</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="content table-responsive">
						<table class="table table-bordered" id="listaFerramentaPorEquipeTable">
							<thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
							<tr>
								<th style="color: white; text-align: center;">Código do Equipamento</th>
								<th style="color: white; text-align: center;">Tipo</th>
								<th style="color: white; text-align: center;">Descrição</th>
								<!--								<th style="color: white; text-align: center;">#</th>-->
							</tr>
							</thead>
							<tbody id="listagemFerramentas" style="text-align: center"></tbody>
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