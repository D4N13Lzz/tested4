<?php
include('db.php');

$result = $conn->query("SELECT * FROM usuarios");
$usuarios = array();

while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

header('Content-Type: application/json');
echo json_encode($usuarios);
?>
