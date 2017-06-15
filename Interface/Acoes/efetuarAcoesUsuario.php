<?php

	if(isset($_POST['loginout'])){
		// Encerra a sessao e redireciona o usuário para a tela de login
		session_start();
		unset($_SESSION['cpf']);
		unset($_SESSION['senha']);
		header('location:../Login.php');
	}
	else if(isset($_POST['cadastrarHorario'])){
		// Chama a função que cadastra o horário
		header('location:../CadastrarHorario.php');
	}
 ?>
