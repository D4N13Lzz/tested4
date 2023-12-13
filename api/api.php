<?php
header("Access-Control-Allow-Origin: *");

include('db.php');

$result = $conn->query("SELECT * FROM Usuarios");
$users = array();

while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

header('Content-Type: application/json');
echo json_encode($users);
?>
