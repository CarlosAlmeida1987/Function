<?Php
   
$database="localhost"; // SERVIDOR E PORTA UTILIZADA   
$dbname="trimetria_com_br1"; // BASE DE DADOS 
$usuario="trimetria1"; // USU�RIO DO MYSQL
$dbsenha="grifo1987"; // SENHA DO MYSQL

$conexao=mysql_connect ($database, $usuario, $dbsenha);
if($conexao){
      if (mysql_select_db($dbname, $conexao)){ print "ok";
      }else{ print "N�o foi poss�vel selecionar o Banco de Dados"; }
}else{ print "Erro ao conectar o MySQL"; }
?>
