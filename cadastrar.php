<?php
var_dump($_POST);
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$identidade = $_POST["identidade"];
$estadoCivil = $_POST["estadoCivil"];
$cpf = str_replace(".","",$cpf);
$cpf = str_replace("-","",$cpf);
$arquivo = fopen($cpf.'.txt',"a+");
$conteudo = $nome."_".$cpf."_".$identidade."_".$estadoCivil."_*_".date("d-m-Y H:i:s")."\n";
fwrite($arquivo,$conteudo);

$caminho = 'arquivos/'.$cpf;
$fileInfo = pathinfo($cpf);
var_dump($fileInfo);
echo $conteudo;
