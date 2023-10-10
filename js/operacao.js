
$(document).on("click", ".excluir", function (e) {
    if (confirm("Você tem certeza que deseja excluir esses dados?") == true) {
        let cpf = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "php/excluir.php",
            data: {cpf : cpf},

            beforeSend: function () {
                document.querySelectorAll("btn").disabled = true;                
            },
            success: function (response) {
                response = JSON.parse(response);
                if(response.success == 1){
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
            data: {cpf : cpf},

            beforeSend: function () {
                document.querySelectorAll("btn").disabled = true;                
            },
            success: function (response) {
                response = JSON.parse(response);
                if(response.success == 1){
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