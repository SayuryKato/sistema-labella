<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: index.php'); // Redireciona para a página de login se o usuário não estiver autenticado
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="sistem oficial da ótica Mundial">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/logo_empresa.JPG" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Home</title>
    <link rel="stylesheet" href="./css/botao.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="css/mediaQ_cadastro.css">
    <link rel="stylesheet" href="css/cores.css">
    <link rel="shortcut icon" href="image/labelimage/iconLabel.ico" type="image/x-icon">
</head>
<body>
    <nav class="navbar">
        <div class="container">
          <a class="navbar-brand" href="#">
          <img id="logo" src="image/labelimage/iconNameLabel.jpeg" alt="Logo Padrão"/>
            <span>Área de opções</span>
          </a>
          </a>
            <button type="button" class="btn-close" style="background-color: white; color:black;" aria-label="Close"onclick="sair()" ></button>
        </div>
      </nav><br>
    <div class="container">
        <div class="row">
          <div class="col">
            <div id="cadastro-div" class="container">
        <div class="container teste">
                <button onclick="redirecionarParaCadastro()" class="btn b-cadastrar" > <strong> <span class="letras">Cadastrar</span></strong></button>
        </div>
    </div><br>
    <div class="container" id="animacaoBtn">
        <div class="container teste">
            <button onclick="cadastrar_lentes()" class="btn b-cadastrar">
            <strong> <span class="letras">Listar dados cadastrados</span></strong>
        </button>
        </div>
    </div><br>
    <div class="container" id="animacaoBtn">
        <div class="container teste">
            <button onclick="Pesquisar()" class="btn b-cadastrar">
            <strong> <span class="letras">Pesquisar </span></strong>
        </button>
        </div>
    </div><br>
          </div>
          <div class="col">
            <div class="container" id="animacaoBtn">
                <div class="container teste">
                   <button onclick="Vendas()" class="btn b-cadastrar">  <span class="letras"><strong>Vendas</strong></span></button> 
                </div>   
          </div><br>
          <div class="col">
            <div  class="container" id="animacaoBtn">
                <div class="container teste">
                        <button onclick="Cliente()" class="btn b-cadastrar"><strong> <span class="letras">Cliente</span></strong> </button></button>
                </div>
          </div>
        </div>
      </div>
      <script src="script.js"></script>
    <script>
        function redirecionarParaCadastro() {
            window.location.href = "cadastro.php"; 
        }
        function retornar() {
            window.location.href = "index.php"; 
        }
        function ListaArmacao() {
            window.location.href = "exibir_dados.php"; 
        }
        function Pesquisar() {
            window.location.href = "pesquisa_leitor.php"; 
        }
        function Cliente() {
            window.location.href = "cliente.php"; 
        }

        function Vendas() {
            window.location.href = "vendaListagemTotal.php"; 
        }
        function sair() {
            window.location.href = "logout.php"; 
        }
        function cadastrar_lentes() {
        window.location.href = "listagem.php"; // Redireciona para a nova página de cadastro
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

    <!-- <script src="../testejs/teste.js"></script>  -->
</body>
</html>