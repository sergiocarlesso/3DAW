<?php
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $disciplinas = file('disciplinas.txt');
    list($sigla, $nome, $tempo) = explode('|', trim($disciplinas[$index]));

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sigla = $_POST['Sigla'];
        $nome = $_POST['nome'];
        $tempo = $_POST['tempo'];
        
        $disciplinas[$index] = "$sigla|$nome|$tempo\n";
        file_put_contents('disciplinas.txt', implode('', $disciplinas));

        echo "Disciplina alterada com sucesso!";
        echo "<br><a href='listardisciplinas.php'>Voltar à Lista</a>";
    } else {
?>
        <form method="POST">
            <label>Sigla:</label>
            <input type="text" name="Sigla" value="<?php echo $sigla; ?>"><br><br>
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>"><br><br>
            <label>Tempos no Período:</label>
            <input type="number" name="tempo" value="<?php echo $tempo; ?>"><br><br>
            <input type="submit" value="Salvar Alterações">
        </form>
<?php
    }
} else {
    echo "Disciplina não encontrada.";
}
?>
