/**
 * Created by chrys on 16/12/2016.
 */

// Adição de botão de validação para aparelhos
if ($(window).width() < 755) {
  $('#layourFluido').append('<button type="button" class="btn btn-success" id="btnValidar">Validar</button>');
} else {
  $('#btnValidar').remove();
}

// Código para Tela > 750px
var id = [];
var tp_Equip = '';
$('#equipamento').keypress(function (event) {
  var keycode = event.keyCode || event.which;
  if (keycode == '13') {
    if ($.inArray($('#equipamento').val(), id) == -1) {
      id.push($('#equipamento').val());
      $.ajax({
        url: '/SimulacaoCelpa/database/dbRelacionamento.php',
        type: 'post',
        data: {'id': $('#equipamento').val(), 'action': 'equipamentoEPIDisp'},
        datatype: 'json',
        success: function (output) {
          if (output != false && output != 2 && output != 3) {

            $('#equipamento').val('');

            if (output[0].tipo_equipamento == 0) {
              tp_Equip = 'EPI';
            } else if (output[0].tipo_equipamento == 1) {
              tp_Equip = 'EPC';
            } else if (output[0].tipo_equipamento == 2) {
              tp_Equip = 'FERRAMENTA';
            }
            var dados = '';
            dados += '<tr id="itens">';
            dados += '<td style="vertical-align: middle;">' + output[0].id_equipamentos;
            dados += '<input type="hidden" name="id_equipamentos[]" value="' + output[0].id_equipamentos + '"></td>';
            dados += '<td style="vertical-align: middle;">' + tp_Equip + '</td>';
            dados += '<td style="vertical-align: middle;">' + output[0].descricao + '</td>';
            dados += '<td style="vertical-align: middle;font-size: 18px;"><button class="addColaborador removerlinha"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;</button></td>';
            dados += '</tr>';
            $('#dadosColaborador').append(dados);

            $(".removerlinha").click(function () {
              $(this).closest('tr').remove();
            });
          } else if (output == 2) {
            alert('Código já cadastrado no sistema');
            id.splice($.inArray($('#equipamento').val(), id), 1);
            $('#equipamento').val('');
          } else {
            alert('Código não exixtente');
            id.splice($.inArray($('#equipamento').val(), id), 1);
            $('#equipamento').val('');
          }
        }
      });
    } else {
      alert('Dados repetidos!');
      $('#equipamento').val('');
    }
  }
});


// Código para Tela < 750px
var idMob = [];
var tpoMob = "";
$('#btnValidar').click(function () {
  if ($.inArray($('#equipamento').val(), idMob) == -1) {
    idMob.push($('#equipamento').val());
    $.ajax({
      url: '/SimulacaoCelpa/database/dbRelacionamento.php',
      type: 'post',
      data: {'id': $('#equipamento').val(), 'action': 'equipamentoEPIDisp'},
      datatype: 'json',
      success: function (output) {
        if (output != false && output != 2 && output != 3) {

          $('#equipamento').val('');

          if (output[0].tipo_equipamento == 0) {
            tpoMob = 'EPI';
          } else if (output[0].tipo_equipamento == 1) {
            tpoMob = 'EPC';
          } else if (output[0].tipo_equipamento == 2) {
            tpoMob = 'FERRAMENTA';
          }
          var dados = '';
          dados += '<tr id="itens">';
          dados += '<td style="vertical-align: middle;">' + output[0].id_equipamentos;
          dados += '<input type="hidden" name="id_equipamentos[]" value="' + output[0].id_equipamentos + '"></td>';
          dados += '<td style="vertical-align: middle;">' + tpoMob + '</td>';
          dados += '<td style="vertical-align: middle;">' + output[0].descricao + '</td>';
          dados += '<td style="vertical-align: middle;font-size: 18px;"><button class="addColaborador removerlinha"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;</button></td>';
          dados += '</tr>';
          $('#dadosColaborador').append(dados);

          $(".removerlinha").click(function () {
            $(this).closest('tr').remove();
          });
        } else if (output == 2) {
          alert('Código já cadastrado no sistema');
          idMob.splice($.inArray($('#equipamento').val(), idMob), 1);
          $('#equipamento').val('');
        } else {
          alert('Código não exixtente');
          idMob.splice($.inArray($('#equipamento').val(), idMob), 1);
          $('#equipamento').val('');
        }
      }
    });
  } else {
    alert('Dados repetidos!');
    $('#equipamento').val('');
  }
});