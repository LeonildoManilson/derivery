<?php
 include 'config.php';
 include 'componente.php';


spl_autoload_register(function($class_nome) 
{
include 'class/' . $class_nome . '.php';
});

$cat = new Class_Produto();
//$seo = new Class_SEO();
function limitarTexto($texto, $limite){
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
    return $texto;
}?>

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
<section class="Popular" id="Popular">

    <h1 class="heading">Comidas <span>Mais</span>  Populares </h1>

    <div class="box-container">
    <?php foreach ($cat->listarHamburguerE() as $key => $value):?>

        <div class="box">
            <span class="price"> <?php echo number_format($value->preco,'2',',','.');?>kz</span>
            <img src="admin/imagem/<?php echo $value->foto;?>" alt="<?php echo $value->nome;?>" alt="" >
            <h3><?php echo $value->nome;?></h3>
            <h4><?php  echo $value->descricao;?></h4>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="Carrinho.php?id=carrinho&add=<?php echo $value->idProduto;?>" class="btn">Peça Agora</a>
        </div>
        
     <?php endforeach; ?>

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