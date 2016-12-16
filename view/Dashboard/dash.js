$(document).ready(function () {
  $('.listaRelacionamento').DataTable({
    "bLengthChange": false,
    "language": {
      "search": "Pesquisar:",
      "paginate": {"first": "Primeiro", "last": "Ultimo", "next": "Próximo", "previous": "Anterior"}
    },
    "info": false,
    "iDisplayLength": 5
  });
  $('#Tab1').hide();
});

$(".removerUmColaboradorPorEquipe").click(function () {
  var id = $(this).find('.idEquipeRemoveColab').val();
  var cpf = $(this).find('.cpfColaboradorRemoveColab').val();

  $('#idEquipeRemoveColab').val(id);
  $('#cpfColaboradorRemoveColab').val(cpf);
});

var toggle1 = true;
$('#compactarTab1').click(function () {
  toggle1 = !toggle1;
  if (toggle1) {
    $("#Tab1").slideUp("slow", function () {
      $('#Tab1').hide();
    });
    $('#compactarTab1 i').remove();
    var dados = '<i class="fa fa-sort-desc" aria-hidden="true"></i>';
    $('#compactarTab1').append(dados);

  }
  else {
    $("#Tab1").slideDown("slow", function () {
      $('#Tab1').show();
    });
    $('#compactarTab1 i').remove();
    var dados = '<i class="fa fa-sort-asc" aria-hidden="true"></i>';
    $('#compactarTab1').append(dados);
  }
});

var globalIDEquipes = "";
var conteudoEquipes = "";
var conteudoEPI = "";

$('.listaColaboradores').click(function () {
  $('#listaEPIPorColaborador, #listarColaboradoresPorEquipes').removeClass('hide');
  globalIDEquipes = $(this).find('.idEquipe').val();
  $('#listagemColab tr').remove();
  conteudoEquipes = "";

  $.ajax({
    url: "/SimulacaoCelpa/database/dbRelacionamento.php",
    data: {"id": globalIDEquipes, "action": 'listarColaboradores'},
    type: "post",
    success: function (data) {
      for (var i = 0; i < data.length; i++) {
        conteudoEquipes += "<tr>";
        conteudoEquipes += "<td>" + data[i].nm_colaborador + "</td>";
        conteudoEquipes += "<td>" + data[i].cpf_colaborador + "</td>";
        conteudoEquipes += "<td>" + data[i].matricula + "</td>";
        conteudoEquipes += "<td>";
        conteudoEquipes += '<button class="relacionamento listaEPIColaborador" title="Listar EPIs" style="margin: 0" href="#listaEPIPorColaborador" data-toggle="modal">';
        conteudoEquipes += '<input type="hidden" class="idColaboradorEPI" value="'+data[i].id_colaborador+'">';
        conteudoEquipes += '<i class="fa fa-wrench" aria-hidden="true"></i>';
        conteudoEquipes += "</button>";
        conteudoEquipes += "</td>";
        conteudoEquipes += "</tr>";
      }
      $('#listagemColab').append(conteudoEquipes);

      $('.listaEPIColaborador').click(function () {
        var colabEPI = $(this).find('.idColaboradorEPI').val();
        conteudoEPI = "";
        $('#listarColaboradoresPorEquipes').addClass('hide');


        $('#retornar').click(function () {
          $('#listarColaboradoresPorEquipes').removeClass('hide');
        });

        $('#closeAll').click(function () {
          $('#listaEPIPorColaborador, #listarColaboradoresPorEquipes').modal('hide');
        });

        $.ajax({
          url: "/SimulacaoCelpa/database/dbRelacionamento.php",
          data: {"id": colabEPI, "action": 'listarEquipamentoPorColaboradorID'},
          type: "post",
          success: function (data) {
            // console.log(data);
            var tipo = "";
            for (var i = 0; i < data.length; i++) {
              if(data[i].tipo_equipamento == 0){tipo = "EPI";}
              else if(data[i].tipo_equipamento == 1){tipo = "EPC";}
              else if(data[i].tipo_equipamento == 2){tipo = "FERRAMENTA";}
              console.log(tipo);
              conteudoEPI += "<tr>";
              conteudoEPI += "<td>" + data[i].id_equipamentos + "</td>";
              conteudoEPI += "<td>" + tipo + "</td>";
              conteudoEPI += "<td>" + data[i].descricao + "</td>";
              // conteudoEquipes += '<td><button class="relacionamento listaEPIColaborador" title="Listar EPIs" style="margin: 0" data-toggle="modal" data-target="#"></button></td>';
              conteudoEPI += "</tr>";
            }
            $('#listagemEPI tr').remove();
            $('#listagemEPI').append(conteudoEPI);
          }
        })
      });

      if (!$.fn.DataTable.isDataTable('#listaRelacionamentoColaboradorPorEquipe')) {
        $('#listaRelacionamentoColaboradorPorEquipe').DataTable({
          "bLengthChange": false,
          "language": {
            "search": "Pesquisar:",
            "paginate": {"first": "Primeiro", "last": "Ultimo", "next": "Próximo", "previous": "Anterior"}
          },
          "info": false,
          "iDisplayLength": 5
        });
      }
    }
  })
});

var conteudoEPC = "";
$('.listaEPCFerramenta').click(function () {
  globalIDEquipes = $(this).find('.idEquipe').val();
  $('#listagemEquipamentos tr').remove();
  conteudoEPCFerramenta = "";

  $.ajax({
    url: "/SimulacaoCelpa/database/dbRelacionamento.php",
    data: {"id": globalIDEquipes, "action": 'listarEquipamentoPorEquipeID'},
    type: "post",
    success: function (data) {
      var tipo = "";
      for (var i = 0; i < data.length; i++) {
        if(data[i].tipo_equipamento == 0){tipo = "EPI";}
        else if(data[i].tipo_equipamento == 1){tipo = "EPC";}
        else if(data[i].tipo_equipamento == 2){tipo = "FERRAMENTA";}
        conteudoEPCFerramenta += "<tr>";
        conteudoEPCFerramenta += "<td>" + data[i].id_equipamentos + "</td>";
        conteudoEPCFerramenta += "<td>" + tipo + "</td>";
        conteudoEPCFerramenta += "<td>" + data[i].descricao + "</td>";
        // conteudoEPCFerramenta += '<td><button class="relacionamento listaEPIColaborador" title="Listar EPIs" style="margin: 0" data-toggle="modal" data-target="#"></button></td>';
        conteudoEPCFerramenta += "</tr>";
      }
      $('#listagemEquipamentos').append(conteudoEPCFerramenta);

      if (!$.fn.DataTable.isDataTable('#listaRelacionamentoEquipamentosPorEquipe')) {
        $('#listaRelacionamentoEquipamentosPorEquipe').DataTable({
          "bLengthChange": false,
          "language": {
            "search": "Pesquisar:",
            "paginate": {"first": "Primeiro", "last": "Ultimo", "next": "Próximo", "previous": "Anterior"}
          },
          "info": false,
          "iDisplayLength": 5
        });
      }
    }
  })
});

var conteudoEPCFerramenta = "";
$('.listaEPCFerramenta').click(function () {
  globalIDEquipes = $(this).find('.idEquipe').val();
  $('#listagemEquipamentos tr').remove();
  conteudoEPCFerramenta = "";

  $.ajax({
    url: "/SimulacaoCelpa/database/dbRelacionamento.php",
    data: {"id": globalIDEquipes, "action": 'listarEquipamentoPorEquipeID'},
    type: "post",
    success: function (data) {
      var tipo = "";
      for (var i = 0; i < data.length; i++) {
        if(data[i].tipo_equipamento == 0){tipo = "EPI";}
        else if(data[i].tipo_equipamento == 1){tipo = "EPC";}
        else if(data[i].tipo_equipamento == 2){tipo = "FERRAMENTA";}
        conteudoEPCFerramenta += "<tr>";
        conteudoEPCFerramenta += "<td>" + data[i].id_equipamentos + "</td>";
        conteudoEPCFerramenta += "<td>" + tipo + "</td>";
        conteudoEPCFerramenta += "<td>" + data[i].descricao + "</td>";
        // conteudoEPCFerramenta += '<td><button class="relacionamento listaEPIColaborador" title="Listar EPIs" style="margin: 0" data-toggle="modal" data-target="#"></button></td>';
        conteudoEPCFerramenta += "</tr>";
      }
      $('#listagemEquipamentos').append(conteudoEPCFerramenta);

      if (!$.fn.DataTable.isDataTable('#listaRelacionamentoEquipamentosPorEquipe')) {
        $('#listaRelacionamentoEquipamentosPorEquipe').DataTable({
          "bLengthChange": false,
          "language": {
            "search": "Pesquisar:",
            "paginate": {"first": "Primeiro", "last": "Ultimo", "next": "Próximo", "previous": "Anterior"}
          },
          "info": false,
          "iDisplayLength": 5
        });
      }
    }
  })
});