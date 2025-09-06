<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Disciplinas</title>
</head>
<body>
    <h1>Lista de Disciplinas</h1>

    <?php
    $arquivo = 'disciplinas.txt';

    if (file_exists($arquivo)) {
        $disciplinas = file($arquivo);

        if (count($disciplinas) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Sigla</th><th>Nome</th><th>Tempo</th></tr>";

            foreach ($disciplinas as $disciplina) {
                list($sigla, $nome, $tempo) = explode('|', trim($disciplina));
                echo "<tr><td>$sigla</td><td>$nome</td><td>$tempo</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhuma disciplina cadastrada.";
        }
    } else {
        echo "Arquivo de disciplinas não encontrado.";
    }
    foreach ($disciplinas as $index => $disciplina) {
        list($sigla, $nome, $tempo) = explode('|', trim($disciplina));
        echo "<tr>
                <td>$sigla</td>
                <td>$nome</td>
                <td>$tempo</td>
                <td><a href='editardisciplina.php?index=$index'>Editar</a></td>
                <br>
              </tr>";
    }
    foreach ($disciplinas as $index => $disciplina) {
        list($sigla, $nome, $tempo) = explode('|', trim($disciplina));
        echo "<tr>
                <td>$sigla</td>
                <td>$nome</td>
                <td>$tempo</td>
                <td><a href='excluirdisciplina.php?index=$index'>Excluir</a></td>
                <br>
              </tr>";
    }
    ?>

    <br><a href="index.php">Cadastrar Nova Disciplina</a>
</body>
</html>
