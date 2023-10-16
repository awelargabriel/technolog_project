<script src="js/operacao.js"></script>
<?php
    
    if(isset($_POST["texto_busca"])){
        require("config.php");
        $campoBusca = $_POST["texto_busca"];
        $sql = "SELECT * FROM usuarios WHERE cpf = '".$campoBusca."' OR  nome LIKE '%".$campoBusca."%' OR estado_civil = '".$campoBusca."' OR ativado = '".$campoBusca."'";
    } else {
        $sql = "SELECT * FROM usuarios WHERE ativado = 1";
    }
    $res = $connection->query($sql);
    $qtd = $res->num_rows;
    $view = '';
    if($qtd > 0){
        $view = "<div class='bc'>";
        $view = $view . "<h1>listar usuarios</h1>";
        $view =$view. "<div id='tabela' class='table-responsive'>";
        $view =$view. "<table class='table-responsive table table-hover  table-bordered'>";
            $view =$view. "<thead>";
                $view =$view. "<tr>";
                    // $view =$view. "<th scope='col'>ID</th>";
                    $view =$view. "<th scope='col'>CPF</th>";
                    $view =$view. "<th scope='col'>Nome</th>";
                    $view =$view. "<th scope='col'>Identidade</th>";
                    $view =$view. "<th scope='col'>Estado Civil</th>";
                    $view =$view. "<th scope='col'>Data Ação</th>";
                    $view =$view. "<th scope='col'>Ação</th>";
                $view =$view. "<tr>";
            $view =$view. "<thead>";

        while($row = $res->fetch_object()){
            $view =$view. "<tbody>";
                $view =$view. "<tr class ='corpo_tabela'>";
                    // $view . "<td scope='row'>".$row->id."</td>";
                    $view = $view. "<td contenteditable='false'>".$row->cpf."</td>";
                    $view = $view. "<td contenteditable='false' class='primeiro edit'>".$row->nome."</td>";
                    $view = $view. "<td contenteditable='false' class='edit'>".$row->identidade."</td>";
                    $view = $view. "<td contenteditable='false' class='edit'>".$row->estado_civil."</td>";
                    $view = $view. "<td contenteditable='false' >".$row->data_acao."</td>";
                    $view = $view. "<td class='text-center'>

                                <button class='btn btn-success editar'data-id='".$row->cpf."'>Editar</button>
                                <button class='btn btn-success salvar'data-id='".$row->cpf."'>Salvar</button>
                                <button  class='btn btn-danger cancelar'>Cancelar</button>

                                <button class='btn btn-warning m-1 ativado' data-id='".$row->cpf."'>Desativar</button>

                                <button class='btn btn-danger excluir' data-id='".$row->cpf."'>Excluir</button>
                                
                            </td>";
                $view = $view. "</tr>";
            $view = $view. "</tbody>";
        }
        $view = $view. "</table>";
        $view = $view. "</div>";
        $view = $view. "</div>";
        
        
        echo $view;
        
    } else {
        $view = "<p class='alert alert-danger'>Não encontrou resultados!</p>";
        echo $view;
    }


