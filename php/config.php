<?php

    define('HOST', '127.0.0.1');
    define('USER','root');
    define('PASS', '');
    define('DB', '2594716_cadastro');
    define('PORT', '3306');

$connection = new mysqli(HOST,USER,PASS,DB,PORT);
if($connection->connect_error){
    die("Falha na conexão com o banco de dados: ".$connection->connect_error);
}  