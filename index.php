<?php session_start();
 include 'config.php';


spl_autoload_register(function($class_nome) 
{
include 'class/' . $class_nome . '.php';
});

$cat = new Class_Banner();
?>
<!DOCTYPE html>
<html lang="pt;pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site para compra de Comida</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    

  
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Banner Top seccao inicio  -->
        <div class="Banner_Top">
        <?php foreach ($cat->listarTop() as $key => $value):?>
            <a href="<?php echo $value->link;?>">
                <img src="admin/imagem/<?php echo $value->foto;?>" alt="<?php echo $value->nome;?>" alt="" style="width: 100%;height:290px;">
            </a>
        <?php endforeach; ?> 
        </div>

<!-- Banner Top seccao fim -->
    
<!-- header seccao inicio  -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>Comida</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#Especialidade">Especialidade</a>
        <a href="#Pesquisar">Pesquisar</a>
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

<section class="home" id="home">

    <div class="content">
        <h3>Comida Feita Com Amor</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas accusamus tempore temporibus rem amet laudantium animi optio voluptatum. Natus obcaecati unde porro nostrum ipsam itaque impedit incidunt rem quisquam eos!</p>
        <a href="#" class="btn">Peça Agora</a>
    </div>

    <div class="image">
        <img src="images/home-img.png" alt="">
    </div>

</section>

<!-- home seccao fim -->

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




<!-- Especialidade seccao inicio  -->

<section class="Especialidade" id="Especialidade">

    <h1 class="heading"> Nossa <span>Especialidade</span> </h1>

    <div class="box-container">

        <div class="box"><a href="Hamburguer.php">
            <img class="image" src="images/s-img-1.jpg" alt="">
            <div class="content">
                <img src="images/s-1.png" alt="">
                <h3>Hambúrger Saboroso</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
            </div></a>
        </div>
        <div class="box"><a href="Pizza.php">
            <img class="image" src="images/s-img-2.jpg" alt="">
            <div class="content">
                <img src="images/s-2.png" alt="">
                <h3>Pizza Saboroso</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
            </div></a>
        </div>
        <div class="box"><a href="http://localhost/Programa%C3%A7ao%20Web/soverte.php">
            <img class="image" src="images/s-img-3.jpg" alt="">
            <div class="content">
                <img src="images/s-3.png" alt="">
                <h3>Sorvete</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
            </div>
        </div></a>
        <div class="box"><a href="bebida.php">
            <img class="image" src="images/s-img-4.jpg" alt="">
            <div class="content">
                <img src="images/s-4.png" alt="">
                <h3>Bebidas</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
            </div></a>
        </div>
        <div class="box">
            <img class="image" src="images/s-img-5.jpg" alt="">
            <div class="content">
                <img src="images/s-5.png" alt="">
                <h3>Bolos e Doces</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="images/s-img-6.jpg" alt="">
            <div class="content">
                <img src="images/s-6.png" alt="">
                <h3>café da manhã saudável</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
            </div>
        </div>

    </div>

</section>

<!-- Especialidade seccao fim -->

<!-- Popular seccao inicio  -->

<section class="Popular" id="Popular">

    <h1 class="heading">Comidas <span>Mais</span>  Populares </h1>

    <div class="box-container">

        <div class="box">
            <span class="price"> 1000kz - 2500 kz </span>
            <img src="images/p-1.jpg" alt="">
            <h3>Hambúrguer Saboroso</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">Peça Agora</a>
        </div>
        <div class="box">
            <span class="price"> 2000kz - 1000kz </span>
            <img src="images/p-2.jpg" alt="">
            <h3>Bolos Saborosos</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">Peça Agora</a>
        </div>
        <div class="box">
            <span class="price"> 200kz - 500kz </span>
            <img src="images/p-3.jpg" alt="">
            <h3>Doces Saborosos</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">Peça Agora</a>
        </div>
        <div class="box">
            <span class="price"> 300kz - 600kz </span>
            <img src="images/p-4.jpg" alt="">
            <h3>Cupcakes Saborosos</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">Peça Agora</a>
        </div>
        <div class="box">
            <span class="price"> 500kz - 1500kz </span>
            <img src="images/p-5.jpg" alt="">
            <h3>Bebidas</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">Peça Agora</a>
        </div>
        <div class="box">
            <span class="price"> 150kz - 1200kz </span>
            <img src="images/p-6.jpg" alt="">
            <h3>Sorvete</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">Peça Agora</a>
        </div>

    </div>

</section>

<!-- Popular seccao fim -->

<!-- Banner Meio seccao inicio  -->
<div class="Banner_Top">
        <?php foreach ($cat->listarMeio() as $key => $value):?>
            <a href="<?php echo $value->link;?>">
                <img src="admin/imagem/<?php echo $value->foto;?>" alt="<?php echo $value->nome;?>" alt="" style="width: 100%;height:290px;">
            </a>
        <?php endforeach; ?> 
        </div>

<!-- Banner Meio seccao fim -->

<!-- steps seccao inicio  -->

<div class="step-container">

    <h1 class="heading">Como<span> Funciona</span></h1>

    <section class="steps">

        <div class="box">
            <img src="images/step-1.jpg" alt="">
            <h3>Escolha Sua Comida Favorita</h3>
        </div>
        <div class="box">
            <img src="images/step-2.jpg" alt="">
            <h3>Entrega Grátis E Rápida</h3>
        </div>
        <div class="box">
            <img src="images/step-3.jpg" alt="">
            <h3>Métodos De Pagamento Fáceis</h3>
        </div>
        <div class="box">
            <img src="images/step-4.jpg" alt="">
            <h3>E, Finalmente, Aproveite Sua Comida</h3>
        </div>
    
    </section>

</div>

<!-- steps seccao fim -->

<!-- Galeria seccao inicio  -->

<section class="Galeria" id="Galeria">

    <h1 class="heading"> Nossa Comida<span> Galeria </span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/g-1.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-2.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-3.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-4.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-5.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-6.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-7.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-8.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-9.jpg" alt="">
            <div class="content">
                <h3>Comida Saborosa</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">Peça Agora</a>
            </div>
        </div>

    </div>

</section>

<!-- Galeria seccao fim -->

<!-- Testemunho seccao inicio  -->

<section class="Testemunho" id="Testemunho">

    <h1 class="heading"> Nossos Clientes <span> Testemunhos</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic1.jpg" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic2.jpg" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic3.jpg" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>

    </div>

</section>

<!-- Testemunho seccao fim -->

<!-- order seccao inicio  -->

<section class="order" id="order">

    <h1 class="heading"> <span>Peça</span> Agora </h1>

    <div class="row">
        
        <div class="image">
            <img src="images/order-img.jpg" alt="">
        </div>

        <form action="">

            <div class="inputBox">
                <input type="text" placeholder="nomr">
                <input type="email" placeholder="email">
            </div>

            <div class="inputBox">
                <input type="number" placeholder="numero">
                <input type="text" placeholder="nome da comida">
            </div>

            <textarea placeholder="endereço" name="" id="" cols="30" rows="10"></textarea>

            <input type="submit" value="Peça Agora" class="btn">

        </form>

    </div>

</section>

<!-- order seccao fim -->

<!-- Banner Rodape seccao inicio  -->
<div class="Banner_Top">
        <?php foreach ($cat->listarRodape() as $key => $value):?>
            <a href="<?php echo $value->link;?>">
                <img src="admin/imagem/<?php echo $value->foto;?>" alt="<?php echo $value->nome;?>" alt="" style="width: 100%;height:290px;">
            </a>
        <?php endforeach; ?> 
        </div>

<!-- Banner Rodape seccao fim -->

<!-- footer section  -->

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

<!-- scroll top button  -->
<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

<!-- loader  -->





















<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>