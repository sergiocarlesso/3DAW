const formulario = document.querySelector('.formulario');

formulario.addEventListener('submit', function(evento) {
    evento.preventDefault(); 

    
    const dadosFormulario = new FormData(formulario);

    
    fetch('salvar_agendamento.php', {
        method: 'POST',
        body: dadosFormulario
    })
    .then(resposta => resposta.json()) 
    .then(dados => {
        if (dados.sucesso) {
            
            alert("Agendamento realizado com sucesso! Entraremos em contacto.");
            formulario.reset(); 
        } else {
            
            alert("Erro ao agendar: " + dados.mensagem);
        }
    })
    .catch(erro => {
        console.error('Erro:', erro);
        alert("Ocorreu um erro na comunicação com o servidor.");
    });
});