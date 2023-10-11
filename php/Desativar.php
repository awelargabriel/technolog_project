<?php
require("config.php");

if (isset($_POST["cpf"])) {
    $cpf = $_POST["cpf"];


    $sql = "UPDATE usuarios
                SET ativado = 0 
                    WHERE cpf = " . $cpf;

    if ($res = $connection->query($sql)) {
        $response["success"] = 1;
        $response["dados"] = $res;
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["dados"] = $res;
        echo json_encode($response);
    }
}