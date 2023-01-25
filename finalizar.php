<?php
session_start();
  require_once 'class/config.php';
  spl_autoload_register(function($class_nome) 
{
include 'class/' . $class_nome . '.php';
});

$cat = new Class_Pedidos();

$cliente = $_SESSION["clienteid"];
 foreach($_SESSION['produto'] as $prod){

   
        /*$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $inserir = $instance->prepare("INSERT INTO pedidos () VALUES (NULL,?, ?, ?, ?, ?)");
    $inserir->bindParam('1',$prod['nome']);
    $inserir->bindParam('2',$prod['preco']);
    $inserir->bindParam('3',$prod['qtd']);
    $inserir->bindParam('4',$prod['total']); 
    $inserir->bindParam('5',$cliente); */
    
    $query = "insert into pedidos(produto, preco, qtd, precototal, cliente) values ('" . $prod['nome']. "', '" . $prod['preco']. "', '" . $prod['qtd']. "',
            '" . $prod['total']. "',
            '" . $cliente. "'

      )";
    $conexao = mysqli_connect('localhost', 'root', '', 'derivery');
    mysqli_query($conexao, $query);
    

   
    //$cat->insert($prod['nome'],$prod['preco'],$prod['qtd'],$prod['total'],1);
     if(mysqli_query($conexao, $query)) {
             
             echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/'>
        <script type=\"text/javascript\">
            alert(\"Pedido realizado com sucesso.\");
        </script>
        ";
        } else {
            // nao deu certo
        } 
    
    }
    




    

 

?>