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

<!-- home seccao inicio  -->
<br><br><br><br><br><br>
<section class="order" id="order">

    <h1 class="heading"> <span>Criar</span> uma Conta </h1>

    <div class="row">
        
        <div class="image">
            <img src="images/order-img.jpg" alt="">
        </div>

        <form action="admin/processo/Processo_Cliente.php" method="post">

            <div class="inputBox">
                <input type="text" placeholder="nome" name="nome" required>
                <input type="email" placeholder="email" name="email" required>
            </div>

            <div class="inputBox">
                <input type="number" placeholder="numero" name="numero" required>
                <input type="password" placeholder="Senha" name="senha" required>
            </div>


            <input type="submit" value="Cadastrar" class="btn">

        </form>
        <p><a href="login.php">Ja possuo conta.</a></p>

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