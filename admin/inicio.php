<?php

   include_once "include/menu.php";


?>



  <div class="body-text">
  <br><br>
        <?php if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }?>
    <div style="margin-top: 600px"><p>Bem-Vindo ao Gerenciador do site</p>


      <!--Estatistica geral -->
      <div class="row">
      <div class="card green">
        <h2>Clientes</h2>
        <p>Quantidade de cliente no sistema</p>
        <h4><?php echo $cliente->listarQtd(); ?></h4>
      </div>
 
      <div class="card blue">
        <h2>Valor Arrecadado</h2>
        <p>Soma total das vendas</p>
        <h4> <!--<?php //foreach ($cat->listarQtd() as $key => $value):?>
                  <?php //echo $value->preco;?>
              <?php //endforeach; ?>-->
              <?php echo number_format($cat->listarQtd(),'2',',','.');?>kz
       </h4>
      </div>
 
      <div class="card red">
        <h2>Produtos</h2>
        <p>Quantidade de produtos vendidos</p>
        <h4><?php echo $cat->listarQtdP(); ?></h4>
      </div>
    </div>

    <!--Estatistica geral FIM-->

        <div id="piechart" style="width: 900px; height: 500px;"></div>


    </div>


    <!-- PEDIDOS -->

    <?php include_once "Listar_Pedidos.php"; ?>
    
  </div>
  
<script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
