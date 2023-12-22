<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$data = array('message' => 'API REGISTRADA COM SUCESSO!');
echo json_encode($data);
?>
