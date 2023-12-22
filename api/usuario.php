<?php
header('Content-Type: application/json');

require_once('db.php');

$table_name = 'usuarios';

// Verifica se a tabela existe
$check_table_query = "SHOW TABLES LIKE '$table_name'";
$table_exists = $conn->query($check_table_query)->num_rows > 0;

if (!$table_exists) {
    echo json_encode(array('error' => 'Tabela de usuários não encontrada.'));
} else {
    $sql = "SELECT email, name FROM $table_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(array());
    }
}

$conn->close();
?>
