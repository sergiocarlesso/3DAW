<?php
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $disciplinas = file('disciplinas.txt');

    unset($disciplinas[$index]); 
    file_put_contents('disciplinas.txt', implode('', $disciplinas));

    echo "Disciplina excluída com sucesso!";
    echo "<br><a href='listardisciplinas.php'>Voltar à Lista</a>";
} else {
    echo "Disciplina não encontrada.";
}
?>
