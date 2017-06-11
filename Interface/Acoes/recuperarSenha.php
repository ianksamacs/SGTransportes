<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Interface/Acoes/PHPMailer/PHPMailerAutoload.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Facade/PessoaFacade.php"); // Localiza a classe PessoaFacade

// Email do Grupo
//3YHKGDVQ27RYRBXJMPVMWG38T
//hackspacesantoestevao

if(isset($_POST['recuperarSenha'])){
  
  $cpf = $_POST["cpf"];
  $senha = rand(100000,999999);
    
  $usuario = PessoaFacade::getInstance()->buscarUsuario($cpf);
  
  // Instância do objeto PHPMailer
  $mail = new PHPMailer;  
  
  // Configura para envio de e-mails usando SMTP
  $mail->isSMTP();  
  
  // Servidor SMTP
  $mail->Host = 'smtp.gmail.com';
  
  // Usar autenticação SMTP
  $mail->SMTPAuth = true;
  
  // Usuário da conta
  $mail->Username = 'hackspacesantoestevao@gmail.com';
  
  // Senha da conta
  $mail->Password = '3YHKGDVQ27RYRBXJMPVMWG38T';
  
  // Tipo de encriptação que será usado na conexão SMTP
  $mail->SMTPSecure = 'ssl';
  
  // Porta do servidor SMTP
  $mail->Port = 465;
  
  // Informa que vamos enviar mensagens usando HTML
  $mail->IsHTML(true);
  
  // Email do Remetente
  $mail->From = 'hackspacesantoestevao@gmail';
  
  // Nome do Remetente
  $mail->FromName = 'Transporte Universitario';
  
  // Endereço do e-mail do destinatário
  $mail->addAddress($usuario->getEmail());
  
  // Assunto do e-mail
  $mail->Subject = 'Recuperacao de Senha';
  
  // Mensagem que vai no corpo do e-mail
  $mail->Body = '<h1>Recuperação de Senha</h1><br>
  <p> Caro(a) ';
  $mail->Body .= $usuario->getNome();
  $mail->Body .=',<br><br> Solicitação de recuperação de senha.<br>Sua nova senha é apresentada abaixo.';
  $mail->Body .= '<br><br> Nova senha: '.$senha.'<br><br><br>';
  $mail->Body .= 'Favor não responder essa mensagem!<br>
  Obrigado!<br><br>
  Sistema de Gerenciamento do Transporte Universitário <br></p>';
  
  // Envia o email e verifica se houve algum erro
  if($mail->Send()){
     echo 'Recuperação enviada com sucesso !';
	 
	 // Se houve sucesso no envio do e-mail a senha é alterada no sistema
	 PessoaFacade::getInstance()->recuperarSenha($usuario->getCpf(), $senha);
    
	 header('location:../Login.php');
  }
  else{
      echo 'Erro ao enviar Email: '; 
	  echo $mail->ErrorInfo;	
  }
  
}


?>