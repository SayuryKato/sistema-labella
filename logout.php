<?php
session_start();

// Destrua a sessão para fazer logout
session_destroy();

// aqui faz com que  Desabilite o cache
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Redirecione o usuário para a página de login
header('Location: index.php');
exit;
?>
