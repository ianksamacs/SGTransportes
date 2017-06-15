<?php

class Pessoa {
	private $id = 0;
	private $id_cur;
	private $cpf;
	private $nome;	
	private $email;
	private $senha; 
	private $adm; 
	private $bairro; 
	private $rua; 
	private $numero; 
	private $sem_at; 
	private $sem_en; 
	private $url_ft; 
	private $url_mat; 
	private $url_res;
	
	public function __construct($id_cur, $nome, $cpf, $email, $senha, $adm, $bairro, $rua, $numero, $sem_at, $sem_en, $url_ft, $url_mat, $url_res){
		$this->id_cur 	= $id_cur;
		$this->nome 		= $nome;	
		$this->cpf 		= $cpf;
		$this->email 	= $email;
		$this->senha 	= $senha; 
		$this->adm 		= $adm; 
		$this->bairro 	= $bairro; 
		$this->rua 		= $rua; 
		$this->numero 	= $numero; 
		$this->sem_at 	= $sem_at; 
		$this->sem_en 	= $sem_en; 
		$this->url_ft 	= $url_ft; 
		$this->url_mat 	= $url_mat; 
		$this->url_res 	= $url_res;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getIdCurso(){
		return $this->id_cur;
	}

	public function getNome(){
		return $this->nome;
	}
	
	public function getCpf(){
		return $this->cpf;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getSenha(){
		return $this->senha;
	}

	public function getADM(){
		return $this->adm;
	}
	
	public function getBairro(){
		return $this->bairro;
	}
	
	public function getRua(){
		return $this->rua;
	}
	
	public function getNumero(){
		return $this->numero;
	}
	
	public function getSemAt(){
		return $this->sem_at;
	}	
	
	public function getSemEn(){
		return $this->sem_en;
	}
	
	public function getUrlFT(){
		return $this->url_ft;
	}
		
	public function getUrlMat(){
		return $this->url_mat;
	}
	
	public function getUrlRes(){
		return $this->url_res;
	}

	public function setIdCurso(){
		$this->id_cur = id_cur;
	}
	
	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}

	public function setADM($adm){
		$this->adm = $adm;
	}
	
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	
	public function setRua($rua){
		$this->rua = $rua;
	}
	
	public function setNumero($numero){
		$this->numero = $numero;
	}
	
	public function setSemAt($sem_at){
		$this->sem_at = $sem_at;
	}	
	
	public function setSemEn($sem_en){
		$this->sem_en = $sem_en;
	}
	
	public function setUrlFT($url_ft){
		$this->url_ft = $url_ft;
	}
		
	public function setUrlMat($url_mat){
		$this->url_mat = $url_mat;
	}
	
	public function setUrlRes($url_res){
		$this->url_res = $url_res;
	}
}
?>
