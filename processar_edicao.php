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
    $numero_nota_fiscal = $_POST['numero_nota_fiscal'];
    $data_nota_fiscal = $_POST['data_nota_fiscal'];
    $fornecedor = $_POST['fornecedor'];
    $marca = $_POST['marca'];
    $codigo = $_POST['codigo'];
    $quantidade = $_POST['quantidade'];
    $nome_produto = $_POST['nome_produto'];
    $preco_compra = $_POST['preco_compra'];
    $desconto_percentual = $_POST['desconto_percentual'];
    $valor_final_compra = $_POST['valor_final_compra'];
    $preco_venda_desejado = $_POST['preco_venda_desejado'];
    $nome_produto_venda = $_POST['nome_produto_venda'];

    $sql = "UPDATE modelo SET
            numero_nota_fiscal = '$numero_nota_fiscal',
            data_nota_fiscal = '$data_nota_fiscal',
            fornecedor = '$fornecedor',
            marca = '$marca',
            codigo = '$codigo',
            quantidade = '$quantidade',
            nome_produto = '$nome_produto',
            preco_compra = '$preco_compra',
            desconto_percentual = '$desconto_percentual',
            valor_final_compra = '$valor_final_compra',
            preco_venda_desejado = '$preco_venda_desejado',
            nome_produto_venda = '$nome_produto_venda'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso!";
        header("location:listagem.php");
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}

$conn->close();
?>
