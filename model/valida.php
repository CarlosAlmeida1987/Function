	<?php
session_start();
date_default_timezone_set('America/Fortaleza');
$_SESSION['vendas'];
$_SESSION['carinho'];
$_SESSION['cript'];
date('H:i:s', $_SESSION['hora']);

if(!isset($_SESSION["cript"]) || !isset($_SESSION["hora"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: ../index.php");
exit;
}
?>