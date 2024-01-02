<?php
session_start(); // Inicia a sessão ou retoma a sessão existente

// Limpa os dados da sessão
$_SESSION = [];

// Destroi a sessão
session_destroy();

// Redireciona de volta para a página de resultados da pesquisa
header("Location: vendaListagemTotal.php");
exit;
?>
