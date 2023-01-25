<?php 
  require_once 'class/config.php';
    session_start();

    if(!isset($_SESSION['itens'])){
        $_SESSION['itens'] = array();
    }


    if(isset($_GET['id']) && $_GET['id'] == 'carrinho'){

        /**ADICIONANDO PRODUTO AO CARRINHO */
        $idProduto = $_GET['add'];

        if(!isset($_SESSION['itens'][$idProduto])){
            $_SESSION['itens'][$idProduto] = 1;
        }else{
            $_SESSION['itens'][$idProduto] += 1;
        }
    } 

   



?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site para compra de Comida -Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header seccao inicio  -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>Comida</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="index.html">home</a>
        <a href="#Especialidade">Especialidade</a>
        <a href="#Popular">Popular</a>
        <a href="#Galeria">Galeria</a>
        <a href="#Testemunho">Testemunho</a>
        <a href="Carrinho.php">Pedido</a>
        <?php if(isset($_SESSION["clienteid"]) && isset($_SESSION["clienten"])){

        echo "<a href='sai.php'>Sair | ".isset($_SESSION["clienteid"]). "</a>";

        }else{

        echo "<a href='login.php'>Login</a>";
        echo "<a href='cadastro.php'>Cadastro</a>";
        }
?>
    </nav>

</header>

<!-- header seccao fim -->

<!-- home seccao inicio  -->
<br><br><br><br><br><br>

<section class="order" id="order">

    <h1 class="heading"> <span>Seus</span> Pedidos </h1>

    <div class="row">
        
    <?php
         /**EBXIBINDO O PRODUTO AO CARRINHO */
    if(count($_SESSION['itens']) == 0){
        echo 'Vazio';
    }else{
       
        $instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        foreach($_SESSION['itens'] as $idProduto => $qtd){
            $_SESSION['produto'] = array();
            $select = $instance->prepare("SELECT * FROM produto WHERE idProduto =?");
            $select->bindParam(1,$idProduto);
            $select->execute();
            $mostrar=$select->fetchAll();
            $total = $qtd * $mostrar[0]["preco"];
            echo '<img src="admin/imagem/'.$mostrar[0]["foto"].'" alt="" alt="" style="width: 100px;height: 50;">';
            echo 'Nome '.$mostrar[0]["nome"].'</br></hr>';
            echo 'Preço '.number_format($mostrar[0]["preco"],'2',',','.').'</br></hr>';
            echo 'Quantidade '.$qtd.'</br>';
            echo 'Total '.number_format($total,'2',',','.').'</br>';
            echo '<a href="remover.php?remover=carrinho&id='.$idProduto.'">Eliminar</a>';

            array_push($_SESSION['produto'], 
                array('nome' => $mostrar[0]["nome"],
                    'qtd' => $qtd,
                    'preco' => $mostrar[0]["preco"],
                    'total' => $total 
                )
        
        
           );
           
        }

        if(isset($_SESSION["clienteid"]) && isset($_SESSION["clienten"])){

            echo "<a href='finalizar.php'>Finalizar o pedido</a>";
    
            }else{
    
            echo "Para finalizar o pedido é necessário o cadastro";
            
            }

    }

    ?>
        

    </div>

</section>

<!-- home seccao fim -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- rodape   -->

<section class="footer">

    <div class="share">
        <a href="#" class="btn">facebook</a>
        <a href="#" class="btn">twitter</a>
        <a href="#" class="btn">instagram</a>
        <a href="#" class="btn">pinterest</a>
        <a href="#" class="btn">linkedin</a>
    </div>

    <h1 class="credit"> created by <span> mr. Leonildo Arsénio </span> | all rights reserved! </h1>

</section>






<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>