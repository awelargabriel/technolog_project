<?php

require("config.php");
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$identidade = $_POST["identidade"];
$estadoCivil = $_POST["estado_civil"];
$dataAcao = date("d-m-Y H:i:s");

$query = "UPDATE usuarios 
            SET nome = '".$nome."', identidade = '".$identidade."', estado_civil = '".$estadoCivil."', data_acao = '".$dataAcao."'
                WHERE cpf =  '".$cpf."'";

$res = $connection->query($query);

if($res){
    $response['success'] = 1;
    $response['dados'] = $_POST;
    echo json_encode($response);
} else {
    $response['success'] = 0;
    echo json_encode($response);
}
