<?php
session_start(); // Inicia a sessão ou retoma a sessão existente

if (!isset($_SESSION['resultados_pesquisa'])) {
    $_SESSION['resultados_pesquisa'] = []; // Inicializa a variável de sessão para armazenar os resultados
}

$servername = "xmysql.oticasmundialita.com";
$username = "oticasmundialit1";
$password = "Lindabrao875@678";
$dbname = "oticasmundialita1";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["codigo_barras"])) {
        $codigo_barras_pesquisa = $_POST["codigo_barras"];
        $stmt = $conn->prepare("SELECT * FROM modelo WHERE codigo_barras = ?");
        $stmt->bind_param("s", $codigo_barras_pesquisa);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $produtos_encontrados = [];

            while ($row = $result->fetch_assoc()) {
                $produtos_encontrados[] = $row;
            }

            // Armazena os resultados na variável de sessão
            $_SESSION['resultados_pesquisa'][] = $produtos_encontrados;
        } else {
            echo "Nenhum resultado encontrado para o código de barras: $codigo_barras_pesquisa";
        }

        $stmt->close();

        // Redireciona para a mesma página para evitar o reenvio do formulário
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/logo_empresa.JPG" type="image/x-icon">
    <title>Pesquisa com leitor de código de barra</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="cadastro.css">
</head>

<body style=" background-color:#F3F3F3">
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img id="logo" src="image/labelimage/iconNameLabel.jpeg" alt="Logo Padrão" />
                <span></span>
            </a>
            <button type="button" class="btn-close" style="background-color: white; color:black;" aria-label="Close" onclick="sair()"></button>
        </div>
    </nav><br>
    <div class="container">
        <h1>
            Carrinho
            <img class="imgIconCarrinho" src="image/labelimage/carrinho-de-compras.png" alt="Logo Padrão" />
        </h1>
        <form method="post" action="">
            <input type="text" name="codigo_barras" id="codigo_barras" placeholder="Digite aqui o código de barras do produto">
            <input class="pesq" type="submit" value="Pesquisar">
        </form>

    </div>
    <section class="resultTotalVenda">
        <?php
        // Exibe resultados das pesquisas anteriores
        $total = 0;
        $count = 0;
        if (!empty($_SESSION['resultados_pesquisa'])) {
            // echo "<table border='1'>";
            echo "<div class=\"table-responsive\">";
            echo "<table class=\"table table-bordered table-striped\">";
            echo "<thead>";
            echo "<tr><th>Código de Barras</th><th>Nome do Produto na Venda</th><th>Preço de Venda Desejado</th></tr>";
            echo "</thead>";

            foreach ($_SESSION['resultados_pesquisa'] as $resultados) {
                foreach ($resultados as $produto) {
                    $count = $count + 1;

                    echo "<tbody id=\"conteudoTabela\">";
                    echo "<tr>";
                    echo "<td>" . $produto["codigo_barras"] . "</td>";
                    echo "<td>" . $produto["nome_produto_venda"] . "</td>";
                    echo "<td>R$ " . $produto["preco_venda_desejado"] . "</td>";
                    echo "</tr>";
                    $total = $total + $produto["preco_venda_desejado"];
                }
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "Subtotal ($count produtos): R$ $total.<br>";
            // Botão/link para limpar os resultados da pesquisa
            echo "<a href='limpar_sessao.php'>Limpar Resultados</a>";
        }
        ?>
    </section>
    <footer>
        <button class="next-page-button" onclick="irParaProximaPagina()">Fechar Pedido ></button>
    </footer>

    <script>
        document.getElementById('codigo_barras').addEventListener('change', function() {
            document.forms[0].codigo_barras.value = String(document.forms[0].codigo_barras.value);
            document.forms[0].submit();
        });

        function sair() {
            window.location.href = "inicial.php";
        }

        function irParaProximaPagina() {
            window.location.href = 'vendas.php';
        }
    </script>

</body>

</html>