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
    echo json_encode([]);
    exit();
}

// Busca todos os agendamentos
$sql = "SELECT id, nome, servico, data FROM agendamentos ORDER BY data DESC, id DESC";
$result = mysqli_query($conn, $sql);

$agendamentos = [];

if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $agendamentos[] = $row;
    }
}

mysqli_close($conn);

echo json_encode($agendamentos);
?>