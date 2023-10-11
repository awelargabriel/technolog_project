<!-- Cabeçalho de documentação:
	/**
	 * Empresa : Tecnolog
  	 * Autor : Gabriel Avelar 
	 * Descrição : Atividade #9978. Criação do banco de dados usuarios e Integração do formulário de cadastro com o banco de dados criado
 	 * Data criação: 09/10/2023
	 * Diretório : https://cp1.awardspace.net/file-manager/9978/
     * Última atualização: Gabriel Avelar / 06/10/2023 / Atividade #9977 de integração Criação de formulário de cadastro e salvamento dos dados em arquivo 
	 */ -->

    
    <h2 class="mt-3 text-center">Formulário de Cadastro</h2>
    <div class="container">
        <form id="form" class="row" name="cadastro" method="post">
            <div class="form-group col-md-3 p-2">
                <label id="cpf_label" class="form-label">CPF</label>
                <input id="cpf" type="text" class="form-control" name="cpf" placeholder="Informe seu CPF" maxlength="14" required>
                <p id="cpfStatus"></p>
            </div>
            <div class="form-group col-md-3 p-2">
                <label class="form-label">Nome</label>
                <input id="nome" name="nome" class="form-control" type="text" placeholder="Informe seu nome completo"
                    maxlength="50" required>
            </div>
            <div class="form-group col-md-3 p-2 ">
                <label class="form-label">Identidade</label>
                <input id="identidade" name="identidade" class="form-control" type="text" placeholder="Informe seu RG"
                    maxlength="15" required>
            </div>
            <div class="col-md-2 p-2">
                <label class="form-label">Estado Civil</label>
                <select id="estado_civil" name="estado_civil" class="form-select">
                    <option value="solteiro" selected>Solteiro(a)</option>
                    <option value="casado">Casado(a)</option>
                    <option value="divorciado">Divorciado(a)</option>
                    <option value="Viúvo">Viúvo(a)</option>
                </select>
            </div>
            <div class="form-group col-md-1 mt-3">
                <input id="cadastrar" type="submit" class="btn btn-success m-2 mt-4" value="Cadastrar">
            </div>
        </form>
    </div>
    <script src="js/js.js"></script>
