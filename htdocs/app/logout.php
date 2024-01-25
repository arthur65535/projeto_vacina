<?php
// Inicia ou retoma a sessão
session_start();

// Destrói todas as variáveis de sessão
session_destroy();

// Redireciona para a página de login (ou qualquer outra página de sua escolha)
header("Location: login.php");
exit();
?>