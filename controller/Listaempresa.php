<?php
require_once '../model/class/Conexao.class.php';
require_once '../model/class/Empresa.class.php';
$bd= new Conexao();
//conexão estabelecida
$bd->conecta();
$empresa= new Empresa();
//select do banco
$sql= $empresa->selectTotal();
$bd->setQuery($sql);
$bd->executeQuery();
$elemetos =$bd->listaElementos();
$bd->disconnect();
echo $elemetos;

?>