<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alterar Pergunta</title>
</head>
<body>
    <h1>Alterar Pergunta</h1>
    <form id="buscarForm">
        <label for="codigo">Código da Pergunta:</label>
        <input type="text" id="codigo" name="codigo" required>
        <button type="submit">Buscar</button>
    </form>

    <div id="formEditar" style="display:none;">
        <h2>Editar Pergunta</h2>
        <form id="editarForm">
            <input type="hidden" id="ed_index" name="index">
            <label>Pergunta:</label><br>
            <input type="text" id="ed_pergunta" name="pergunta" required><br>
            <label>A:</label><br>
            <input type="text" id="ed_a" name="a" required><br>
            <label>B:</label><br>
            <input type="text" id="ed_b" name="b" required><br>
            <label>C:</label><br>
            <input type="text" id="ed_c" name="c" required><br>
            <label>D:</label><br>
            <input type="text" id="ed_d" name="d" required><br>
            <label>E:</label><br>
            <input type="text" id="ed_e" name="e" required><br>
            <label>Gabarito:</label><br>
            <input type="text" id="ed_gabarito" name="gabarito" maxlength="1" required><br><br>
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>

    <p id="msg"></p>

    <script>
        document.getElementById("buscarForm").onsubmit = function(e) {
            e.preventDefault();
            let codigo = document.getElementById("codigo").value;
            fetch('alterar_pergunta.php', {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "acao=buscar&codigo=" + encodeURIComponent(codigo)
            })
            .then(response => response.json())
            .then(dados => {
                if (dados.sucesso) {
                    document.getElementById("formEditar").style.display = "block";
                    document.getElementById("ed_index").value = dados.index;
                    document.getElementById("ed_pergunta").value = dados.pergunta;
                    document.getElementById("ed_a").value = dados.a;
                    document.getElementById("ed_b").value = dados.b;
                    document.getElementById("ed_c").value = dados.c;
                    document.getElementById("ed_d").value = dados.d;
                    document.getElementById("ed_e").value = dados.e;
                    document.getElementById("ed_gabarito").value = dados.gabarito;
                    document.getElementById("msg").textContent = "";
                } else {
                    document.getElementById("msg").textContent = "Pergunta não encontrada!";
                    document.getElementById("formEditar").style.display = "none";
                }
            });
        };

        document.getElementById("editarForm").onsubmit = function(e) {
            e.preventDefault();
            let dados = new URLSearchParams(new FormData(this));
            dados.append("acao", "salvar");
            fetch('alterar_pergunta.php', {
                method: "POST",
                body: dados
            })
            .then(response => response.json())
            .then(retorno => {
                if (retorno.sucesso) {
                    document.getElementById("msg").textContent = "Pergunta alterada com sucesso.";
                    document.getElementById("formEditar").style.display = "none";
                } else {
                    document.getElementById("msg").textContent = "Erro ao salvar.";
                }
            });
        };
    </script>
</body>

<?php

$arquivo = "perguntaserespostas.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['acao'])) {

    if ($_POST['acao'] === 'buscar' && isset($_POST['codigo'])) {
        $codigo = trim($_POST["codigo"]);
        $linhas = file($arquivo);
        foreach ($linhas as $i => $linha) {
            $dados = explode(";", $linha);
 
            if ($dados[0] === $codigo) {
                $resposta = [
                    "sucesso" => true,
                    "index" => $i,
                    "pergunta" => $dados[1],
                    "a" => $dados[2],
                    "b" => $dados[3],
                    "c" => $dados[4],
                    "d" => $dados[5],
                    "e" => $dados[6],
                    "gabarito" => trim($dados[7])
                ];
                echo json_encode($resposta);
                exit;
            }
        }
        echo json_encode(["sucesso" => false]);
        exit;
    }

    if ($_POST['acao'] === 'salvar') {
        $index = intval($_POST["index"]);
        $linhaEditada =
            $_POST["codigo"] . ";"
            . $_POST["pergunta"] . ";"
            . $_POST["a"] . ";"
            . $_POST["b"] . ";"
            . $_POST["c"] . ";"
            . $_POST["d"] . ";"
            . $_POST["e"] . ";"
            . $_POST["gabarito"] . "\n";
        $linhas = file($arquivo);
        $linhas[$index] = $linhaEditada;
        file_put_contents($arquivo, implode("", $linhas));
        echo json_encode(["sucesso" => true]);
        exit;
    }
}
echo json_encode(["sucesso" => false]);

</html>
