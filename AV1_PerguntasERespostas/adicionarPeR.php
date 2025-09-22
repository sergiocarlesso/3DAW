<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<h1>Adicionar Perguntas e Respostas</h1>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $pergunta = $_POST["pergunta"];
	    $respostas = $_POST["a"] . ";" . $_POST["b"] . ";" . $_POST["c"] . ";" . $_POST["d"] . ";" . $_POST["e"];
	    $gabarito = $_POST["gabarito"];
	    $perguntas = $pergunta . ";" . $respostas . ";" . $gabarito . PHP_EOL; 
	    
	    $arquivo = fopen("perguntaserespostas.txt", "a");
	    fwrite($arquivo, $perguntas);
	    fclose($arquivo);
	    echo "Pergunta criada com sucesso.";
	}
	?>
	<form method="post">
		Pergunta: <input type="text" name="pergunta" required><br>
		Alternativas da Pergunta - A: <input type="text" name="a" required><br>
		B: <input type="text" name="b" required><br>
		C: <input type="text" name="c" required><br>
		D: <input type="text" name="d" required><br>
		E: <input type="text" name="e" required><br>
		Gabarito: <input type="text" name="gabarito" required><br>
		<input type="submit" value="Adicionar">
	</form>
</body>
</html>

