  <!-- Modal Adicionar -->
  <div class="modal fade" id="Adicionar" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #31708f;">
        <h4 class="modal-title" id="myModalLabel" style="color: white">
          <i class="fa fa-plus-circle modal-title" aria-hidden="true"></i> Adicionar novo item</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="/SimulacaoCelpa/controller/obraCtrl.php" method="post">
            <input type="hidden" name="sOP" value="Cadastro">
            <div class="form-group">
              <label for="descricaoObra" class="col-sm-4 control-label">Descrição da obra:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="descricaoObra" name="descricao" required>
              </div>
            </div>
            <div class="form-group">
              <label for="siglaObra" class="col-sm-4 control-label">Sigla:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="siglaObra" name="sigla" pattern=".{2,}" required maxlength="2">
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
            <form class="form-horizontal" action="/SimulacaoCelpa/controller/obraCtrl.php" method="post">
              <input type="hidden" name="sOP" value="Editar">
              <input type="hidden" name="idObra" id="idObra">
              <div class="form-group">
                <label for="descricaoObraEditar" class="col-sm-4 control-label">Descrição da obra:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="descricaoObraEditar" name="descricao" required>
                </div>
              </div>
              <div class="form-group">
                <label for="siglaObraEditar" class="col-sm-4 control-label">Sigla:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="siglaObraEditar" name="sigla" pattern=".{2,}" required maxlength="2">
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
            <form class="form-horizontal" action="/SimulacaoCelpa/controller/obraCtrl.php" method="post">
              <input type="hidden" name="sOP" value="Deletar">
              <input type="hidden" name="idObra" id="idObraRemover">
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