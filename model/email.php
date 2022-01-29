<?php
    

if (isset($_POST['BTEnvia'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $telefone = $_POST['phone']; 
 $mensagem = $_POST['mensagem'];
 //====================================================
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //==================================================== 
 $email_remetente = "trimetria@task.com.br"; // deve ser uma conta de email do seu dominio 
 //====================================================
 
 //Configurações do email, ajustar conforme necessidade
 //==================================================== 
 $email_destinatario = "dsigner3d@gmail.com"; // pode ser qualquer email que receberá as mensagens
 $email_destinatario2 = "trimetria@hotmail.com"; // pode ser qualquer email que receberá as mensagens
 $email_reply = "$email"; 
 $email_assunto = "Contato Trimetria Vendas"; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================
 $email_conteudo = "Nome = $nome \n"; 
 $email_conteudo .= "Email = $email \n";
 $email_conteudo .= "Telefone = $telefone \n"; 
 $email_conteudo .= "Mensagem = $mensagem \n"; 
 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 //Enviando o email 
 //==================================================== 
 if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
 echo "</b>E-Mail enviado com sucesso!</b>";
 mail ($email_destinatario2, $email_assunto, nl2br($email_conteudo), $email_headers);
 header("Location: ../index.php");
 } 
 else{ 
 echo "</b>Falha no envio do E-Mail!</b>"; } 
 //header("Location: ../login.php");
 //====================================================
} 
?>
 
 <form action="<? $PHP_SELF; ?>" method="POST"> 
 <p> 
 Nome:<br /> 
 <input type="text" size="30" name="nome"> 
 </p>   
 <p> 
 E-mail:<br /> 
 <input type="text" size="30" name="email"> 
 </p>   
 <p> 
 Telefone:<br /> 
 <input type="text" size="35" name="telefone"> 
 </p>   
 <p> 
 Mensagem:<br /> 
 <input type="text" size="35" name="mensagem"> 
 </p>   
 <p>
          <input type="submit" name="BTEnvia" value="Enviar"> 
   <input type="reset" name="BTApaga" value="Apagar">
        </p>