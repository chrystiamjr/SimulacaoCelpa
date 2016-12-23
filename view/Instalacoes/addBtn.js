$(function() {

  // Funcão adicionar novos campos em disciplinas
  $('#addCampos').click(function () {
    var linha = '<div class="itens" style="margin-top: 15px">'; // inicio div itens

    linha += '<label for="ativoInstalacao" class="col-sm-4 control-label">Ativo:</label>';
    linha += '<div class="col-sm-4">';
    linha += '<input type="text" class="form-control" id="ativoInstalacao" name="ativo[]" required>';
    linha += '</div>';
    linha += '<label for="ativoInstalacaoSigla" class="col-sm-1 control-label">Sigla:</label>';
    linha += '<div class="col-sm-2">';
    linha += '<input type="text" class="form-control" id="ativoInstalacaoSigla" name="ativoSigla[]" required>';
    linha += '</div>';

    linha += '<a href="#" class="btn btn-danger remove"><i class="fa fa-times" aria-hidden="true"></i></a>';

    linha += '</div>'; // fim div itens

    $('#campos').append(linha);
  });

  $(document).on('click', '.remove', function () {
    $(this).parent().remove();
  });


});


