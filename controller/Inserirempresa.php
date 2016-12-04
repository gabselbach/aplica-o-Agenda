<?php
require_once '../model/class/Conexao.class.php';
require_once '../model/class/Empresa.class.php';
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
//conexao instanciada
$bd= new Conexao();
//conexão estabelecida
$bd->conecta();
$empresa= new Empresa(null,$nome,$telefone);
//insert do banco
$sql= $empresa->insert();
$bd->setQuery($sql);
//query 
$resposta= $bd->executeQuery();
//desconectando banco
$bd->disconnect();
$b=json_encode($resposta);
header("location:../empresa.html?resp=".$b);

?>