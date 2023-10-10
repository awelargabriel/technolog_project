<?php
require("config.php");

if (isset($_POST["cpf"])) {
    $cpf = $_POST["cpf"];


    $sql = "DELETE FROM usuarios WHERE cpf = " . $cpf;

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