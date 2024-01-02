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
      <h2 style="text-align: center;">Cadastro do Cliente</h2>
    </div>

    <form class="centerContainer" action="" method="post">
      <div class="primeiradiv">
        <fieldset>
          <p>
            <label for="nome_cliente"><strong>Nome Completo:</strong></label>
            <input class="responsInput" type="text" id="nome_cliente" name="nome_cliente" required>
          </p>
          <p>
            <label for="cpf_cliente"> <strong>CPF:</strong></label>
            <input class="responsInput" type="text" id="cpf_cliente" name="cpf_cliente" required>
          </p>
          <p>
            <label for="rg_cliente"> <strong>RG:</strong></label>
            <input class="responsInput" type="number" id="rg_cliente" name="rg_cliente" required>
          </p>
          <p>
            <label for="nascimento_cliente"> <strong>Data de Nascimento:</strong></label>
            <input class="responsInput" type="date" id="nascimento_cliente" name="nascimento_cliente" required>
          </p>

        </fieldset>
      </div>
      <div class="segundadiv">
        <fieldset>
          <p>
            <label for="cep_endereco"> <strong>CEP:</strong></label>
            <input class="responsInput" type="text" id="cep_endereco" name="cep_endereco" oninput="buscarEnderecoPorCEP()" placeholder="69100000">
          </p>
          <p>
            <label for="endereco_cliente"> <strong>Endereço:</strong></label>
            <input class="responsInput" type="text" id="endereco_cliente" name="endereco_cliente">
          </p>
          <p>
            <label for="numero_casa"> <strong>Número:</strong></label>
            <input class="responsInput" type="number" id="numero_casa" name="numero_casa">
          </p>
          <p>
            <label for="bairro_cliente"> <strong>Bairro:</strong></label>
            <input class="responsInput" type="text" id="bairro_cliente" name="bairro_cliente">
          </p>

          <p>
            <label for="comple_endereco"> <strong>Complemento:</strong></label>
            <input class="responsInput" type="text" id="comple_endereco" name="comple_endereco">
          </p>
          <p>
            <label for="cidade_endereco"> <strong>Cidade:</strong></label>
            <input class="responsInput" type="text" id="cidade_endereco" name="cidade_endereco">
          </p>
        </fieldset>
      </div>
      <div><br>
        <div class="primeiradiv">
          <fieldset>
            <p>
              <label for="telefone_cliente"> <strong>Telefone:</strong></label>
              <input class="responsInput" type="text" id="telefone_cliente" name="telefone_cliente">
            </p>
            <p>
              <label for="celular_cliente"> <strong>Celular:</strong></label>
              <input class="responsInput" type="text" id="celular_cliente" name="celular_cliente" oninput="formatarNumero()" required placeholder="(DDD) 00000-0000">
            </p>
            <p>
              <label for="email_cliente"> <strong>E-mail:</strong></label>
              <input class="responsInput" type="email" id="email_cliente" name="email_cliente" placeholder="ex: joao@gmail.com">
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

    function formatarNumero() {
      const inputTelefone = document.getElementById('celular_cliente');
      let numeroFormatado = inputTelefone.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

      if (numeroFormatado.length > 11) { // Verifica se o número ultrapassa 11 dígitos (incluindo DDD)
        numeroFormatado = numeroFormatado.substr(0, 11); // Limita o número para 11 dígitos
      }

      if (numeroFormatado.length > 2) {
        numeroFormatado = `(${numeroFormatado.substring(0, 2)}) ${numeroFormatado.substring(2)}`;
      }

      if (numeroFormatado.length > 10) {
        numeroFormatado = `${numeroFormatado.substring(0, 10)}-${numeroFormatado.substring(10)}`;
      }

      inputTelefone.value = numeroFormatado;
    }

    function buscarEnderecoPorCEP() {
      const cep = document.getElementById('cep_endereco').value.replace(/\D/g, '');
      if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
          .then(response => response.json())
          .then(data => {
            if (data.erro) {
              alert('CEP não encontrado.');
            } else {
              // document.getElementById('logradouro').value = data.logradouro;
              document.getElementById('bairro_cliente').value = data.bairro;
              document.getElementById('cidade_endereco').value = data.localidade;
              // document.getElementById('uf').value = data.uf;
            }
          })
          .catch(error => {
            console.error('Erro ao buscar o endereço:', error);
          });
      }

    }
  </script>

</body>

</html>