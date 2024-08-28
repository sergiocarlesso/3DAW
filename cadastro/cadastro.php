<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sigla = $_POST['Sigla'];
    $nome = $_POST['nome'];
    $tempo = $_POST['tempo'];

    $disciplina = "$sigla|$nome|$tempo\n";

    $arquivo = fopen('disciplinas.txt', 'a');
    fwrite($arquivo, $disciplina);
    fclose($arquivo);

    echo "Disciplina cadastrada com sucesso!";
    echo "<br><a href='index.php'>Cadastrar outra disciplina</a>";
} else {
    echo "Método de requisição inválido.";
}
?>
