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
    echo json_encode(['sucesso' => false, 'mensagem' => 'Falha na conexão']);
    exit();
}

// Recebe o ID
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'ID inválido']);
    mysqli_close($conn);
    exit();
}

// Remove do banco
$sql = "DELETE FROM agendamentos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Agendamento removido com sucesso!']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Agendamento não encontrado']);
    }
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao remover: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>