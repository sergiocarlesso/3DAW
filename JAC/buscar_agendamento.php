<?php
header('Content-Type: application/json');

$servername = "localhost";
$database = "site_jac";
$username = "root";
$password = "";

// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verifica conexão
if (!$conn) {
    echo json_encode(['erro' => 'Falha na conexão']);
    exit();
}

// Recebe o ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    echo json_encode(['erro' => 'ID inválido']);
    exit();
}

// Busca o agendamento específico
$sql = "SELECT id, nome, servico, data FROM agendamentos WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $agendamento = mysqli_fetch_assoc($result);
    echo json_encode($agendamento);
} else {
    echo json_encode(['erro' => 'Agendamento não encontrado']);
}

mysqli_close($conn);
?>