<?php
header('Content-Type: application/json');

$data = array('message' => 'Olá da API PHP!');
echo json_encode($data);
?>
