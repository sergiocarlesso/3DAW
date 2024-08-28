<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Disciplina</title>
</head>
<body>
    <h1>Cadastro de Disciplina</h1>
    <form action="cadastro.php" method="post">
        <label for="Sigla">Sigla:</label>
        <input type="text" id="Sigla" name="Sigla" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="tempo">Tempos no Período:</label>
        <input type="number" id="tempo" name="tempo" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
