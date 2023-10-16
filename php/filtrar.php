<?php

if(isset($_POST["texto_busca"])){
    require("config.php");
    $campoBusca = $_POST["texto_busca"];
    $sql = "SELECT * FROM usuarios WHERE cpf = '".$campoBusca."' OR  nome LIKE '%".$campoBusca."%' OR estado_civil = '".$campoBusca."' OR ativado = '".$campoBusca."'";
    $res = $connection->query($sql);
    $qtd = $res->num_rows;
    $dados = array();
    if($qtd > 0){
        while($row = $res->fetch_object()){
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