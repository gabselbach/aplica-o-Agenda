<?php
	require_once '../model/class/Conexao.class.php';
	require_once '../model/class/Contato.class.php';
	//conexao instanciada
	$bd= new Conexao();
	//conexão estabelecida
	$bd->conecta();

	//objeto criado
	$contato= new Contato();
	$sql=$contato->selectDados();
	$bd->setQuery($sql);
	$bd->executeQuery();
	$todosContatos=$bd->listaContatos();
	$bd->disconnect();
	echo $todosContatos;

?>