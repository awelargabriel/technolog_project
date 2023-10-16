$(document).ready(function () {

$(document).on("click", ".excluir", function (e) {
    if (confirm("Você tem certeza que deseja excluir esses dados?") == true) {
        let cpf = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "php/excluir.php",
            data: { cpf: cpf },

            beforeSend: function () {
                document.querySelectorAll("btn").disabled = true;
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response.success == 1) {
                    window.location.reload(true);
                    alert("Registro deletado com sucesso!");
                } else {
                    alert("Erro ao excluir os dados");
                }

                document.querySelectorAll("btn").disabled = false;
            },
            error: function () {
                alert("Erro na comunicação com o servidor");
                document.querySelectorAll("btn").disabled = false;
            }
        });

    }
});



$(document).on("click", ".ativado", function (e) {
    if (confirm("Você tem certeza que deseja desativar esses dados?") == true) {
        let cpf = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "php/desativar.php",
            data: { cpf: cpf },

            beforeSend: function () {
                document.querySelectorAll("btn").disabled = true;
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response.success == 1) {
                    window.location.reload(true);
                    alert("Registro desativado com sucesso!");
                } else {
                    alert("Erro ao desativar o registro");
                }

                document.querySelectorAll("btn").disabled = false;
            },
            error: function () {
                alert("Erro na comunicação com o servidor");
                document.querySelectorAll("btn").disabled = false;
            }
        });

    }
});



    $(".salvar").prop("style","display: none");
    $(".cancelar").prop("style","display: none");
    
    $(".editar").click(function () {

        // Encontre a linha pai (tr) da qual o botão foi clicado    
        let linha = $(this).closest('tr');
        
        linha.find('.edit').prop('contenteditable', function (i, val) {
            return val == true ? false : true;
        });
        console.log(linha.find(".salvar"));
        if (linha.find('.edit').attr('contenteditable') === "true") {
            linha.find(".salvar").prop('contenteditable', false);
            linha.find(".cancelar").prop('contenteditable', false);
            linha.find(".salvar").show();
            linha.find(".cancelar").show();
            linha.find(".editar").hide();
            linha.find(".ativado").hide();
            linha.find(".excluir").hide();

            let firstCell = linha.find(".primeiro");
            firstCell.focus();
        } else {

            linha.find(".salvar").hide();
            linha.find(".cancelar").hide();
            linha.find(".editar").show();
            linha.find(".ativado").show();
            linha.find(".excluir").show();
        }

        $(".salvar").click(function () {
            let linha = $(this).closest('tr');
            
            linha.find('td').prop('contenteditable', function (i, val) {
                return val == true ? false : true;
            });

            let cpf = linha.find('td:eq(0)').text();
            let nome = linha.find('td:eq(1)').text();
            let identidade = linha.find('td:eq(2)').text();
            let estado_civil = linha.find('td:eq(3)').text();
            
            $.ajax({
                type: "POST",
                url: "php/update.php",
                data: { 
                        cpf: cpf,
                        nome: nome,
                        identidade: identidade,
                        estado_civil: estado_civil
                      },
    
                beforeSend: function () {
                    document.querySelectorAll("btn").disabled = true;
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.success == 1) {
                        window.location.reload(true);
                        alert("Registro atualizado com sucesso!");
                    } else {
                        alert("Erro ao atualizar registro");
                    }
    
                    document.querySelectorAll("btn").disabled = false;
                },
                error: function () {
                    alert("Erro na comunicação com o servidor");
                    document.querySelectorAll("btn").disabled = false;
                }
            });

        });

        $(".cancelar").click(function () {
            window.location.reload(true);
        });

    });




    $('#filtrar').click( function(e){
        e.preventDefault();
        e.stopPropagation();
        let texto_busca = document.getElementById('campo_busca').value;
        $.ajax({
            type: "POST",
            url: "php/filtrar.php",
            data: {
                texto_busca: texto_busca
            },

            beforeSend: function () {
                document.querySelectorAll("btn").disabled = true;
            },

            success: function(response){

                response = JSON.parse(response);

                novaTabela =
                                "<table class='table table-hover  table-bordered'>"+
                                    "<thead>"+
                                        "<tr>"+
                                            "<th scope='col'>CPF</th>"+
                                            "<th scope='col'>Nome</th>"+
                                            "<th scope='col'>Identidade</th>"+
                                            "<th scope='col'>Estado Civil</th>"+
                                            "<th scope='col'>Data Ação</th>"+
                                            "<th scope='col'>Ação</th>"+
                                        "</tr>"+
                                    "</thead>"+
                                    "<tbody>";
                response.dados.forEach(item => {
                        novaTabela +=   "<tr>"+
                                            "<td contenteditable='false' >"+item.cpf+"</td>"+
                                            "<td contenteditable='false' class='primeiro edit'>"+item.nome+"</td>"+
                                            "<td contenteditable='false' class='edit'>"+item.identidade+"</td>"+
                                            "<td contenteditable='false' class='edit'>"+item.estado_civil+"</td>"+
                                            "<td contenteditable='false' >"+item.data_acao+"</td>"+
                                            "<td>"+
                                                "<button class='btn btn-success editar'data-id='"+item.cpf+"'>Editar</button>"+
                                                "<button class='btn btn-success salvar'data-id='"+item.cpf+"'>Salvar</button>"+
                                                "<button class='btn btn-danger cancelar'>Cancelar</button>"+
                                                "<button class='btn btn-warning m-1 ativado' data-id='"+item.cpf+"'>Desativar</button>"+
                                                "<button class='btn btn-danger excluir' data-id='"+item.cpf+"'>Excluir</button>"+
                                            "</td>"+
                                        "</tr>";
                                    
                            
                        });
                        novaTabela+="</tbody>"+
                                "</table>";

                $('#tabela').html(novaTabela);
                                        
            }
        });
        
    });

    
});