<?php
 session_start();


 if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
     echo "<script>window.location = 'inicio.php'</script>";
 }

?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site para compra de Comida -Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    
<!-- header seccao inicio  -->



<!-- header seccao fim -->

<!-- home seccao inicio  -->
<br><br><br><br><br><br>

<section class="order" id="order">

    <h1 class="heading"> <span>Entrar</span> no Sistema </h1>

    <div class="row">
        
        <div class="image">
            <img src="../images/p-1.jpg" alt="">
        </div>

        <form action="processo/Processa_Login.php" method="post">

            <div class="inputBox">
                <input type="email" placeholder="email" name="email">
                <input type="password" placeholder="senha" name="senha">
            </div>

           

            <input type="submit" value="Entrar" class="btn">

        </form>

        <p><a href="cadastro.html">Esqueceu a senha?.</a></p>

    </div>

</section>

<!-- home seccao fim -->

<?php 
    /*$se = "leo";
    $senha = password_hash($se, PASSWORD_DEFAULT);
    echo $senha;*/

?>

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
<script src="../js/script.js"></script>


</body>
</html>