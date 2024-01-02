<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dados cadastrados</title>
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="css/cores.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img id="logo" src="image/labelimage/iconNameLabel.jpeg" alt="Logo Padrão" />
                <span>Área de Cadastros</span>
            </a>
            <button type="button" class="btn-close" style="background-color: white; color:black;" aria-label="Close" onclick="sair()"></button>
        </div>
    </nav><br>
    <div class="container">
        <h2 style="text-align: center; color: #000;">Dados Cadastrados</h2>

        <div class="filtroMsg">
            <input type="text" name="filtroTable" id="filtroTable" placeholder="O que você procura?">
            <span id="mensagem-sucesso" class="mensagem-sucesso oculto">
                Registro excluído com sucesso!
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nº Nota Fiscal</th>
                        <th>Data Nota Fiscal</th>
                        <th>Fornecedor</th>
                        <th>Categoria</th>
                        <th>Código</th>
                        <th>Código de Barras</th>
                        <th>Quantidade</th>
                        <th>Nome do Produto</th>
                        <th>Preço de Compra</th>
                        <th>Desconto Percentual</th>
                        <th>Valor Final de Compra</th>
                        <th>Preço de Venda Calculado</th>
                        <th>Nome do Produto na Venda</th>
                        <th>Ações</th>
                        <th>Editar Dados</th>
                    </tr>
                </thead>
                <tbody id="conteudoTabela">
                    <?php
                    $servername = "xmysql.oticasmundialita.com";
                    $username = "oticasmundialit1";
                    $password = "Lindabrao875@678";
                    $dbname = "oticasmundialita1";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM modelo";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['numero_nota_fiscal']}</td>";
                            echo "<td>{$row['data_nota_fiscal']}</td>";
                            echo "<td>{$row['fornecedor']}</td>";
                            echo "<td>{$row['categoria']}</td>";
                            echo "<td>{$row['codigo']}</td>";
                            echo "<td>{$row['codigo_barras']}</td>";
                            echo "<td>{$row['quantidade']}</td>";
                            echo "<td>{$row['nome_produto']}</td>";
                            echo "<td>{$row['preco_compra']}</td>";
                            echo "<td>{$row['desconto_percentual']}</td>";
                            echo "<td>{$row['valor_final_compra']}</td>";
                            echo "<td>{$row['preco_venda_calculado']}</td>";
                            echo "<td>{$row['nome_produto_venda']}</td>";
                            echo "<td>
                                    <form action='excluir.php' method='POST' style='display:inline;' onsubmit='return confirmarExclusao()'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-danger'>Excluir</button>
                                    </form>
                                  </td>";
                            echo "<td> 
                                    <form action='editar.php' method='POST' style='display:inline;'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-primary'>Editar</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15' class='text-center'>Nenhum resultado encontrado.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function sair() {
            window.location.href = "inicial.php";
        }
    </script>
    <script src="js/filtroTabela.js"></script>
</body>

</html>