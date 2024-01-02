<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF</title>
</head>

<body>
<?php
// Verifica se um arquivo foi enviado
if ($_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
    $uploadPath = 'arq'; // Defina o caminho para salvar o PDF enviado
    $uploadedFile = $uploadPath . basename($_FILES['pdfFile']['name']);

    // Move o arquivo enviado para o diretório especificado
    if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadedFile)) {
        require 'vendor/autoload.php';

        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($uploadedFile);

        $text = $pdf->getText();
        // echo nl2br($text);
        
        // Encontrar a palavra-chave "DADOS DOS PRODUTOS"
        $pos = strpos($text, 'DADOS DOS PRODUTOS / SERVIÇOS');
        $posII = strpos($text, 'DADOS DOS PRODUTOS/SERVIÇOS');
        
        if ($pos !== false || $posII !== false) {
          // Defina a posição inicial para começar a extração após a palavra-chave
          $posicaoInicial = $pos !== false ? $pos : $posII;
          $tableText = substr($text, $posicaoInicial);
          
          // Explorar o texto da tabela para obter os dados necessários
          $linhas = explode("\n", $tableText);
          foreach ($linhas as $linha) {
            if (strpos($linha, 'CÓD. PROD') === false && strpos($linha, '|') === false) {
              // Esta linha não contém as informações desejadas, continue para a próxima linha
              continue;
            }
            // Explodir a linha usando espaços ou tabulações como separadores
            $dados = preg_split('/\s+/', $linha);
            // Verificar se a linha possui os campos desejados
            if (count($dados) >= 10) {
                  $codigoProduto = trim($dados[0]); // CÓDIGO PRODUTO
                  $quantidade = trim($dados[8]); // CÓDIGO PRODUTO
                  $valorTotal = trim($dados[1]); // CÓDIGO PRODUTO
                  $descService = trim($dados[14]); // CÓDIGO PRODUTO
      
                  // Imprimir apenas as colunas desejadas
                  echo "<strong>Código:</strong> " . $codigoProduto . "<br>";
                  echo "<strong>Quantidade:</strong> " . $quantidade . "<br>";
                  echo "<strong>Valor Total:</strong> " . $valorTotal . "<br>";
                  echo "<strong>Descrição dos Produtos / Serviço:</strong> " . $descService . "<br>";
                  echo "<hr>"; // Separador entre os registros, pode ser alterado conforme necessário
              }
          }
      } else {
          echo "Palavra-chave 'DADOS DOS PRODUTOS' não encontrada no PDF.";
      }
    }
  }
?>

</body>

</html>