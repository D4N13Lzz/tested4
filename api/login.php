<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Conecte ao banco de dados (substitua pelos seus próprios detalhes de conexão)
$host = 'ateliesogra.mysql.dbaas.com.br';
$db   = 'ateliesogra';
$user = 'ateliesogra';
$pass = 'Atelie@1020';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die('Erro de conexão: ' . $e->getMessage());
}

// Receba os dados do formulário Angular
$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

// Consulte o banco de dados para verificar o login
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['senha'])) {
    $response = ['status' => 'success', 'message' => 'Login bem-sucedido'];
} else {
    $response = ['status' => 'error', 'message' => 'Credenciais inválidas'];
}

echo json_encode($response);
?>
