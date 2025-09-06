<?php
if (isset($_GET['enviar'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $escolheroperacao = $_GET['escolher'];
    $result = 0;

    if ($escolheroperacao == "soma") {
        $result = $num1 + $num2;
    } elseif ($escolheroperacao == "sub") {
        $result = $num1 - $num2;
    } elseif ($escolheroperacao == "mult") {
        $result = $num1 * $num2;
    } elseif ($escolheroperacao == "div") {
        $result = $num1 / $num2;
    }

    echo "<h1>Resultado: $result</h1>";
}
?>

