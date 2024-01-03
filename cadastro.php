<!DOCTYPE html>
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
    <!-- <div class="pdfconf">
      <form action="extrairpdf.php" method="post" enctype="multipart/form-data">
        <input type="file" name="pdfFile" />
        <input type="submit" value="Enviar PDF" />
      </form>
    </div> -->
    <form class="centerContainer" action="processar_formulario.php" method="post">
      <div class="primeiradiv">
        <fieldset>
          <p>
            <label for="numero_nota_fiscal"><strong>Número da Nota Fiscal:</strong></label>
            <input class="responsInput" type="text" id="numero_nota_fiscal" name="numero_nota_fiscal" required>
          </p>
          <p>
            <label for="data_nota_fiscal"> <strong>Data da Nota Fiscal:</strong></label>
            <input class="responsInput" type="date" id="data_nota_fiscal" name="data_nota_fiscal" required>
          </p>
          <p>
            <label for="fornecedor"> <strong>Fornecedor:</strong></label>
            <input class="responsInput" type="text" id="fornecedor" name="fornecedor" required>
          </p>
          <label for="categoria"><strong>Escolha uma categoria:</strong></label>
          <select class="responsInput" id="categoria" name="categoria">
            <option value="artigo-esportivo">Artigo Esportivo</option>
            <option value="artigo-cozinha">Artigo de Cozinha</option>
            <option value="artigo-decoracao">Artigo de Decoração</option>
            <option value="artigo-festas">Artigo de Festas</option>
            <option value="artigos-natalino">Artigos Natalinos</option>
            <option value="brinquedos">Brinquedos</option>
            <option value="ferramentaria">Ferramentaria</option>
            <option value="flores-acessorios">Flores e Acessórios</option>
            <option value="material-escolar">Material Escolar</option>
            <option value="material-expediente">Material de Expediente</option>
            <option value="perfumaria">Perfumaria</option>
            <option value="placas-luminosas">Placas Luminosas</option>
            <option value="plasticos-geral">Plásticos em Geral</option>
            <option value="praia">Artigos de Praia</option>
            <option value="relojoaria">Relojoaria</option>
            <option value="vidros">Vidros</option>
          </select>
        </fieldset>
      </div>
      <div class="segundadiv">
        <fieldset>
          <p>
            <label for="codigo"> <strong>Código:</strong></label>
            <input class="responsInput" type="text" id="codigo" name="codigo">
          </p>
          <p>
            <label for="quantidade"> <strong>Quantidade:</strong></label>
            <input class="responsInput" type="number" id="quantidade" name="quantidade">
          </p>

          <p>
            <label for="nome_produto"> <strong>Nome do Produto:</strong></label>
            <input class="responsInput" type="text" id="nome_produto" name="nome_produto">
          </p>
          <p>
            <label for="preco_compra"> <strong>Preço do produto da Compra:</strong></label>
            <input class="responsInput" type="number" step="0.01" id="preco_compra" name="preco_compra" oninput="calc_desconto()">
          </p>
          <p>
            <label for="desconto_percentual"> <strong>Desconto Percentual(%):</strong></label>
            <input class="responsInput" type="number" step="0.01" id="desconto_percentual" name="desconto_percentual" value="0" oninput="calc_desconto()">
          </p>
          <p>
            <label for="valor_final_compra"> <strong>Valor Final de Compra:</strong></label>
            <input class="responsInput" type="number" step="0.01" id="valor_final_compra" name="valor_final_compra">
          </p>
        </fieldset>
      </div>
      <div><br>
        <div class="primeiradiv">
          <fieldset>
            <p>
              <label for="porc_lucro_venda"> <strong>Porcentagem de Lucro(%):</strong></label>
              <input class="responsInput" type="number" step="0.01" id="porc_lucro_venda" name="porc_lucro_venda" oninput="calc_lucro()" required>
            </p>
            <p>
              <label for="preco_venda_desejado"> <strong>Preço de Venda Desejado:</strong></label>
              <input class="responsInput" type="number" step="0.01" id="preco_venda_desejado" name="preco_venda_desejado">
            </p>
            <p>
              <label for="nome_produto_venda"> <strong>Nome do Produto na Venda:</strong></label>
              <input class="responsInput" type="text" id="nome_produto_venda" name="nome_produto_venda">
            </p>

          </fieldset>
        </div>
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

    function calc_desconto() {
      let preco_produto = parseFloat(document.getElementById("preco_compra").value);
      let desconto_produto = parseFloat(document.getElementById("desconto_percentual").value);
      if (!isNaN(preco_produto) && !isNaN(desconto_produto)) {
        var valor_final = preco_produto - (preco_produto * (desconto_produto / 100));
        document.getElementById('valor_final_compra').value = valor_final.toFixed(2);
        calc_lucro();
      }
    }

    function calc_lucro() {
      let valor_final_compra = parseFloat(document.getElementById("valor_final_compra").value);
      let lucro_produto = parseFloat(document.getElementById("porc_lucro_venda").value);
      if (!isNaN(valor_final_compra) && !isNaN(lucro_produto)) {
        var preco_final = valor_final_compra + (valor_final_compra * (lucro_produto / 100));
        document.getElementById('preco_venda_desejado').value = preco_final.toFixed(2);
      }
    }

    function extrairpdf() {
      window.location.href = "extrairpdf.php";
    }

    // Atualiza o texto com o nome do arquivo selecionado
    // document.getElementById('fileInput').addEventListener('change', function() {
    //   const fileInput = document.getElementById('fileInput');
    //   const fileName = document.getElementById('fileName');
    //   if (fileInput.files.length > 0) {
    //     fileName.textContent = 'Arquivo selecionado: ' + fileInput.files[0].name;
    //   } else {
    //     fileName.textContent = '';
    //   }
    // });
  </script>

</body>

</html>