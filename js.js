$(document).ready(function () {
    let cpf = $("#cpf");
    cpf.mask('000.000.000-00', { reverse: true });

    // if (cpf.length !== 11 || !validarCPF(cpf)) {
    //     $("#cpf_label").text("CPF inválido");
    // } else {
    //     $("#cpf_label").text("CPF válido");
    // }

});


document.getElementById("cadastrar").addEventListener("click", function (e) {
    if (confirm("Você tem certeza que deseja cadastrar esses dados?") == true) {

        let cpf = document.getElementById("cpf");
        let nome = document.getElementById("nome");
        let identidade = document.getElementById("identidade");
        let estadoCivil = document.getElementById("estado_civil");

        console.log(cpf.value);
        if (cpf.value !== '' && nome.value !== '' && identidade.value !== '' && estadoCivil !== '') {
            $.ajax({
                type: "POST",
                url: "cadastrar.php",
                data: {
                    cpf: cpf.value,
                    nome: nome.value,
                    identidade: identidade.value,
                    estadoCivil: estadoCivil.value
                },
                beforeSend: function () {
                    document.getElementById("cadastrar").disabled = true;
                    $("#resultado").html("ENVIANDO...");
                },
                success: function () {
                    alert("Dados salvo com sucesso!");
                    document.getElementById("cadastrar").disabled = false;
                },
                error: function () {
                    alert("falha ao salvar os dados");
                    document.getElementById("cadastrar").disabled = false;
                }
            });
        } else {
            alert('É necessário o preenchimento de todos os campos');
        }
    }
});

// function validarCPF(cpf) {
//     var soma = 0;
//     var resto;
//     if (cpf == "00000000000") return false;

//     for (var i = 1; i <= 9; i++) {
//         soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
//     }

//     resto = (soma * 10) % 11;

//     if ((resto == 10) || (resto == 11)) resto = 0;
//     if (resto != parseInt(cpf.substring(9, 10))) return false;

//     soma = 0;

//     for (var i = 1; i <= 10; i++) {
//         soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
//     }

//     resto = (soma * 10) % 11;

//     if ((resto == 10) || (resto == 11)) resto = 0;
//     if (resto != parseInt(cpf.substring(10, 11))) return false;

//     return true;
// }