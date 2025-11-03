<?php
$alunos = [];

function incluirAluno(&$alunos, $nome, $matricula, $email) {
    $alunos[$matricula] = [
        'nome' => $nome,
        'matricula' => $matricula,
        'email' => $email
    ];
}

function alterarAluno(&$alunos, $matricula, $novoNome, $novoEmail) {
    if (isset($alunos[$matricula])) {
        $alunos[$matricula]['nome'] = $novoNome;
        $alunos[$matricula]['email'] = $novoEmail;
        return true;
    }
    return false;
}

// Função para excluir um aluno
function excluirAluno(&$alunos, $matricula) {
    if (isset($alunos[$matricula])) {
        unset($alunos[$matricula]);
        return true;
    }
    return false;
}

function listarAluno($alunos, $matricula) {
    if (isset($alunos[$matricula])) {
        return $alunos[$matricula];
    }
    return null;
}

function listarTodosAlunos($alunos) {
    return $alunos;
}

incluirAluno($alunos, 'João Silva', '123', 'joao@email.com');
alterarAluno($alunos, '123', 'João M. Silva', 'joaom@email.com');
$aluno = listarAluno($alunos, '123');
print_r($aluno);
$todos = listarTodosAlunos($alunos);
print_r($todos);
excluirAluno($alunos, '123');
?>
