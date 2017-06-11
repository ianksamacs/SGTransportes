<?php

	require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Facade/PessoaFacade.php"); // Localiza a classe PessoaFacade

	if(isset($_POST['logar'])){
		session_start();
			
		$cpf 	= $_POST['cpf'];
		$senha 	=  $_POST['senha'];
		
		if(!empty($cpf) && !empty($senha)){

			$autenticado = PessoaFacade::getInstance()->autenticarUsuario($cpf, $senha);
			$usuario 	 = PessoaFacade::getInstance()->buscarUsuario($cpf);

			if ($autenticado){
				$_SESSION['cpf'] 	= $cpf;
				$_SESSION['senha'] 	= $senha;
				$atualiza = true;
				$msg =  "Usuario logado com sucesso!";
				header('location:../PerfilUsuario.php');
			}
			else{
				unset($_SESSION['cpf']);
				unset($_SESSION['senha']);
				$atualiza = false;
			  
				if($usuario->getCpf() == ""){
					$msg = "Erro na autenticação! Usuario não cadastrado";
				}
				else{
					$msg = "Erro na autenticação! Senha incorreta";
				}
			}
			echo $msg;
	  }
	}
?>