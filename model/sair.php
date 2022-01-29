<?Php
session_start();
date_default_timezone_set('America/Fortaleza');
@$_SESSION['vendas'] = "";
@$_SESSION['carinho'] = "";
@$_SESSION['cript'] =  "";
@$_SESSION['valor'] = 0;
@$_SESSION['Qtd'] = 0;
@$_SESSION['hora'] = time();
@$DIA = date('H:i:s', $_SESSION['hora']);

header("Location: ../index.php");

?>