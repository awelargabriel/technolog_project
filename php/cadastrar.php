<?php
/** Cabeçalho de documentação:
	
	 * Empresa : Tecnolog
  	 * Autor : Gabriel Avelar 
	 * Descrição : Atividade #9978. Criação do banco de dados usuarios e Integração do formulário de cadastro com o banco de dados criado
 	 * Data criação: 09/10/2023
	 * Diretório : https://cp1.awardspace.net/file-manager/9978/
             * Última atualização: Gabriel Avelar / 06/10/2023 / Atividade #9977 de integração Criação de formulário de cadastro e salvamento dos dados em arquivo 
	 */




    // $cpf = $_POST["cpf"];
    // $nome = $_POST["nome"];
    // $identidade = $_POST["identidade"];
    // $estadoCivil = $_POST["estadoCivil"];
    // $cpf = str_replace(".", "", $cpf);
    // $cpf = str_replace("-", "", $cpf);
    // $dataAcao = date("d-m-Y H:i:s");


    // $host = "fdb1019.awardspace.net";
    // $porta = "3306";
    // $bd = "2594716_cadastro";
    // $user = "2594716_cadastro";
    // $password = "Gabriel2023@";

    // $connect =  mysqli_connect($host,$user,$password,$bd,$porta);

    // if (!$connect){
    //     die("Erro na conexão: " . mysqli_connect_error());
    // }

    // $query = "Insert into usuarios (cpf, nome, identidade, estado_civil, data_acao)
    //             Values( '".$cpf."','".$nome."','".$identidade."','".$estadoCivil."','".$dataAcao."')";

    // if(mysqli_query($connect,$query)){
    //     $response["success"] = 1;
    //     $response["user"] = $nome;
    // } else {
    //     $response["success"] = "Error: ". $query ."<br>".mysqli_error($connect); 
    // }

    // mysqli_close($connect);
    // echo (json_encode($response));
    
	




/* Cabeçalho de documentação:
    
     * Empresa : Tecnolog
       * Autor : Gabriel Avelar 
     * Descrição : Atividade #9978. Criação do banco de dados usuarios e Integração do formulário de cadastro com o banco de dados criado
      * Data criação: 09/10/2023
     * Diretório : https://cp1.awardspace.net/file-manager/9978/
             * Última atualização: Gabriel Avelar / 06/10/2023 / Atividade #9977 de integração Criação de formulário de cadastro e salvamento dos dados em arquivo 
     */




$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$identidade = $_POST["identidade"];
$estadoCivil = $_POST["estadoCivil"];
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$dataAcao = date("d-m-Y H:i:s");


$host = "127.0.0.1";
$porta = "3306";
$bd = "2594716_cadastro";
$user = "root";
$password = "";

$connect = mysqli_connect($host, $user, $password, $bd, $porta);

if (!$connect) {
    die("Erro na conexão: " . mysqli_connect_error());
}
$querySelect = "select * from usuarios
                where cpf = '" . $cpf . "'";

$query = "Insert into usuarios (cpf, nome, identidade, estado_civil, data_acao)
                Values( '" . $cpf . "','" . $nome . "','" . $identidade . "','" . $estadoCivil . "','" . $dataAcao . "')";

$result = mysqli_query($connect, $querySelect);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($cpf == $row['cpf']) {
            $query = "Insert into usuarios (cpf, nome, identidade, estado_civil, data_acao)
                Values( '" . $cpf . "','" . $row['nome'] . "','" . $row['identidade'] . "','" . $row['estado_civil'] . "','" . $dataAcao . "')";
            if (mysqli_query($connect, $query)) {
                $response["success"] = 1;
                $response["user"] = $row['nome'];
                mysqli_close($connect);
                echo (json_encode($response));
                die;
            } else {
                $response["success"] = "Error: " . $query . "<br>" . mysqli_error($connect);
                echo (json_encode($response));
                die;
            }
        }
    }
}



if (mysqli_query($connect, $query)) {
    $response["success"] = 1;
    $response["user"] = $nome;
} else {
    $response["success"] = "Error: " . $query . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
echo (json_encode($response));

?>