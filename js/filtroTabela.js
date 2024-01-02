const INPUT_BUSCA = document.getElementById('filtroTable');
const TABELA_CONTEUDO = document.getElementById('conteudoTabela');

INPUT_BUSCA.addEventListener('keyup', () => {
    let expressao = INPUT_BUSCA.value.toLowerCase();
    let linhas = TABELA_CONTEUDO.getElementsByTagName('tr');

    for (let posicao in linhas) {
        if (true === isNaN(posicao)) {
            continue;
        }
        let conteudoDaLinha = linhas[posicao].innerHTML.toLowerCase();
        if (true === conteudoDaLinha.includes(expressao)) {
            linhas[posicao].style.display = '';
            linhas.innerHTML = conteudoDaLinha.replace(new RegExp(expressao, "gi"), (match) => {
                return "<strong>" + match + "</strong>";
            });
        } else {
            linhas[posicao].style.display = 'none';
        }
    }
})

function confirmarExclusao() {
    return confirm("Tem certeza que deseja excluir este registro?");
}

if (window.location.search.includes('excluido=true')) {
    let mensagem = document.getElementById('mensagem-sucesso');
    mensagem.classList.remove('oculto'); // Mostra a mensagem alterando a classe
    
    setTimeout(function () {
        mensagem.classList.add('oculto'); // Oculta a mensagem após 3 segundos
        history.replaceState({}, document.title, window.location.pathname); // Remove os parâmetros da URL
    }, 2000); // Tempo em milissegundos (3 segundos no exemplo)
}
