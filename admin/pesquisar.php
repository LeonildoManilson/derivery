<?php include_once "include/menu.php";?>
<br><br><br><br><br><br>
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
$estado = $_POST['estado'];

echo $estado;




if(!empty($_POST['nome']) && !empty($_POST['categoria']) && !empty($_POST['estado'])){
        $result_produto = "SELECT * FROM produto WHERE nome LIKE '%$nome%' or categoria LIKE '%$categoria%' or estado LIKE '%$estado%' LIMIT 10";
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
}/*elseif(!empty($_POST['estado'])){		
  $result_produto = "SELECT * FROM produto WHERE estado LIKE '%$estado%' LIMIT 10";
  $resultado_produto = mysqli_query($conn, $result_produto);	
  $verifica = mysqli_num_rows($resultado_produto);	
}*/

/*if($verifica > 0){

      

        while($rows_produto = mysqli_fetch_array($resultado_produto)){
                echo "Nome do curso: ".$rows_produto['nome']."<br>";
                echo "Conteúdo do curso: ".$rows_produto['categoria']."<hr>";
        }
}else{
        echo "Nenhum curso encontrado na pesquisa";
}*/



?>
<br><br>








<main>

  <h1>Pesquisar Produtor</h1>



<form method="POST" action="pesquisar.php" enctype="multipart/form-data">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Nome</label>
      <input name="nome" class="form-control" id="inputCity" type="text">
           
    </div>

  
    

    <div class="form-group col-md-6">
      <label for="inputState">Categoria</label>
      <select name="categoria" id="" class="form-control" id="inputState">
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







<?php ?><br><br>

<div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Produto Pesquisado</h1>

        
        <?php if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }?><br>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Preço</th>
                  <th>Estado</th>
                  <th>Acções</th>
              </tr>
            </thead>
            <tbody>
               <?php if($verifica > 0){

                        while($rows_produto = mysqli_fetch_array($resultado_produto)){
                
                ?>
                <tr>
                  <td><?php echo $rows_produto['nome'];?></td>
                  
                  <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal1<?php echo $rows_produto['idProduto'];?>">Descrição</button></td>
                  <td><?php echo number_format($rows_produto['preco'],'2',',','.');?>kz</td>
                  <td><?php echo $rows_produto['estado'];?></td>
                  
                  <td>
                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_produto['idProduto'];?>">Visualizar</button>
                    <button type="button" class="btn btn-xs btn-warning"><a style="color: #fff" href="Editar_Produto.php?id=<?php echo $rows_produto['idProduto'];?>">Editar</a></button>
                    
                    <button type="button" class="btn btn-xs btn-danger"> <a href="processo/Processo_Delete.php?idBl=<?php echo $rows_produto['idProduto'];?>" onclick="return confirm('Deseja realmente deletar?');" style="color: #fff;">Apagar</a></button>
                  </td>
                </tr>
                <!-- Inicio Modal -->
                <div class="modal fade" id="myModal<?php echo $rows_produto['idProduto'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome'];?></h4>
                      </div>
                      <div class="modal-body">
                        <p><img src="imagem/<?php echo $rows_produto['foto'];?>" alt="<?php echo $rows_produto['nome'];?>" style="width: 200px;"></p>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal -->


                <!-- Inicio Modal -->
                <div class="modal fade" id="myModal1<?php echo $rows_produto['idProduto'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_produto['nome'];?></h4>
                      </div>
                      <div class="modal-body">
                        <p><?php echo strip_tags($rows_produto['descricao']);?></p>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal -->




                 
              <?php   }
                }else{
                        echo "Nenhum produto encontrado na pesquisa";
                } ?>

            </tbody>
           </table>
        </div>
      </div>    
    </div>
</main>









<script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>