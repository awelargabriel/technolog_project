/**  Cabeçalho de documentação:
	
	 * Empresa : Tecnolog
  	 * Autor : Gabriel Avelar 
	 * Descrição : Atividade #9978. Criação do banco de dados usuarios e Integração do formulário de cadastro com o banco de dados criado
 	 * Data criação: 09/10/2023
	 * Diretório : https://cp1.awardspace.net/file-manager/9978/
             * Última atualização: Gabriel Avelar / 06/10/2023 / Atividade #9977 de integração Criação de formulário de cadastro e salvamento dos dados em arquivo 
	 */ 

$(document).ready(function () {
    let cpf = $("#cpf");
    cpf.mask('000.000.000-00', { reverse: true });
   
    $('#cpf').on('input', function () {
        const cpf = $(this).val();
        const valido = validarCPF(cpf);

        if (valido && cpf !== "") {
            $('#cpfStatus').text('CPF válido').removeClass('alert alert-danger').addClass('alert alert-success p-2 mt-2');
            $('#cadastrar').prop("disabled", false);
        } else if(cpf !== "") {
            $('#cpfStatus').text('CPF inválido').removeClass('alert alert-success').addClass('alert alert-danger p-2 mt-2');
            $('#cadastrar').prop("disabled", true);
        } else {
            $('#cpfStatus').text('').removeClass('alert alert-success alert-danger');
        }
    });
});


document.getElementById("cadastrar").addEventListener("click", function (e) {
    if (confirm("Você tem certeza que deseja cadastrar esses dados?") == true) {

        let cpf = document.getElementById("cpf");
        let nome = document.getElementById("nome");
        let identidade = document.getElementById("identidade");
        let estadoCivil = document.getElementById("estado_civil");

        if (cpf.value !== '' && nome.value !== '' && identidade.value !== '' && estadoCivil !== '') {
            $.ajax({
                type: "POST",
                url: "php/cadastrar.php",
                data: {
                    cpf: cpf.value,
                    nome: nome.value,
                    identidade: identidade.value,
                    estadoCivil: estadoCivil.value
                },
                beforeSend: function () {
                    document.getElementById("cadastrar").disabled = true;
                },
                success: function (response) {
                    response = JSON.parse(response);
                    if(response.success == 1){
                        alert(response.user + " cadastrado(a) com sucesso!");
                    } else {
                        alert("Erro ao salvar os dados no arquivo");
                        alert(response.success_bd);
                    }
                    $("#cpf").val("");
                    $("#nome").val("");
                    $("#identidade").val("");
                    $('#cpfStatus').text('').removeClass('alert alert-success alert-danger');
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


function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos

    if (cpf === '' || cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
        return false; // CPF inválido
    }

    let add = 0;
    for (let i = 0; i < 9; i++) {
        add += parseInt(cpf.charAt(i)) * (10 - i);
    }

    let rev = 11 - (add % 11);
    if (rev === 10 || rev === 11) {
        rev = 0;
    }

    if (rev !== parseInt(cpf.charAt(9))) {
        return false; // CPF inválido
    }

    add = 0;
    for (let i = 0; i < 10; i++) {
        add += parseInt(cpf.charAt(i)) * (11 - i);
    }

    rev = 11 - (add % 11);
    if (rev === 10 || rev === 11) {
        rev = 0;
    }

    if (rev !== parseInt(cpf.charAt(10))) {
        return false; // CPF inválido
    }

    return true; // CPF válido
}




