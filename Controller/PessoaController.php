<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Banco/PessoaDAO.php"); // Localiza a classe PessoaDAO

class  PessoaController {

	private static $instance; 		// Cria uma variável estática para instanciar a classe PessoaController

	public function __construct(){  	// Construtor vazio porque a classe, não precisa iniciar com nenhum dado
		  
	}

	public static function getInstance() {		// Cria a instancia da classe PessoaController 
		if (!isset(self::$instance))				// Se a classe não tiver sido instanciada, entra no if
			self::$instance = new PessoaController();	// Entrando no if, uma instancia é criada para variável estatica $instance
		return self::$instance;						// Retorna a instancia da classe para o método que a chamou
	}

	public function cadastrarPessoa($id_cur, $nome, $cpf, $email, $senha, $adm, $bairro, $rua, $numero, $sem_at, $sem_en, $url_ft, $url_mat, $url_res){

		$pessoa = new Pessoa($id_cur, $nome, $cpf, $email, $senha, $adm, $bairro, $rua, $numero, $sem_at, 
		$sem_en, $url_ft, $url_mat, $url_res); // Cria uma instancia da classe Pessoa passando como parâmetro os dados necessários

		if(!PessoaDAO::getInstance()->verificaCadastrado($pessoa->getCpf())){ // Verifica se o cpf já está cadastrado, se não estiver, realiza o cadastro
		  
			PessoaDAO::getInstance()->adicionarNovaPessoa($pessoa);	 // Chama a função adicionarNovaPessoa contida na classe PessoaDAO para realizar o cadastrado
		  
			$pessoa_busca = PessoaDAO::getInstance()->buscarPessoa($cpf); // Verifica se o cadastrado foi realizado com sucesso efetuando uma busca no banco
		  
			return ($pessoa_busca->getCpf() != null);					 // Se for encontrado no banco um usuário com o cpf indicado, o valor retornado de "$pessoa_busca->getCpf()" será diferente de nulo, e esta função retornará true indicando que o cadastro foi realizado com sucesso
		} 
		else{           	// Se o usuário já for cadastrado no sistema, entra no else e não realiza este novo cadastro
			return false; 	// Retorna false para indicar que o cadastrado não foi realizado
		}
	}
	  
	public function autenticarUsuario($cpf, $senha){
		return PessoaDAO::getInstance()->autenticarUsuario($cpf, $senha);
	}
	  
	public function buscarUsuario($cpf){
		return PessoaDAO::getInstance()->buscarPessoa($cpf);
	}  
    		
	public function recuperarSenha($cpf, $senha){
		return PessoaDAO::getInstance()->recuperarSenha($cpf, $senha);
	}
  
  
  
  
  
  
}  
 ?>
