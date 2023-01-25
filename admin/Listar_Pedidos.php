<?php

   include_once "include/menu.php";
 
        
        spl_autoload_register(function($class_nome) 
        {
            include '../class/' . $class_nome . '.php';
        });

$cat = new Class_Pedidos();


?>
<br><br><br>


<div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Pedidos</h1>

        <br>
        <?php if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table" style="font-size: 14pt">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>Quantidade</th>
                  <th>Preço</th>
                  <th>Cliente</th>
                  <th>Acções</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach ($cat->listarP() as $key => $value):?>
                <tr>
                  <td><?php echo $value->produto;?></td>
                  
                  <td><?php echo $value->qtd;?></td>
                  <td><?php echo number_format($value->precototal,'2',',','.');?>kz</td>
                  <td><?php echo $value->cliente;?></td>
                  
                  <td>
                    <button type="button" class="btn btn-xs btn-danger"> <a href="processo/Processo_Delete.php?idBl=<?php echo $value->idProduto;?>" onclick="return confirm('Deseja realmente deletar?');" style="color: #fff;">Apagar</a></button>
                  </td>
                </tr>
                




                 
              <?php endforeach; ?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>

     
<script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>