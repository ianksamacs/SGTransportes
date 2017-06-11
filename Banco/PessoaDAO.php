<?php

require_once("ConexaoDB.php"); 
require_once("Sql.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/SGTransportes/"."Model/Pessoa.php");
                                                                                                             
class PessoaDAO {

	private static $instance;

	protected function __construct(){
		  
	}

	public static function getInstance() {
		if (!isset(self::$instance))
			self::$instance = new PessoaDAO();
		return self::$instance;
	}
	  
	// Cria, com os dados encontrados no banco, uma instancia da classe objeto
	private function popularPessoa($row){
			  
		$pessoa = new Pessoa($row['idCurso'], $row['nome'], $row['cpf'], $row['email'], $row['senha'], $row['adm'], $row['bairro'], $row['rua'], $row['numeroCasa'], $row['semestreAtual'], $row['semestreEntrada'], $row['fotoUrl'], $row['matriculaUrl'], $row['compResidenciaUrl']); // Cria a instancia da classe passando como parâmetro os dados encontrados na busca
		
		return $pessoa; // Retorna a instancia criada
	}

	// Busca no banco de dados a pessoa com o cpf indicado
	public static function buscarPessoa($cpf){ // Recebe como parâmetro o cpf da pessoa a ser buscada
		try{
			$sql = Sql::getInstance()->buscarPessoaSQL();  	 // Retorna o script SQL para buscar a pessoa no banco
			$stmt = ConexaoDB::getConexaoPDO()->prepare($sql); // Solicita conexão com o banco "getConexaoPDO" em seguida passa o script a ser executado "prepare"
			$stmt->bindParam(1,$cpf); 						 // Informa o parametro "cpf" que é preciso para executar a busca
			$stmt->execute();									 // Executa o comando
			return self::popularPessoa($stmt->fetch(PDO::FETCH_ASSOC)); // Com os dados retornados pelo comando executado tenta criar uma instancia da classe Pessoa

		}catch (Exception $e){
			echo "Falha (buscarPessoa): ". $e->getMessage();
		}
	}

	// Adiciona uma pessoa no banco
	public static function adicionarNovaPessoa($pessoa){ // Recebe como parâmetro a pessoa a instancia da classe pessoa a ser inserida

		try{ 
		  $sql = Sql::getInstance()->adicionarNovaPessoa();  // Retorna o script SQL para adicionar pessoa no banco 
		  $stmt = ConexaoDB::getConexaoPDO()->prepare($sql); // Solicita conexão com o banco "getConexaoPDO" em seguida passa o script a ser executado "prepare"
		  $stmt->bindParam(1,$pessoa->getIdCurso());         // Informa o parametro "cpf" que é preciso para executar a inserção 
		  $stmt->bindParam(2,$pessoa->getNome());            // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(3,$pessoa->getCpf());             // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(4,$pessoa->getEmail());             // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(5,$pessoa->getSenha());           // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(6,$pessoa->getADM());             // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(7,$pessoa->getBairro());          // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(8,$pessoa->getRua());             // Informa o parametro "nome" que é preciso para executar a inserção	  
		  $stmt->bindParam(9,$pessoa->getNumero());           // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(10,$pessoa->getSemAt());           // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(11,$pessoa->getSemEn());           // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(12,$pessoa->getUrlFT());          // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(13,$pessoa->getUrlMat());         // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->bindParam(14,$pessoa->getUrlRes());         // Informa o parametro "nome" que é preciso para executar a inserção
		  $stmt->execute(); // Executa o comando
		  echo "ok 2";
		}catch (Exception $e){                                       // Caso a execução acima retorne algum erro uma excessão é lançada
			echo "Falha (adicionarNovaPessoa): ". $e->getMessage();  // A mensagem referente ao erro é exibida
		}
	}

	// Retorna Verdadeiro se já houver no banco uma pessoa com o CPF indicado e falso se não houver
	public static function verificaCadastrado($cpf){ // Recebe como parâmetro o cpf a ser buscado
		try{ 
			$sql = Sql::getInstance()->buscarPessoaSQL();   // Retorna o script SQL para busca no banco ("SELECT * FROM nome_BD.nome_TB WHERE cpf = ?";)
			$stmt = ConexaoDB::getConexaoPDO()->prepare($sql); // Solicita conexão com o banco "getConexaoPDO" em seguida passa o script a ser executado "prepare" 
			$stmt->bindParam(1,$cpf);                          // Informa o parametro "cpf" que é preciso para executar a busca "SELECT ... WHERE cpf = ?"
			$stmt->execute();                                  // Executa o comando
			return ($stmt->rowCount() > 0);                    // "rowCount" retorna o número de CPF's encontrados, se retornar 0, o cadastro é liberado

		} catch (Excepetion $e){                                         // Caso a execução acima retorne algum erro uma excessão é lançada
			echo "Falha (verificaPessoaCadastrado): ". $e->getMessage(); // A mensagem referente ao erro é exibida
		}
		return FALSE;
	  }
	
	public static function autenticarUsuario($cpf, $senha){
		try{ 
			$sql = Sql::getInstance()->autenticarUsuarioSQL();   
			$stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			$stmt->bindParam(1,$cpf);
			$stmt->bindParam(2,$senha);
			$stmt->execute();                                  
			return ($stmt->rowCount() > 0);                    

		} catch (Excepetion $e){                                  // Caso a execução acima retorne algum erro uma excessão é lançada
			echo "Falha (autenticarUsuário): ". $e->getMessage(); // A mensagem referente ao erro é exibida
		}
		return FALSE;	
	}
	
		
	public static function recuperarSenha($cpf, $senha){
		try{ 
			$sql = Sql::getInstance()->recuperarSenhaSQL();   
			$stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			$stmt->bindParam(1,$senha);
			$stmt->bindParam(2,$cpf);
			$stmt->execute();                                  
			return ($stmt->rowCount() > 0);                    

		} catch (Excepetion $e){                                  // Caso a execução acima retorne algum erro uma excessão é lançada
			echo "Falha (recuperarSenha): ". $e->getMessage(); // A mensagem referente ao erro é exibida
		}
		return FALSE;	
	}
}
?>
