async function cadastrar(){ // funcao assincrona, ou seja aceita await dentro pra pagina nao travar
    var form = document.getElementById("formCadastro"); //pega os elementos do form de cadastro no html
    var form_dados = new FormData(form); //passa esses elementos pro objeto FormData com o formato certo


    var retorno = await fetch("../php/cadastrar.php", {
        method: "POST",
        body: form_dados
    }); // faz uma requisicao (fetch) HTTP POST pro php (cadastrar.php) enviando o form_dados como corpo da requisição
    // a variavel retorno guarda o objeto response do servidor
    var dados = await retorno.json() // converte o conteudo da resposta pra JSON

    console.log(dados)

    if (dados.status === 's'){
        alert(dados.mensagem);
        window.location.href = "../paginaLogin/index.html";
    } else {
        alert(dados.mensagem)
    }
}