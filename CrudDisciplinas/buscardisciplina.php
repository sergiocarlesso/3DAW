<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Disciplina</title>
</head>
<body>
    <h1>Buscar Disciplina</h1>
    <form action="buscardisciplina.php" method="post">
        <label for="Sigla">Sigla da Disciplina:</label>
        <input type="text" id="Sigla" name="Sigla" required><br><br>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sigla = $_POST['Sigla'];
        $disciplinas = file('disciplinas.txt');
        $encontrada = false;

        foreach ($disciplinas as $disciplina) {
            list($siglaDisc, $nome, $tempo) = explode('|', trim($disciplina));
            if ($siglaDisc == $sigla) {
                echo "<h2>Disciplina Encontrada:</h2>";
                echo "Sigla: $siglaDisc<br>";
                echo "Nome: $nome<br>";
                echo "Tempo: $tempo<br>";
                $encontrada = true;
                break;
            }
        }

        if (!$encontrada) {
            echo "Disciplina não encontrada.";
        }
    }
    ?>
</body>
</html>
