<?php
 /* Dados do Banco de Dados a conectar */
date_default_timezone_set('America/Fortaleza');
$Servidor = 'localhost';
$nomeBanco = 'trimetri_mesa';
$Usuario = 'trimetri_mesa';
$Senha = 'Grifo@1987';
$strcon = mysqli_connect($Servidor, $Usuario, $Senha, $nomeBanco); 
?>