<?php 
session_start();
  

        spl_autoload_register(function($class_nome) 
        {
            include '../class/' . $class_nome . '.php';
        });

$cat = new Class_Pedidos();
$cliente = new Class_Cliente();
$banner = new Class_Banner();


    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
       
        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.php'</script>";
    }

?>

<!DOCTYPE html>
<!-- Created By Fotografia - www.Fotografiaweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/Programa%C3%A7ao%20Web/admin/">
    <title>derivery</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../node_modules\bootstrap\scss\compiler\style.css">
    <link rel="stylesheet" type="text/css" href="../https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-cat.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php foreach ($cat->listar() as $key => $value){

             echo "['" .$value->produto."', " .$value->qtd."],";
          }?>
        ]);

        var options = {
          title: 'Produtos mais comprados'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  <style>
        #desc{
            display: none;
        }

          .row {
  display: flex;
  justify-content: center;
  align-items: center;
}

.card {
  border-radius: 5px;
  box-shadow: 7px 7px 13px 0px rgba(50, 50, 50, 0.22);
  padding: 30px;
  margin: 20px;
  width: 400px;
  transition: all 0.3s ease-out;
}

.card:hover {
  transform: translateY(-5px);
  cursor: pointer;
}
 
.card p {
  color: #a3a5ae;
  font-size: 16px;
}
 
.image {
  float: right;
  max-width: 64px;
  max-height: 64px;
}

.blue {
  border-left: 3px solid #4895ff;
}
 
.green {
  border-left: 3px solid #3bb54a;
}
 
.red {
  border-left: 3px solid #b3404a;
}
    </style>

 
</head>
<body>
  <nav>
    <div class="wrapper">
      <div class="logo"><a href="#">Derivery</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="#">Inicio</a></li>
       
        <li>
          <a href="#" class="desktop-item">Gerir Empresa</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Gerir Empresa</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
              <img src="imagem/g-1.jpg" alt="">
              </div>
              <div class="row">
                <header>Empresa e Serviço</header>
                <ul class="mega-links">
                  <li><a href="Listar_Empresa.php">Sobre Empresa</a></li>
                  <li><a href="Listar_Parceiro.php">Visualizar Cliente</a></li>
                  <li><a href="Registar-Banner.php">Gerir Banner</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Depoimento e SEO</header>
                <ul class="mega-links">
                  <li><a href="Registar-Depoimento.php">Registar Depoimento</a></li>
                  <li><a href="Listar_Depoimento.php">Visualizar Depoimento</a></li>
                  
                </ul>
              </div>
             <div class="row">
                <header>Administrador</header>
                <ul class="mega-links">
                  <li><a href="Registar-Admin.php">Gerir Administrador</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </li>


       

        <li>
          <a href="#" class="desktop-item">Gerir Artigos</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Gerir Artigos</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
              <img src="imagem/g-1.jpg" alt="">
              </div>
              <div class="row">
                <header> Produto e Galeria</header>
                <ul class="mega-links">
                  <li><a href="Registar-Produto.php">Registar Produto</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Listar Produto</header>
                <ul class="mega-links">
                <li><a href="Listar_Hamburguer.php">Visualizar Hamburguer</a></li>
                  <li><a href="Listar_Pizza.php">Visualizar Pizza</a></li>
                  <li><a href="Listar_Bolo.php">Visualizar Bolo</a></li>
                  <li><a href="Listar_Sorvete.php">Visualizar Sorvete</a></li>
                </ul>
              </div>
              
            </div>
          </div>
        </li>
        <li><a href="pesquisar.php">Pesquisar</a></li>
        <li><a href="sair.php">Sair</a></li>
      </ul>
      <label for="Listar_menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>