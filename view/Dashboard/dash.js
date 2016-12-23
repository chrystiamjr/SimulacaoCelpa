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
  $('#Tab2').hide();
});

$(".removerTudoPorEquipe").click(function () {
  var id = $(this).find('.idEquipeRemoveAll').val();

  $('#id_equipes').val(id);
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

var toggle2 = true;
$('#compactarTab2').click(function () {
  toggle2 = !toggle2;
  if (toggle2) {
    $("#Tab2").slideUp("slow", function () {
      $('#Tab2').hide();
    });
    $('#compactarTab2 i').remove();
    var dados = '<i class="fa fa-sort-desc" aria-hidden="true"></i>';
    $('#compactarTab2').append(dados);

  }
  else {
    $("#Tab2").slideDown("slow", function () {
      $('#Tab2').show();
    });
    $('#compactarTab2 i').remove();
    var dados = '<i class="fa fa-sort-asc" aria-hidden="true"></i>';
    $('#compactarTab2').append(dados);
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
        conteudoEquipes += '<button class="relacionamento listaEPIColaborador" title="Listar EPIs" style="margin: 0;font-size: 25px;" href="#listaEPIPorColaborador" data-toggle="modal" data-backdrop="static" data-keyboard="false">';
        conteudoEquipes += '<input type="hidden" class="idColaboradorEPI" value="'+data[i].id_colaborador+'">';
        conteudoEquipes += '<i class="fa fa-sign-language" aria-hidden="true"></i>';
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

            if (!$.fn.DataTable.isDataTable('#listaRelacionamentoEPIPorColaborador')) {
              $('#listaRelacionamentoEPIPorColaborador').DataTable({
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
$('.listaEPC').click(function () {
  globalIDEquipes = $(this).find('.idEquipe').val();
  $('#listagemEquipamentos tr').remove();
  conteudoEPC = "";

  $.ajax({
    url: "/SimulacaoCelpa/database/dbRelacionamento.php",
    data: {"id": globalIDEquipes, "action": 'listarEPCPorEquipeID'},
    type: "post",
    success: function (data) {
      // console.log(data);
      var tipo = "";
      for (var i = 0; i < data.length; i++) {
        if(data[i].tipo_equipamento == 0){tipo = "EPI";}
        else if(data[i].tipo_equipamento == 1){tipo = "EPC";}
        else if(data[i].tipo_equipamento == 2){tipo = "FERRAMENTA";}
        conteudoEPC += "<tr>";
        conteudoEPC += "<td>" + data[i].id_equipamentos + "</td>";
        conteudoEPC += "<td>" + tipo + "</td>";
        conteudoEPC += "<td>" + data[i].descricao + "</td>";
        // conteudoEPC += '<td><button class="relacionamento listaEPIColaborador" title="Listar EPIs" style="margin: 0" data-toggle="modal" data-target="#"></button></td>';
        conteudoEPC += "</tr>";
      }
      $('#listagemEquipamentos').append(conteudoEPC);

      if (!$.fn.DataTable.isDataTable('#listaRelacionamentoEPCPorEquipe')) {
        $('#listaRelacionamentoEPCPorEquipe').DataTable({
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

var conteudoFerramenta = "";
$('.listaFerramenta').click(function () {
  globalIDEquipes = $(this).find('.idEquipe').val();
  $('#listagemFerramentas tr').remove();
  conteudoFerramenta = "";

  $.ajax({
    url: "/SimulacaoCelpa/database/dbRelacionamento.php",
    data: {"id": globalIDEquipes, "action": 'listarFerramentaPorEquipeID'},
    type: "post",
    success: function (data) {
      console.log(data);
      var tipo = "";
      for (var i = 0; i < data.length; i++) {
        if(data[i].tipo_equipamento == 0){tipo = "EPI";}
        else if(data[i].tipo_equipamento == 1){tipo = "EPC";}
        else if(data[i].tipo_equipamento == 2){tipo = "FERRAMENTA";}
        conteudoFerramenta += "<tr>";
        conteudoFerramenta += "<td>" + data[i].id_equipamentos + "</td>";
        conteudoFerramenta += "<td>" + tipo + "</td>";
        conteudoFerramenta += "<td>" + data[i].descricao + "</td>";
        // conteudoFerramenta += '<td><button class="relacionamento listaEPIColaborador" title="Listar EPIs" style="margin: 0" data-toggle="modal" data-target="#"></button></td>';
        conteudoFerramenta += "</tr>";
      }
      $('#listagemFerramentas').append(conteudoFerramenta);

      if (!$.fn.DataTable.isDataTable('#listaFerramentaPorEquipeTable')) {
        $('#listaFerramentaPorEquipeTable').DataTable({
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
//
// $('body').click(function () {
//   $('div'). removeClass('modal-backdrop');
//   $('#listarColaboradoresPorEquipes').removeClass('in hide');
// })