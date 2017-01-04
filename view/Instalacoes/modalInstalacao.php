<!-- Modal Adicionar -->
<div class="modal fade" id="Adicionar" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #31708f;">
        <h4 class="modal-title" id="myModalLabel" style="color: white">
          <i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Adicionar novo item</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="/SimulacaoCelpa/controller/instalacaoCtrl.php" method="post">
          <input type="hidden" name="sOP" value="Cadastro">
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
            <label for="nomeInstalacao" class="col-sm-4 control-label">Nome da instalação:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nomeInstalacao" name="nome" required>
            </div>
          </div>
          <div class="form-group">
            <label for="tipoInstalacao" class="col-sm-4 control-label">Tipo da instalação:</label>
            <div class="col-sm-8">
              <select class="form-control" id="tipoInstalacao" name="tipo" required>
                <option value="0">SUBESTAÇÃO</option> <!-- SE -->
                <option value="1">AGÊNCIA</option> <!-- AG -->
                <option value="2">USINA</option> <!-- US -->
                <option value="3">ALMOXARIFADO</option> <!-- AX -->
                <option value="4 ">OFICINA</option> <!-- OF -->
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="siglaInstalacao" class="col-sm-4 control-label">Sigla:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="siglaInstalacao" name="sigla" pattern=".{2,}" required maxlength="2">
            </div>
          </div>

          <div class="form-group">
            <label for="ativoInstalacao" class="col-sm-4 control-label">Ativo:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="ativoInstalacao" name="ativo[]" required>
            </div>

            <label for="ativoInstalacaoSigla" class="col-sm-1 control-label">Sigla:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="ativoInstalacaoSigla" name="ativoSigla[]" required>
            </div>

            <a href="#" id="addCampos" class="btn btn-primary">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>

            <div id="campos"></div>

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
        <form class="form-horizontal" action="/SimulacaoCelpa/controller/instalacaoCtrl.php" method="post">
          <input type="hidden" name="sOP" value="Editar">
          <input type="hidden" name="idInstalacao" id="idInstalacao">
          <input type="hidden" name="idInstalacaoAtivo" id="idInstalacaoAtivo">
          <input type="hidden" name="cod_equatorialEditar" id="cod_equatorialEditar">
          <input type="hidden" name="cod_equatorialAtivoEditar" id="cod_equatorialAtivoEditar">
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
            <label for="nomeInstalacaoEditar" class="col-sm-4 control-label">Nome da instalação:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nomeInstalacaoEditar" name="nomeEditar" required>
            </div>
          </div>
          <div class="form-group">
            <label for="tipoInstalacaoEditar" class="col-sm-4 control-label">Tipo da instalação:</label>
            <div class="col-sm-8">
              <select class="form-control" id="tipoInstalacaoEditar" name="tipoEditar" required>
                <option value="0">SUBESTAÇÃO</option> <!-- SE -->
                <option value="1">AGÊNCIA</option> <!-- AG -->
                <option value="2">USINA</option> <!-- US -->
                <option value="3">ALMOXARIFADO</option> <!-- AX -->
                <option value="4 ">OFICINA</option> <!-- OF -->
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="siglaInstalacaoEditar" class="col-sm-4 control-label">Sigla:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="siglaInstalacaoEditar" name="siglaEditar" pattern=".{2,}" required maxlength="2">
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
        <form class="form-horizontal" action="/SimulacaoCelpa/controller/instalacaoCtrl.php" method="post">
          <input type="hidden" name="sOP" value="Deletar">
          <input type="hidden" name="idInstalacaoRemover" id="idInstalacaoRemover">
          <input type="hidden" name="idInstalacaoAtivoRemover" id="idInstalacaoAtivoRemover">
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

<!-- Modal Codigo de Barras -->
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

<!-- Modal Listar todos ativos baseado em uma instalacao -->
<div class="modal fade" id="listaAtivosInstalacao" role="dialog" aria-labelledby="myModalLabel" style="width: auto">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #31708f;">
        <h4 class="modal-title" id="myModalLabel" style="color: white">
          <i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Listagem de Ferramentas por Equipe</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
          <div class="content table-responsive">
            <table class="table table-bordered" id="listaAtivosInstalacaoTable">
              <thead style="background-color: rgba(39, 72, 114, 1); font-weight: bold;">
                <tr>
                  <th style="color: white; text-align: center;">ID</th>
                  <th style="color: white; text-align: center;">Nome Ativo</th>
                  <th style="color: white; text-align: center;">Sigla</th>
                  <th style="color: white; text-align: center;">Código Equatorial Ativos</th>
                  <th style="color: white; text-align: center;">#</th>
                </tr>
              </thead>
              <tbody id="listagemAtivos" style="text-align: center"></tbody>
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