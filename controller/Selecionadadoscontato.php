<?php

header("Content-Type: text/html; charset=UTF-8",true);
	require_once '../model/class/Conexao.class.php';
	require_once '../model/class/Contato.class.php';
	//variavel recebida do ajax
	$cod=$_POST['cod'];
	//conexão instanciada
	$bd= new Conexao();
	//conexão estabelecida
	$bd->conecta();

	//contato instanciado
	$contato=new Contato($cod);

	//select com os dados principais
	$sql=$contato->selectPrincipal();
	$bd->setQuery($sql);
	$bd->executeQuery();
	$dadosprincipais=$bd->listaDadoscontatos();

	//select dos telefones
	$sql=$contato->selectTelefones();
	$bd->setQuery($sql);
	$bd->executeQuery();
	$telefones=$bd->listaTelefones();

	//coloca o array dos telefones do final do vetor dos dados
	array_push($dadosprincipais,$telefones);

	//select dos emails
	$sql=$contato->selectEmails();
	$bd->setQuery($sql);
	$bd->executeQuery();
	$emails=$bd->listaEmails();

	array_push($dadosprincipais, $emails);
	//sprint_r($dadosprincipais);
	$r=json_encode($dadosprincipais);
	
	echo $r;
?>