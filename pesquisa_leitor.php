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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label class="textCodigo" for="codigo_barras">Código de Barras</label>
            <input type="text" name="codigo_barras" id="codigo_barras" class="oi" autofocus required placeholder="Digite aqui o código de barras do produto">
            <input class="pesq" type="submit" value="Pesquisar">
        </form>

    </div>

    <section class="resultCodBarras">
        <?php
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
                    echo "Código de Barras: " . $row["codigo_barras"] . "<br>";
                    echo "Número da Nota Fiscal: " . $row["numero_nota_fiscal"] . "<br>";
                    echo "Data da Nota Fiscal: " . $row["data_nota_fiscal"] . "<br>";
                    echo "Fornecedor: " . $row["fornecedor"] . "<br>";
                    echo "Preço de Venda Desejado: R$ " . $row["preco_venda_desejado"]. "<br>";
                }
            } else {
                echo "Nenhum resultado encontrado para o código de barras: $codigo_barras_pesquisa";
            }

            $stmt->close();
        }
        $conn->close();
        ?>
    </section>
    <script>
        document.getElementById('codigo_barras').addEventListener('change', function() {
            document.forms[0].codigo_barras.value = String(document.forms[0].codigo_barras.value);
            document.forms[0].submit();
        });
    </script>
    <script>
        function sair() {
            window.location.href = "inicial.php";
        }
    </script>

</body>

</html>