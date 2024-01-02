<?php
$servername = "xmysql.oticasmundialita.com";
$username = "oticasmundialit1";
$password = "Lindabrao875@678";
$dbname = "oticasmundialita1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
$numero_nota_fiscal = $_POST['numero_nota_fiscal'];
$data_nota_fiscal = $_POST['data_nota_fiscal'];
$fornecedor = $_POST['fornecedor'];
$categoria = $_POST['categoria'];
$codigo = $_POST['codigo'];
$quantidade = $_POST['quantidade'];
$nome_produto = $_POST['nome_produto'];
$preco_compra = $_POST['preco_compra'];
$desconto_percentual = $_POST['desconto_percentual'];
$valor_final_compra = $_POST['valor_final_compra'];
$porc_lucro_venda = $_POST['porc_lucro_venda'];
$preco_venda_desejado = $_POST['preco_venda_desejado'];
$nome_produto_venda = $_POST['nome_produto_venda'];
$preco_venda_calculado = $preco_venda_desejado;
function gerarCodigoBarrasUnico() {
    $prefixo = '972';
    $numerosAleatorios = array_map('strval', array_unique(range(0, 9)));
    while (count($numerosAleatorios) < 9) {
        $numerosAleatorios[] = rand(0, 9);
    }
    shuffle($numerosAleatorios);
    return $prefixo . implode('', $numerosAleatorios);
}

$codigo_barras = gerarCodigoBarrasUnico();

$sql = "INSERT INTO modelo (
    id, numero_nota_fiscal, data_nota_fiscal, fornecedor, categoria, codigo, codigo_barras, 
    quantidade, nome_produto, preco_compra, desconto_percentual, valor_final_compra, preco_venda_desejado, nome_produto_venda, preco_venda_calculado
) VALUES (
    NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssssdssdsssd", $numero_nota_fiscal, $data_nota_fiscal, $fornecedor, $categoria, $codigo, $codigo_barras, 
    $quantidade, $nome_produto, $preco_compra, $desconto_percentual, $valor_final_compra, $preco_venda_desejado, $nome_produto_venda, $preco_venda_calculado);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<div style='text-align: center;'>";
    echo "<img id=\"logo\" src=\"image/labelimage/iconNameLabel.jpeg\" alt=\"Logo Padrão\" style=\"height: 25px;\"/><br>";
    echo "<strong>Nome do Produto:</strong>$nome_produto_venda<br>";
    echo "<img src='https://barcode.tec-it.com/barcode.ashx?data=$codigo_barras'/><br>";
    echo "<strong>Preço R$:</strong> $preco_venda_calculado<br>";
    echo "Salve esta imagem <br>";
    echo "<a href='cadastro.php' style=\"text-decoration: none; padding: 2px; color: #fff; background-color: #df3b82; border: 1px solid #ccc; border-radius: 15px;\">Voltar</a>";
} else {
    echo "Erro na inserção do registro: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
