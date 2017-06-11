<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Controller/PessoaController.php"); // Localiza a classe PessoaController

  class PessoaFacade {

    private static $instance; 		// Cria uma variável estática para instanciar a classe PessoaFacade

    public function __construct(){  // Construtor vazio porque a classe, não precisa iniciar com nenhum dado
	
    }

    public static function getInstance() {      // Cria a instancia da classe PessoaFacade 
      if (!isset(self::$instance))     			// Se a classe não tiver sido instanciada, entra no if (isset verifica se a variável foi inicializada)
        self::$instance = new PessoaFacade();   // Entrando no if, uma instancia é criada para variável estatica $instance
      return self::$instance;                   // Retorna a instancia da classe para o método que a chamou
    }

	// Função chamada quando se deseja cadastrar um novo usuário (Usado pela tela de cadastro)
	public function cadastrarPessoa($id_cur, $nome, $cpf, $email, $senha, $adm, $bairro, $rua, $numero, $sem_at, $sem_en, $url_ft, $url_mat, $url_res){
		return  PessoaController::getInstance()->cadastrarPessoa($id_cur, $nome, $cpf, $email, $senha, $adm, $bairro, $rua, $numero, $sem_at, $sem_en, $url_ft, $url_mat, $url_res); 
		// Chama a função cadastrarPessoa, da classe PessoaController, passando como parâmetro o nome e o cpf informado pelo usuário
	}
 
	// Verifica no sistema se o usuário é cadastrado (Usado pela tela de login)
	public function autenticarUsuario($cpf, $senha){
		return PessoaController::getInstance()->autenticarUsuario($cpf, $senha);
	}
	
	// Busca no sistema o usuário com cpf informado (Usado pela tela de login)
	public function buscarUsuario($cpf){
		return PessoaController::getInstance()->buscarUsuario($cpf);
	}
		
	// Altera a senha do usuário do cpf (Usado pela tela de recuperação de senha)
	public function recuperarSenha($cpf, $senha){
		return PessoaController::getInstance()->recuperarSenha($cpf, $senha);
	}
 }
 ?>
