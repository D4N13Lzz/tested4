<?php

$usuario = 'ateliesogra';
$senha = 'Atelie@1020';
$database = 'ateliesogra';
$host = 'ateliesogra.mysql.dbaas.com.br';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}