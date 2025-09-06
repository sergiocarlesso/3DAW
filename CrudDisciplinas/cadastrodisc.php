<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Disciplina</title>
</head>
<body>
    <h1>Cadastrar Disciplina</h1>
    <form action="index.php" method="POST">
        <label for="sigla">Sigla:</label>
        <input type="text" name="Sigla" id="sigla" required><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="tempo">Tempo:</label>
        <input type="text" name="tempo" id="tempo" required><br>

        <input type="submit" value="Cadastrar Disciplina">
    </form>

    <br>
    <a href="index.php">Voltar ao Menu Principal</a>
</body>
</html>
