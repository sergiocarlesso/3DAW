<?php

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$database = "site_jac";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Falha na conexão com o banco de dados']);
    exit();
}


$nome = isset($_POST['nome']) ? mysqli_real_escape_string($conn, $_POST['nome']) : '';
$servico = isset($_POST['servico']) ? mysqli_real_escape_string($conn, $_POST['servico']) : '';
$data = isset($_POST['data']) ? mysqli_real_escape_string($conn, $_POST['data']) : '';


if (!empty($nome) && !empty($servico) && !empty($data)) {
    $sql = "INSERT INTO agendamentos (nome, servico, data) VALUES ('$nome', '$servico', '$data')";
    
    if (mysqli_query($conn, $sql)) {
        
        echo json_encode(['sucesso' => true, 'mensagem' => 'Agendamento salvo!']);
    } else {
        
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro no banco: ' . mysqli_error($conn)]);
    }
} else {
    
    echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos.']);
}

mysqli_close($conn);
?>