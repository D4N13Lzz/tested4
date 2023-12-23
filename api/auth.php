<?php
header('Content-Type: application/json');
require_once('db.php'); // Substitua 'db.php' pelo arquivo de configuração do seu banco de dados.

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username']) && isset($data['password'])) {
    $username = $data['username'];
    $password = $data['password'];

    // Consulta ao banco de dados para verificar as credenciais
    $query = "SELECT id, username FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo json_encode(array('success' => true, 'user' => $user));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Credenciais inválidas.'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Parâmetros ausentes.'));
}
?>
