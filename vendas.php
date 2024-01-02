<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/logo_empresa.JPG" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="css/mediaQ_cadastro.css">
    <title>Venda</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style=" background-color:#F3F3F3" onload="preencherDataAtual()">
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img id="logo" src="image/labelimage/iconNameLabel.jpeg" alt="Logo Padrão" />
            </a>
            <button type="button" class="btn-close" style="background-color: white; color:black;" aria-label="Close" onclick="sair()"></button>
        </div>
    </nav><br>

    <div class="container">
        <div class="logo">
            <h2 style="text-align: center;">Cadastro de Venda</h2>
        </div>

        <form class="centerContainer" action="" method="post">
            <div class="primeiradiv">
                <fieldset>
                    <p>
                        <label for="nome_cliente"><strong>Nome do Cliente:</strong></label>
                        <input class="responsInput" type="text" id="nome_cliente" name="nome_cliente">
                    </p>
                    <p>
                        <label for="cpf_cliente"> <strong>CPF:</strong></label>
                        <input class="responsInput" type="text" id="cpf_cliente" name="cpf_cliente">
                    </p>

                </fieldset>
            </div>
            <div class="segundadiv">
                <fieldset>
                    <p>
                        <label for="produtosSelecionados"> <strong>Produtos Selecionados:</strong></label>
                        <input type="number" name="produtosSelecionados" id="produtosSelecionados">
                        <button id="pesquisar">Pesquisar</button>
                    <div id="produtosSelecionados">
                        <ul id="listaProdutos">
                        </ul>
                    </div>
                    </p>
                    <p>
                        <label for="dataVenda"> <strong>Data da Venda:</strong></label>
                        <input class="responsInput" type="date" id="dataVenda" name="dataVenda">
                    </p>

                    <p>
                        <label for="total_venda"> <strong>Total:</strong></label>
                        <input class="responsInput" type="text" id="total_venda" name="total_venda">
                    </p>
                </fieldset>
            </div>
            <div><br>
                <div class="primeiradiv">
                    <fieldset>
                        <p>
                            <label for="categoria_pagamento"><strong>Método de Pagamento:</strong></label>
                            <select class="responsInput" id="categoria_pagamento" name="categoria_pagamento">
                                <option value="metodo_dinheiro">Dinheiro</option>
                                <option value="metodo_cheque">Cheque</option>
                                <option value="metodo_debito">Cartão (DÉBITO)</option>
                                <option value="metodo_credito">Cartão (CRÉDITO)</option>
                                <option value="metodo_pix">PIX</option>
                            </select>
                        </p>
                        <p>
                            <label for="parcelas_cartao"> <strong>Parcelas:</strong></label>
                            <input class="responsInput" type="text" id="parcelas_cartao" name="parcelas_cartao" required>
                        </p>
                        <p>
                            <label for="nome_funcionario"> <strong>Vendido por:</strong></label>
                            <input class="responsInput" type="text" id="nome_funcionario" name="nome_funcionario">
                        </p>

                    </fieldset>
                </div>
            </div>

            <p>
            <div class="input-group">
                <input id="btnCadastro" type="submit" value="Cadastrar">
                <!-- <button class="back-page-button" onclick="VoltarProximaPagina()">< Voltar </button> -->
            </div>
            </p>
        </form>
    </div>
    <script>
        function sair() {
            window.location.href = "inicial.php";
        }

        function preencherDataAtual() {
            const dataAtual = new Date().toISOString().split('T')[0]; // Obtém a data atual no formato YYYY-MM-DD
            document.getElementById('dataVenda').value = dataAtual; // Preenche o campo de data com a data atual
        }

        // function VoltarProximaPagina() {
        //     window.history.back();
        // }

        // $(document).ready(function() {
        //     $('#produtosSelecionados').on('input', function() {
        //         var codigo = $(this).val();

        //         // Fazer a requisição AJAX
        //         $.ajax({
        //             url: 'buscar_produto.php', // Arquivo PHP para buscar informações do produto
        //             method: 'POST',
        //             data: {
        //                 codigo_barras: codigo
        //             },
        //             success: function(response) {
        //                 $('#listaProdutos').html(response);
        //             }
        //         });
        //     });
        // });
        $(document).ready(function(){
            $('#pesquisar').on('click', function(){
                var codigo = $('#produtosSelecionados').val();

                // Fazer a requisição AJAX
                $.ajax({
                    url: 'buscar_produto.php', // Arquivo PHP para buscar informações do produto
                    method: 'POST',
                    data: { codigo_barras: codigo },
                    success: function(response){
                        $('#listaProdutos').append('<li>' + response + '</li>');
                    }
                });
            });
        });
    </script>

</body>

</html>