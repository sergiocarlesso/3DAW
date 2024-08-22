<!DOCTYPE html>
<html>
<head>
    <title>Calculadora</title>
</head>
<body>

<h2>Calculadora</h2>
<form method="get">
    <input type="number" name="num1" placeholder="Primeiro número" required>
    <select name="escolher">
        <option value="soma">+</option>
        <option value="sub">-</option>
        <option value="mult">*</option>
        <option value="div">/</option>
    </select>
    <input type="number" name="num2" placeholder="Segundo número" required>
    <input type="submit" name="enviar" value="Calcular">
</form>

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

</body>
</html>
