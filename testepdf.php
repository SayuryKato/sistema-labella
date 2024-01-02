<?php 

require 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser();

$pdf = $parser->parseFile('arq\64601_231221_120518.pdf');

$text = $pdf->getText();

echo nl2br($text);
?>









<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="shortcut icon" href="./img/logo_empresa.JPG" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <title>Formulário de Cadastro</title>
  <link rel="stylesheet" href="cadastro.css">
  <link rel="stylesheet" href="./css/nav.css">
  <link rel="stylesheet" href="css/pdf.css">
  <link rel="stylesheet" href="css/tabela.css">
  <link rel="stylesheet" href="css/mediaQ_cadastro.css">

</head>

<body style=" background-color:#F3F3F3">
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
      <h2 style="text-align: center;">Formulário de Cadastro</h2>
    </div>

    <form class="centerContainer" action="" method="post">
      <p>
        <label for="fileInput"><strong>Selecione o PDF:</strong></label>
        <!-- <input type="file" name="selecpdf" id="selecpdf" accept=".pdf"> -->
        <input type="file" id="fileInput" accept=".pdf">
        <button onclick="handlePDF()">Enviar PDF</button>
      </p>
      <p><strong>Comentário:</strong> Depois de selecionar o PDF ele automáticamente atualizará cada informação na sua linha, se tudo estiver OK então poderá cadastrar vários produtos de uma vez, se alguma informação estiver errada o usuário poderá editar.</p>
      <div class="table-responsive" style="margin-top: 50px;">
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
            <a href="testepdf.php">Teste</a>
            <?php

            require 'vendor/autoload.php';

            $parser = new \Smalot\PdfParser\Parser();

            $pdf = $parser->parseFile('arq\64601_231221_120518.pdf');

            $text = $pdf->getText();

            echo nl2br($text);
            ?>
          </tbody>
        </table>
      </div>
      <p>
      <div class="input-group">
        <input id="btnCadastro" type="submit" value="Cadastrar">
      </div>
      </p>

    </form>
  </div>

  <script>
    function sair() {
      window.location.href = "inicial.php";
    }

    function handlePDF() {
      const fileInput = document.getElementById('fileInput');
      const file = fileInput.files[0];

      if (file) {
        
        const reader = new FileReader();

        reader.onload = function(event) {
          const contents = event.target.result;
         
          console.log('Conteúdo do PDF:', contents);
        };

        reader.readAsArrayBuffer(file);
      } else {
        console.log('Nenhum arquivo selecionado.');
      }
    }
  </script>
</body>

</html> -->