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

// Recebe os dados
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nome = isset($_POST['nome']) ? mysqli_real_escape_string($conn, $_POST['nome']) : '';
$servico = isset($_POST['servico']) ? mysqli_real_escape_string($conn, $_POST['servico']) : '';
$data = isset($_POST['data']) ? mysqli_real_escape_string($conn, $_POST['data']) : '';

// Validação básica
if ($id <= 0 || empty($nome) || empty($servico) || empty($data)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Todos os campos são obrigatórios']);
    mysqli_close($conn);
    exit();
}

// Atualiza no banco
$sql = "UPDATE agendamentos SET nome = '$nome', servico = '$servico', data = '$data' WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Agendamento atualizado com sucesso!']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Nenhuma alteração foi realizada']);
    }
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao atualizar: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>