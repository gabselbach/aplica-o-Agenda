
<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
   class Conexao
  {
     private $host = 'localhost';
     private $user = 'root';
     private $pass = '';
     private $database = 'agenda';
     public  $query;
     public $link;
     public $resultado;
     function __construct() {}
  
     function conecta()
     {
         $this->link = mysql_connect($this->host, $this->user, $this->pass) or die("Erro ao conectar ao servidor &raquo; " . mysql_error());
         $con = mysql_select_db($this->database) or die("Erro ao selecionar o Banco de Dados &raquo; " . mysql_error());
         return $con;
     }

      function executeQuery()
     {
     
        if($this->resultado=mysql_query($this->query) or die (mysql_error()))
     {
        return $this->resultado;
     }
    }

     function disconnect()
     {
        return mysql_close($this->link);
     }

    function setQuery($query)
    {
    	$this->query=$query;
    }

    function listaElementos()
    {
      $cont=0;
      while($linha= mysql_fetch_array($this->resultado)){
        $valor[$cont]= array($linha['Idempresa'],$linha['Nome']);
        $cont++;
      }
      $novo=json_encode($valor);
      return $novo;
    }

    function pegaElemento()
    {
      $id = mysql_insert_id();
        
        return $id;
    }

    function listaContatos(){
     $cont=1;
      while($linha=mysql_fetch_array($this->resultado)){
        $valor[$cont]= $linha['Idcontato'].",".$linha['Nome'].",".$linha['Sobrenome'];
        $cont++;
      }
      $novo=json_encode($valor);
      return $novo;
    }

    function listaDadoscontatos(){
     $cont=1;
      while($linha=mysql_fetch_array($this->resultado)){
        $valor[$cont]= $linha['Cep'].";".utf8_encode($linha['Cidade']).";".$linha['Bairro'].";".utf8_encode($linha['Endereco']);
        $cont++;
      }
      return $valor;
    }
  function listaTelefones(){
    $cont=1;
      while($linha=mysql_fetch_array($this->resultado)){
        $valor[$cont]= $linha['Label'].",".$linha['Numero'];;
        $cont++;
      }
      return $valor;
    }
    function listaEmails(){
    $cont=1;
      while($linha=mysql_fetch_array($this->resultado)){
        $valor[$cont]= $linha['Email'];
        $cont++;
      }
      return $valor;
    }
  }
?>

