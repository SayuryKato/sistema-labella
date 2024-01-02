<?php
session_start();
$servidor_remoto = "xmysql.oticasmundialita.com";
$usuario = $_POST['nome'];
$senha = $_POST['senha'];
$banco = "oticasmundialita1";
$conexao = mysqli_connect($servidor_remoto, $usuario, $senha, $banco);
if (!$conexao) {
  header("Location:index.php?mensagem=Usuário ou senha incorretos");
  exit();
}
if ($usuario == $_POST['nome'] && $senha == $_POST['senha']) 
{
  $_SESSION['autenticado'] = true;
  header("location:inicial.php");
    exit;
  }else {
    // login inválido, exibe uma mensagem de erro
    echo "Nome de usuário ou senha inválidos.";
  mysqli_close($conexao);
  }
?>

   