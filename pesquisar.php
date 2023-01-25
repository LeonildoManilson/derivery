<?php
 include 'config.php';


spl_autoload_register(function($class_nome) 
{
include 'class/' . $class_nome . '.php';
});

$cat = new Class_Bebida();
//$seo = new Class_SEO();
function limitarTexto($texto, $limite){
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
    return $texto;
}?>

<?php
error_reporting(0);
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "derivery";
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?> <?php
$verifica = 0;
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];


echo $estado;




if(!empty($_POST['nome']) && !empty($_POST['categoria'])){
        $result_produto = "SELECT * FROM produto WHERE nome LIKE '%$nome%' or categoria LIKE '%$categoria%' LIMIT 10";
        $resultado_produto = mysqli_query($conn, $result_produto);
        $verifica = mysqli_num_rows($resultado_produto);
}elseif(!empty($_POST['nome'])){		
        $result_produto = "SELECT * FROM produto WHERE nome LIKE '%$nome%' LIMIT 10";
        $resultado_produto = mysqli_query($conn, $result_produto);		
        $verifica = mysqli_num_rows($resultado_produto);
}elseif(!empty($_POST['categoria'])){		
        $result_produto = "SELECT * FROM produto WHERE categoria LIKE '%$categoria%' LIMIT 10";
        $resultado_produto = mysqli_query($conn, $result_produto);	
        $verifica = mysqli_num_rows($resultado_produto);	
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
        <a href="#home">home</a>
        <a href="#Especialidade">Especialidade</a>
        <a href="#Popular">Popular</a>
        <a href="#Galeria">Galeria</a>
        <a href="#Testemunho">Testemunho</a>
        <a href="Carrinho.php">Pedido</a>
        <a href="login.php">Login</a>
        <a href="cadastro.php">Cadastro</a>
    </nav>

</header>

<!-- header seccao fim -->

<!-- Pesquisar seccao inicio  -->

<section class="Pesquisar" id="Pesquisar">

    <h1 class="heading"> Pesquisar <span>Produto</span> </h1>

    <div class="box-container" >

    <form method="POST" action="pesquisar.php" enctype="multipart/form-data">

                        <div class="inputBox">
                       
                            <label for="inputCity">Nome</label>
                            <input name="nome"  id="inputCity" type="text" style="width: 200px;height:30px;">
                                
                       


                        

                       
                            <label for="inputState">Categoria</label>
                            <select name="categoria" id=""  id="inputState" style="width: 200px;height:30px;">
                            <option value="#">Seleciona a Categoria</option>
                            <option value="Pizza">Pizza</option>
                            <option value="Hamburguer">Hamburguer</option>
                            <option value="Soverte">Soverte</option>
                            <option value="Bolo">Bolo</option>
                            </select>

                        </div>


                        
                        
                        </div>

            <button type="submit" class="btn btn-primary">Pesquisar</button>
            <input type="hidden" name="Pesquisar" value="post">
            </form>
    </div>

</section>

<!-- Pesquisar seccao fim -->

<!-- home seccao inicio  -->
<br><br><br><br><br><br>
<section class="Popular" id="Popular">

    <h1 class="heading">Comidas <span>Mais</span>  Populares </h1>

    <div class="box-container">
    <?php if($verifica > 0){

    while($rows_produto = mysqli_fetch_array($resultado_produto)){

    ?>

        <div class="box">
            <span class="price"> <?php echo number_format($rows_produto['preco'],'2',',','.');?> kz</span>
            <img src="admin/imagem/<?php echo $rows_produto['foto'];?>" alt="<?php echo $rows_produto['nome'];?>" alt="">
            <h3><?php echo $rows_produto['nome'];?></h3>
            <h4><?php echo $rows_produto['descricao'];?></h4>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">Peça Agora</a>
        </div>
        
        <?php   }
                }else{
                        echo "Nenhum produto encontrado na pesquisa";
                } ?>

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