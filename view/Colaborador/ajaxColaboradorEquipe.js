/**
 * Created by chrys on 16/12/2016.
 */

var id = [];
$('#colaborador').keypress(function(event) {
  var keycode = event.keyCode || event.which;
  if (keycode == '13') {
    if($.inArray($('#colaborador').val(), id) == -1) {
      id.push($('#colaborador').val());
      $.ajax({
        url: '/SimulacaoCelpa/database/dbRelacionamento.php',
        type: 'post',
        data: {'id': $('#colaborador').val(), 'action': 'colaborador'},
        datatype: 'json',
        success: function (output) {
          if (output != false && output != 2 && output != 3) {

            $('#colaborador').val('');

            var dados = '';
            dados += '<tr id="itens">';
            dados += '<td style="vertical-align: middle;">' + output[0].id_colaborador;
            dados += '<input type="hidden" name="id_colaborador[]" value="' + output[0].id_colaborador + '"></td>';
            dados += '<td style="vertical-align: middle;">' + output[0].nm_colaborador + '</td>';
            dados += '<td style="vertical-align: middle;font-size: 18px;"><button class="addColaborador removerlinha"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;</button></td>';
            dados += '</tr>';
            $('#dadosColaborador').append(dados);

            $(".removerlinha").click(function () {
              $(this).closest('tr').remove();
            });
          } else if(output == 2){
            alert('Código já cadastrado no sistema');
            id.splice($.inArray($('#colaborador').val(), id), 1);
            $('#colaborador').val('');
          } else {
            alert('Código não existente');
            id.splice($.inArray($('#colaborador').val(), id), 1);
            $('#colaborador').val('');
          }
        }
      });
    } else{
      alert('Dados repetidos!');
      $('#colaborador').val('');
    }
  }
});

// Adição de botão de validação para aparelhos
if ($(window).width() < 755) {
  $('#layourFluido').append('<button type="button" class="btn btn-success" id="btnValidar">Validar</button>');
} else {
  $('#btnValidar').remove();
}

var idMB = [];
$('#btnValidar').click(function () {
  if($.inArray($('#colaborador').val(), idMB) == -1) {
    idMB.push($('#colaborador').val());
    $.ajax({
      url: '/SimulacaoCelpa/database/dbRelacionamento.php',
      type: 'post',
      data: {'id': $('#colaborador').val(), 'action': 'colaborador'},
      datatype: 'json',
      success: function (output) {

        $('#colaborador').val('');

        if (output != false && output != 2 && output != 3) {
          var dados = '';
          dados += '<tr id="itens">';
          dados += '<td style="vertical-align: middle;">' + output[0].id_colaborador;
          dados += '<input type="hidden" name="id_colaborador[]" value="' + output[0].id_colaborador + '"></td>';
          dados += '<td style="vertical-align: middle;">' + output[0].nm_colaborador + '</td>';
          dados += '<td style="vertical-align: middle;font-size: 18px;"><button class="addColaborador removerlinha"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;</button></td>';
          dados += '</tr>';
          $('#dadosColaborador').append(dados);

          $(".removerlinha").click(function () {
            $(this).closest('tr').remove();
          });
        } else if(output == 2){
          alert('Código já cadastrado no sistema');
          idMB.splice($.inArray($('#colaborador').val(), idMB), 1);
          $('#colaborador').val('');
        } else {
          alert('Código não existente');
          idMB.splice($.inArray($('#colaborador').val(), idMB), 1);
          $('#colaborador').val('');
        }
      }
    });
  } else{
    alert('Dados repetidos!');
    $('#colaborador').val('');
  }
});
