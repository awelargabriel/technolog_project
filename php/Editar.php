<h2 class="mt-3 text-center">Alterar Dados</h2>
    <div class="container">
        <form id="form-update" class="row" name="atualizar">
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
    
    <script src="js/operacao.js"></script>