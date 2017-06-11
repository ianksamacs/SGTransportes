<?php

class Sql {
	
  public static $instance;
  private $schema = "sgtransportes";
  
  private $alunoTable = "aluno";
    
  private $aluno_idCurso = "idCurso"; 
  private $aluno_nome 			= "nome"; 
  private $aluno_cpf 			= "cpf"; 
  private $aluno_email 			= "email"; 
  private $aluno_senha 			= "senha";
  private $aluno_adm 			= "adm";
  private $aluno_bairro 		= "bairro";
  private $aluno_rua			= "rua";
  private $aluno_numeroCasa		= "numeroCasa";
  private $aluno_semestreAtual 	= "semestreAtual"; 
  private $aluno_semestreEntrada= "semestreEntrada"; 
  private $aluno_fotoUrl		= "fotoUrl";
  private $aluno_matriculaUrl	= "matriculaUrl"; 
  private $aluno_compResidenciaUrl = "compResidenciaUrl";
  
  protected function __construct(){
	  
  }

  //Usando padrão de projeto Singleton
  public static function getInstance(){

    if (!isset(self::$instance))
    self::$instance = new Sql();

    return self::$instance;
  }

  // Script para inserir uma nova pessoa no banco
  public function adicionarNovaPessoa(){
    return "INSERT INTO {$this->schema}.{$this->alunoTable} ({$this->aluno_idCurso}, {$this->aluno_nome}, {$this->aluno_cpf}, {$this->aluno_email}, {$this->aluno_senha}, {$this->aluno_adm}, {$this->aluno_bairro}, {$this->aluno_rua}, {$this->aluno_numeroCasa}, {$this->aluno_semestreAtual}, {$this->aluno_semestreEntrada}, {$this->aluno_fotoUrl}, {$this->aluno_matriculaUrl}, {$this->aluno_compResidenciaUrl}) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	        
  }

  // Script para busca no banco uma pessoa a partir do cpf
  public function buscarPessoaSQL(){
    return "SELECT * FROM {$this->schema}.{$this->alunoTable} WHERE {$this->aluno_cpf} = ?";
  }

  // Script para busca no banco uma pessoa a partir do cpf e senha (Usado na autenticação)
  public function autenticarUsuarioSQL(){
    return "SELECT * FROM {$this->schema}.{$this->alunoTable} WHERE {$this->aluno_cpf} = ? AND {$this->aluno_senha} = ?";
  }
  
  // Script para para alteração de senha a partir do cpf (Usado na recuperação de senha)
  public function recuperarSenhaSQL(){
    return "UPDATE {$this->schema}.{$this->alunoTable} SET {$this->aluno_senha}=? WHERE {$this->aluno_cpf} = ?";
  }
}
    ?>
