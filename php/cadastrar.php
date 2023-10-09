<?php
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $identidade = $_POST["identidade"];
    $estadoCivil = $_POST["estadoCivil"];
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);
    $dataAcao = date("d-m-Y H:i:s");
//     $arquivo = fopen("../arquivos/" . $cpf . '.txt', "a+");
//     $conteudo = $nome . "_" . $cpf . "_" . $identidade . "_" . $estadoCivil . "_*_" . $dataAcao . "\n";
// if(fwrite($arquivo, $conteudo)){
//     $response["success_arquivo"] = 1;
//     $response["user"] = $nome;
// } else {
//     $response["success_arquivo"] = 0;
//     $response["user"] = $nome;
// }




$host = "127.0.0.1";
$porta = "3306";
$bd = "2594716_cadastro";
$user = "root";
$password = "";

$connect =  mysqli_connect($host,$user,$password,$bd,$porta);

if (!$connect){
    die("Erro na conexão: " . mysqli_connect_error());
}

$query = "Insert into usuarios (cpf, nome, identidade, estado_civil, data_acao)
            Values( '".$cpf."','".$nome."','".$identidade."','".$estadoCivil."','".$dataAcao."')";
// echo $query;
if(mysqli_query($connect,$query)){
    $response["success"] = 1;
    $response["user"] = $nome;
} else {
    $response["success"] = "Error: ". $query ."<br>".mysqli_error($connect); 
}

mysqli_close($connect);
echo (json_encode($response));

?>
