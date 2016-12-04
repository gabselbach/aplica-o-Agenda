<?php
	require_once '../model/class/Conexao.class.php';
	require_once '../model/class/Contato.class.php';
	//atributos que estão chegando por post do ajax
	$nome=$_POST['nome'];
	$sobrenome=$_POST['sobrenome'];
	$endereco=$_POST['ende'];
	$cep=$_POST['cep'];
	$bairro=$_POST['bairro'];
	$cidade=$_POST['cidade'];
	$empresa=$_POST['empresas'];
	$data=$_POST['data'];
	$hora=$_POST['hora'];
	$qttelefones=$_POST['qttelefones'];
	$qtemail=$_POST['qtemail'];

	//conexao instanciadas
	$bd= new Conexao();
	//conexão estabelecida
	$bd->conecta();

	//objeto cliente criado
	$contato= new Contato(null,$nome,$sobrenome,null,null,$endereco,$cep,$bairro,$cidade,$empresa,$data,$hora);
	//cria o insert
	$sql= $contato->insertContato();
	//guarda o valor da query
	$bd->setQuery($sql);
	//realiza a query no banco de dados
	$bd->executeQuery();

	//pegando o id correspondente ao contato que está sendo cadastrado
	$id=$bd->pegaElemento();

	//for para percorrer todos os telefones cadastrados
	//aqui é feito um insert no banco de cada telefone
	
	for ($i=1; $i <=$qttelefones ; $i++) { 
		$telefone=$_POST["telefone".$i.""];
		$tipo=$_POST["tipotelefone".$i.""];
		$contato->setTelefone($telefone);
		$contato->setTipotelefone($tipo);
		$contato->setId($id);
		$sql= $contato->insertTelefone();
		$bd->setQuery($sql);
		$teste=$bd->executeQuery();
	}

	//for para percorrer todos os emails cadastrados
	//aqui é feito um insert no banco de cada email
	for ($i=1; $i <=$qtemail ; $i++) { 
		$email=$_POST["email".$i.""];
		$contato->setEmail($email);
		$sql= $contato->insertEmail();
		$bd->setQuery($sql);
		$bd->executeQuery();

	}

	//desconectando banco
	$bd->disconnect();
	header('location:../contato.html?'.$cod.'&true');
?>