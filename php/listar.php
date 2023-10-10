<h1>listar usuarios</h1>

<?php
    $sql = "SELECT * FROM usuarios WHERE ativado = 1";
    
    $res = $connection->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<div class='table-responsive'>";
        print "<table class='table-responsive table table-hover  table-bordered'>";
            print "<thead>";
                print "<tr>";
                    // print "<th scope='col'>ID</th>";
                    print "<th scope='col'>CPF</th>";
                    print "<th scope='col'>Nome</th>";
                    print "<th scope='col'>Identidade</th>";
                    print "<th scope='col'>Estado Civil</th>";
                    print "<th scope='col'>Data Ação</th>";
                    print "<th scope='col'>Ação</th>";
                print "<tr>";
            print "<thead>";

        while($row = $res->fetch_object()){
            print "<tbody>";
                print "<tr>";
                    // print "<td scope='row'>".$row->id."</td>";
                    print "<td>".$row->cpf."</td>";
                    print "<td>".$row->nome."</td>";
                    print "<td>".$row->identidade."</td>";
                    print "<td>".$row->estado_civil."</td>";
                    print "<td>".$row->data_acao."</td>";
                    print "<td class='text-center'>

                                <button class='btn btn-success editar'data-id='".$row->cpf."'>Editar</button>

                                <button class='btn btn-warning ativado' data-id='".$row->cpf."'>Desativar</button>

                                <button class='btn btn-danger excluir' data-id='".$row->cpf."'>Excluir</button>
                                
                            </td>";
                print "<tr>";
            print "</tbody>";
        }
        print "</table>";
        print "</div>";
        
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }

?>
<script src="js/operacao.js"></script>