<?php
header('Content-Type: application/json');

$servername = "localhost";
$database = "site_jac";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo json_encode([]);
    exit();
}

// Recebe o nome via GET (ex: buscar_cliente.php?nome=Joao)
$nome = isset($_GET['nome']) ? mysqli_real_escape_string($conn, $_GET['nome']) : '';

if (empty($nome)) {
    echo json_encode([]); // Se não digitou nada, retorna lista vazia
    exit();
}

// Busca agendamentos onde o nome "parece" com o que foi digitado
$sql = "SELECT * FROM agendamentos WHERE nome LIKE '%$nome%' ORDER BY data DESC";
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