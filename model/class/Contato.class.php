<?php

	class Contato {
		//atributos na classe
		private $idcontato;
		private $nome;
		private $sobrenome;
		private $telefone;
		private $tipotelefone;
		private $endereco;
		private $cep;
		private $bairro;
		private $cidade;
		private $empresa;
		private $datacriacao;
		private $horacriacao;
		private $dataalteracao;
		private $horaalteracao;
		private $email;
	
	//função construtora da classe
	 function __construct($id=null,$_nome=null,$_sobrenome=null,$_telefone=null,$_tipotelefone=null,$_endereco=null,$_cep=null,$_bairro=null,$_cidade=null,$_empresa=null,$_datacriacao= null,$_horacriacao=null,$_dataalteracao= null,$_horaalteracao=null,$_email=null){
		$this->idcontato=$id;
		$this->nome=$_nome;
		$this->telefone=$_telefone;
		$this->sobrenome=$_sobrenome;
		$this->tipotelefone=$_tipotelefone;
		$this->endereco=$_endereco;
		$this->cep=$_cep;
		$this->bairro=$_bairro;
		$this->cidade=$_cidade;
		$this->empresa=$_empresa;
		$this->datacriacao=$_datacriacao;
		$this->horacriacao=$_horacriacao;
		$this->dataalteracao=$_dataalteracao;
		$this->horaalteracao=$_horaalteracao;
		$this->email=$_email;
		
	}
	//gets e sets de cada atributo
	 function getId(){
		return $this->idcontato;
	}
	 function setId($_id){
		$this->idcontato=$_id;
	}
	 function getNome(){
		return $this->nome;
	}
	 function setNome($_nome){
		$this->nome=$_nome;
	}
	 function getTelefone(){
		return $this->telefone;
	}
	 function setTelefone($_telefone){
		$this->telefone=$_telefone;
	}
	 function getTipotelefone(){
		return $this->tipotelefone;
	}
	 function setTipotelefone($_tipotelefone){
		$this->tipotelefone=$_tipotelefone;
	}
	function getSobrenome(){
		return $this->sobrenome;
	}
	function setSobrenome($_sobrenome){
		$this->sobrenome=$_sobrenome;
	}
	function getEndereco(){
		return $this->endereco;
	}
	function setEndereco($_endereco){
		$this->endereco=$_endereco;
	}
	function getCep(){
		return $this->cep;
	}
	function setCep($_cep){
		$this->cep=$_cep;
	}
	function getBairro(){
		return $this->bairro;
	}
	function setBairro($_bairro){
		$this->bairro=$_bairro;
	}
	function getCidade(){
		return $this->cidade;
	}
	function setCidade($_cidade){
		$this->cidade=$_cidade;
	}
	function getEmpresa(){
		return $this->empresa;
	}
	function setEmpresa($_empresa){
		$this->empresa=$_empresa;
	}
	function getHoracriacao(){
		return $this->horacriacao;
	}
	function getHoraalteracao(){
		return $this->horaalteracao;
	}
	function getDatacriacao(){
		return $this->datacriacao;
	}
	function setHoraalteracao($hora){
		$this->horacriacao=$hora;
	}
	function getDataalteracao(){
		return $this->dataalteracao;
	}
	function setDataalteração($data){
		$this->dataalteracao=$data;
	}
	function getEmail(){
		$this->email;
	}
	function setEmail($_email){
		$this->email=$_email;
	}

	

	//funções da classe
	 function insertContato(){
	 	$sql="INSERT INTO contato VALUES". "(NULL,'$this->nome','$this->sobrenome','$this->endereco',$this->cep,'$this->bairro','$this->cidade','$this->horacriacao',NULL,'$this->datacriacao',NULL,$this->empresa)";
		return $sql;

	}
	function insertTelefone(){
		$sql="INSERT INTO telefone VALUES"."(NULL,'$this->tipotelefone',$this->telefone,$this->idcontato)";
		return $sql;
	}
	function selectContatoAdicionado(){
		$sql="SELECT LAST_INSERT_ID()";
	}
	function insertEmail(){
		$sql="INSERT INTO email VALUES" . "(NULL,'$this->email',$this->idcontato)";
		return $sql;
	}
	function selectDados(){
		$sql="SELECT Idcontato,Nome,Sobrenome FROM contato";
		return $sql;
	}
	function selectPrincipal(){
		$sql= "SELECT Cep,Bairro,Cidade,Endereco from contato where Idcontato=$this->idcontato";
		return $sql;
	}
	function selectTelefones(){
		$sql= "SELECT t.Numero,t.Label from telefone as t inner join contato as c on (t.Idcontato=c.Idcontato) where c.Idcontato=$this->idcontato";
		return $sql;
	}
	function selectEmails(){
		$sql= "SELECT e.Email from email as e inner join contato as c on (e.Idcontato=c.Idcontato) where c.Idcontato=$this->idcontato";
		return $sql;
	}
	function alteraDados(){
		$sql=" UPDATE contato set Endereco='$this->endereco',Horaalteracao='$this->horaalteracao',Dataalteracao='$this->dataalteracao',
		Cep=$this->cep, Bairro='$this->bairro', Cidade='$this->cidade' WHERE Idcontato=$this->idcontato";
		return $sql;
	}
	function alteraTelefone(){
		$sql= "UPDATE telefone set Label='$this->tipotelefone',Numero=$this->telefone where Idcontato=$this->idcontato;";
		return $sql;
	}
}