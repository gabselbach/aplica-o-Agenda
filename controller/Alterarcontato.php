<?php
	require_once '../model/class/Conexao.class.php';
	require_once '../model/class/Contato.class.php';
	//atributos que estão chegando por post do ajax
	$cod=$_POST['cod'];
	$endereco=utf8_decode($_POST['ende']);
	$cep=$_POST['cep'];
	$bairro=utf8_decode($_POST['bairro']);
	$cidade=utf8_decode($_POST['cidade']);
	$data=$_POST['data'];
	$hora=$_POST['hora'];
	//conexao instanciadas
	$bd= new Conexao();
	//conexão estabelecida
	$bd->conecta();

	//objeto cliente criado
	$contato= new Contato($cod,null,null,null,null,$endereco,$cep,$bairro,$cidade,null,null,null,$data,$hora);
	$sql=$contato->alteraDados();
	$bd->setQuery($sql);
	 $val= $contato->getDataalteracao();
	//realiza a query no banco de dados
	$bd->executeQuery();
		$bd->disconnect();
		header('location:../alterarcontato.html?'.$cod.'&true');
?>