<?php 

require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Facade/PessoaFacade.php"); // Localiza a classe PessoaFacade

 if(isset($_POST['cadastrar'])){ // Verifica se o botão "cad" foi precionado, se for entra no if
	
	$nome = $_POST['nome']; 		// Atribui a variável nome o nome informado pelo usuário
	$cpf = $_POST['cpf'];   		// Atribui a variável cpf o cpf informado pelo usuário	
	$email 	 = $_POST['email']; 	// Atribui a variável nome o nome informado pelo usuário
	$senha 	 = $_POST['senha'];   	// Atribui a variável cpf o cpf informado pelo usuário
	$bairro  = $_POST['bairro']; 	// Atribui a variável bairro o bairro informado pelo usuário
	$rua 	 = $_POST['rua'];   	// Atribui a variável rua a rua informada pelo usuário
	$numero  = $_POST['numero']; 	// Atribui a variável numero o numero informado pelo usuário
	$sem_en  = $_POST['sem_en'];   	// Atribui a variável sem_en o semestre de entrada informado pelo usuário
	$sem_at  = $_POST['sem_at'];   	// Atribui a variável sem_at o semestre atual informado pelo usuário
	$id_cur  = $_POST['id_cur'];   	// Atribui a variável id_cur o id do curso informado pelo usuário
	$adm	 = 0;
					

	// Se tiver dois pontos ele dá erro	linha 24			
	$extFoto = str_replace('.', '', strstr($_FILES['Arquivo_Foto']['name'], '.'));	    // Captura a extensão
	$url_ft = "../Uploads/Foto/".$cpf."_FOTO.".$extFoto;                               	// Cria o caminho do arquivo
	move_uploaded_file($_FILES['Arquivo_Foto']['tmp_name'], $url_ft);         	        // Move para a pasta de destino
 
	// Se tiver dois pontos ele dá erro	linha 24			
	$extRes = str_replace('.', '', strstr($_FILES['Arquivo_Res']['name'], '.'));	    // Captura a extensão
	$url_res = "../Uploads/Comprovante_Residencia/".$cpf."_CompRes.".$extRes;           // Cria o caminho do arquivo
	move_uploaded_file($_FILES['Arquivo_Res']['tmp_name'], $url_res);         	        // Move para a pasta de destino
	
	// Se tiver dois pontos ele dá erro	linha 24			
	$extMat = str_replace('.', '', strstr($_FILES['Arquivo_Mat']['name'], '.'));	    // Captura a extensão
	$url_mat = "../Uploads/Comprovante_Matricula/".$cpf."_CompMat.".$extMat;            // Cria o caminho do arquivo
	move_uploaded_file($_FILES['Arquivo_Mat']['tmp_name'], $url_mat);         	        // Move para a pasta de destino

	
	if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($bairro) && !empty($rua) && !empty($numero) && !empty($sem_en) && !empty($sem_at) 
		&& !empty($url_ft) && !empty($url_mat) && !empty($url_res) && !empty($id_cur)) {// Verifica se as variáveis estão preencidas
		 	  
	  $confirmacao = PessoaFacade::getInstance()->cadastrarPessoa($id_cur, $nome, $cpf, $email, $senha, $adm, 
	  $bairro, $rua, $numero, $sem_at, $sem_en, $url_ft, $url_mat, $url_res); 	  
	  // Cria uma instância da classe "PessoaFacade" e Chama a função "cadastrarPessoa" passando como parâmetro o nome e o cpf informado
	  
	  if($confirmacao){                  // Se o retorno desta função for true, o cadastro foi realizado com sucesso
		header('location:../Login.php'); // Chama a classe Index_.php
	  }
	  else{                               // Se o retorno desta função for false, o cadastro não foi realizado porque outro usuário com mesmo cpf já existe
		header('location:../Cadastrar.php');  // Chama a classe Index_.php
	  }
	}
	else
		echo "Verifique se os campos foram preenchidos "; 
	
 }

?>