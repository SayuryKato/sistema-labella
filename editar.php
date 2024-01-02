<?php
$servername = "xmysql.oticasmundialita.com";
$username = "oticasmundialit1";
$password = "Lindabrao875@678";
$dbname = "oticasmundialita1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Recupera os dados do registro que você deseja editar
    $sql = "SELECT * FROM modelo WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <title>Editar Dados</title>
        </head>
        <body>
            <div class="container">
                <h2 style="text-align: center; color: #0838BC;">Editar Dados</h2>
                <form action="processar_edicao.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <!-- Campos para editar -->
                    <div class="mb-3">
                        <label for="numero_nota_fiscal" class="form-label">Nº Nota Fiscal:</label>
                        <input type="text" class="form-control" id="numero_nota_fiscal" name="numero_nota_fiscal" value="<?php echo $row['numero_nota_fiscal']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="data_nota_fiscal" class="form-label">Data Nota Fiscal:</label>
                        <input type="date" class="form-control" id="data_nota_fiscal" name="data_nota_fiscal" value="<?php echo $row['data_nota_fiscal']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="fornecedor" class="form-label">Fornecedor:</label>
                        <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="<?php echo $row['fornecedor']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca:</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $row['marca']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade:</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $row['quantidade']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="nome_produto" class="form-label">Nome do Produto:</label>
                        <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo $row['nome_produto']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="preco_compra" class="form-label">Preço do Produto da Compra:</label>
                        <input type="number" step="0.01" class="form-control" id="preco_compra" name="preco_compra" value="<?php echo $row['preco_compra']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="desconto_percentual" class="form-label">Desconto Percentual:</label>
                        <input type="number" step="0.01" class="form-control" id="desconto_percentual" name="desconto_percentual" value="<?php echo $row['desconto_percentual']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="valor_final_compra" class="form-label">Valor Final de Compra:</label>
                        <input type="number" step="0.01" class="form-control" id="valor_final_compra" name="valor_final_compra" value="<?php echo $row['valor_final_compra']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="preco_venda_desejado" class="form-label">Preço de Venda Desejado:</label>
                        <input type="number" step="0.01" class="form-control" id="preco_venda_desejado" name="preco_venda_desejado" value="<?php echo $row['preco_venda_desejado']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="preco_venda_calculado"> <strong>Preço de Venda Calculado:</strong></label>
                        <input type="text" id="preco_venda_calculado" name="preco_venda_calculado" value="<?php echo $row['preco_venda_calculado']; ?>">
</div>


                    <div class="mb-3">
                        <label for="nome_produto_venda" class="form-label">Nome do Produto na Venda:</label>
                        <input type="text" class="form-control" id="nome_produto_venda" name="nome_produto_venda" value="<?php echo $row['nome_produto_venda']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar Edições</button>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Registro não encontrado.";
    }
}

$conn->close();
?>
