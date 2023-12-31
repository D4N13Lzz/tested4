<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Conecte ao banco de dados (substitua pelos seus próprios detalhes de conexão)
$host = 'seu_host';
$db   = 'sua_base_de_dados';
$user = 'seu_usuario';
$pass = 'sua_senha';
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

if (isset($data->username) && isset($data->password)) {
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
} else {
    $response = ['status' => 'error', 'message' => 'Dados de login ausentes'];
}

echo json_encode($response);
?>
