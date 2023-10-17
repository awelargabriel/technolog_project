<?php

if (isset($_POST["texto_busca"])) {
    require("config.php");
    $campoBusca = $_POST["texto_busca"];
    //Variável aux é usada como tratativa para o atributo ativado não retorne os valores falsos quando comparados a uma string
    $aux = 3;
    if (is_numeric($campoBusca)) {
        $aux = $campoBusca;
    }
    $sql = "SELECT * FROM usuarios WHERE cpf = '" . $campoBusca . "' OR  nome LIKE '%" . $campoBusca . "%' OR estado_civil = '" . $campoBusca . "' OR ativado = '" . $aux . "'";
    $res = $connection->query($sql);
    $qtd = $res->num_rows;
    $dados = array();
    if ($qtd > 0) {
        while ($row = $res->fetch_object()) {
            $dados[] = $row;
        }
        $response['status'] = 1;
    } else {
        $response['status'] = 0;
    }
    $response['dados'] = $dados;
    $response = json_encode($response);

    print_r($response);
}