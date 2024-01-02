<?php
$servername = "xmysql.oticasmundialita.com";
$username = "oticasmundialit1";
$password = "Lindabrao875@678";
$dbname = "oticasmundialita1";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["codigo_barras"])) {
    $codigo_barras = $_POST["codigo_barras"];
    $stmt = $conn->prepare("SELECT * FROM modelo WHERE codigo_barras = ?");
    $stmt->bind_param("s", $codigo_barras);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
        echo $codigo_barras . " - " . $produto["nome_produto_venda"] . " - R$ " . $produto["preco_venda_desejado"];
    } else {
        echo "Nenhum produto encontrado para o código de barras: " . $codigo_barras;
    }

    $stmt->close();
}

$conn->close();
?>
