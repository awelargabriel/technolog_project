
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


$(document).ready(function () {
    $(".salvar").prop("style","display: none");
    $(".cancelar").prop("style","display: none");
    
    $(".editar").click(function () {

        // Encontre a linha pai (tr) da qual o botão foi clicado    
        let linha = $(this).closest('tr');
        
        linha.find('td').prop('contenteditable', function (i, val) {
            return val == true ? false : true;
        });
        console.log(linha.find(".salvar"));
        if (linha.find('td').attr('contenteditable') === "true") {
            linha.find(".salvar").prop('contenteditable', false);
            linha.find(".cancelar").prop('contenteditable', false);
            linha.find(".salvar").show();
            linha.find(".cancelar").show();
            linha.find(".editar").hide();
            linha.find(".ativado").hide();
            linha.find(".excluir").hide();

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
});