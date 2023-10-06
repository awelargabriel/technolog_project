<?php
    var_dump($_POST);
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $identidade = $_POST["identidade"];
    $estadoCivil = $_POST["estadoCivil"];
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);
    $arquivo = fopen("../arquivos/" . $cpf . '.txt', "a+");
    $dataAcao = date("d-m-Y H:i:s");
    $conteudo = $nome . "_" . $cpf . "_" . $identidade . "_" . $estadoCivil . "_*_" . $dataAcao . "\n";
fwrite($arquivo, $conteudo);



$host = "fdb1019.awardspace.net";
$porta = "3306";
$bd = "2594716_cadastro";
$user = "2594716_cadastro";
$password = "Gabriel2023@";

$connect =  mysqli_connect($host,$user,$password,$bd,$porta);

if (!$connect){
    die("Erro na conexão: " . mysqli_connect_error());
}

$query = "Insert into usuarios (cpf, nome, identidade, estado_civil, data_acao)
            Values( '".$cpf."','".$nome."','".$identidade."','".$estadoCivil."','".$dataAcao."')";
// echo $query;
if(mysqli_query($connect,$query)){
    echo "Registro inserido com sucesso";
} else {
    echo "Error: ". $query ."<br>".mysqli_error($connect); 
}

mysqli_close($connect);

?>
