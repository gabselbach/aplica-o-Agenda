<?php

	class Empresa {
		//atributos na classe
		private $idempresa;
		private $nome;
		private $telefone;
	
	//função construtora da classe
	 function __construct($id=null,$_nome=null,$_telefone=null){
		$this->idempresa=$id;
		$this->nome=$_nome;
		$this->telefone=$_telefone;
	}
	//gets e sets de cada atributo
	 function getId(){
		return $this->idempresa;
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

	//funcções da classe
	 function insert(){
	 	$sql="INSERT INTO empresa VALUES". "(NULL,'$this->nome',$this->telefone)";
		return $sql;

	}
	function selectTotal(){
	 	$sql="SELECT Idempresa,Nome FROM empresa ";
		return $sql;

	}
}