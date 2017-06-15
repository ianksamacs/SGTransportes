 <?php 

require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Facade/PessoaFacade.php"); // Localiza a classe PessoaFacade

 if(isset($_POST['cadastrarHorario'])){ // Verifica se o botão "cadastrarHorario" foi precionado, se for entra no if
	
	if(isset($_SESSION)){
		session_start();
	
		$vet_horario = array();
		
		$vet_horario[0][0]  = $_POST['horario_ida_segunda']; 
		$vet_horario[0][1]  = $_POST['horario_vinda_segunda']; 
		$vet_horario[0][2]  = "seg"; 
		
		$vet_horario[1][0]  = $_POST['horario_ida_terca']; 
		$vet_horario[1][1]  = $_POST['horario_vinda_terca']; 
		$vet_horario[1][2]  = "ter"; 
		
		$vet_horario[2][0]  = $_POST['horario_ida_quarta']; 
		$vet_horario[2][1]  = $_POST['horario_vinda_quarta']; 
		$vet_horario[2][2]  = "qua"; 
		
		$vet_horario[3][0]  = $_POST['horario_ida_quinta']; 
		$vet_horario[3][1]  = $_POST['horario_vinda_quinta']; 
		$vet_horario[3][2]  = "qui"; 
		
		$vet_horario[4][0]  = $_POST['horario_ida_sexta']; 
		$vet_horario[4][1]  = $_POST['horario_vinda_sexta']; 
		$vet_horario[4][2]  = "sex"; 
		
		$vet_horario[5][0]  = $_POST['horario_ida_sabado']; 
		$vet_horario[5][1]  = $_POST['horario_vinda_sabado']; 
		$vet_horario[5][2]  = "sab"; 
		
		$confirmacao = PessoaFacade::getInstance()->cadastrarHorario($_SESSION['cpf'] , $vet_horario); 
		// Cria uma instância da classe "PessoaFacade" e Chama a função "cadastrarHorario" passando como parâmetro os horarios de ida e vinda dos alunos
		  
		if($confirmacao){                  // Se o retorno desta função for true, o cadastro foi realizado com sucesso
			echo "Cadastro realizado com sucesso";
			//header('location:../Login.php'); // Chama a classe Index_.php
		}
		else{                               // Se o retorno desta função for false, o cadastro não foi realizado porque outro usuário com mesmo cpf já existe
			echo "Cadastro não realizado ";
			//header('location:../Cadastrar.php');  // Chama a classe Index_.php
		}
	}
	else {
		echo "Usuário não está logado, impossível cadastrar horário.";
	}

 }

?>