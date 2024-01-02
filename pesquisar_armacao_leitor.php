<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "xmysql.oticasmundialita.com";
    $username = "oticasmundialit1";
    $password = "Lindabrao875@678";
    $dbname = "oticasmundialita1";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    if (isset($_POST["codigo_barras"])) {
        $codigo_barras_pesquisa = $_POST["codigo_barras"];
        $stmt = $conn->prepare("SELECT * FROM modelo WHERE codigo_barras = ?");
        $stmt->bind_param("s", $codigo_barras_pesquisa);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Número da Nota Fiscal: " . $row["numero_nota_fiscal"] . "<br>";
                echo "Data da Nota Fiscal: " . $row["data_nota_fiscal"] . "<br>";
                echo "Fornecedor: " . $row["fornecedor"] . "<br>";
                echo "Código de Barras: " . $row["codigo_barras"] . "<br>";
                echo "Preço de Venda Desejado: R$ " . $row["preco_venda_desejado"]. "<br>";
            }
        } else {
            echo "Nenhum resultado encontrado para o código de barras: $codigo_barras_pesquisa";
        }

        $stmt->close();
    }
    $conn->close();
}
?>
