

<?php include_once "include/menu.php";?>
<br><br>
<main>

  <h1>Registar Banner</h1>



<form method="POST" action="processo/Processo_Banner.php" enctype="multipart/form-data">
  	  <p style="margin-left: 20px;margin-top: 20px;">Colocar somente imagem PNG ou JPEG, para não ter problema na hora do cadastro.</p>

  <div class="form-row">

  <div class="form-group col-md-6">
      <label for="inputCity">Nome</label>
      <input name="nome" class="form-control" id="inputCity" type="text" <?php
							if(!empty($_SESSION['value_nome_Bl'])){
								echo "value='".$_SESSION['value_nome_Bl']."'";
								unset($_SESSION['value_nome_Bl']);
							}
						 ?>>
             <?php
							if(!empty($_SESSION['vazio_nome_Bl'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_nome_Bl']."</p>";
								unset($_SESSION['vazio_nome_Bl']);
							}
						 ?>
    </div>


    <div class="form-group col-md-6">
      <label for="inputCity">link</label>
      <input name="link" class="form-control" id="inputCity" type="text" <?php
							if(!empty($_SESSION['value_link_Bl'])){
								echo "value='".$_SESSION['value_link_Bl']."'";
								unset($_SESSION['value_link_Bl']);
							}
						 ?>>
             <?php
							if(!empty($_SESSION['vazio_link_Bl'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_link_Bl']."</p>";
								unset($_SESSION['vazio_link_Bl']);
							}
						 ?>
    </div>

    
    
  </div>




  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputState">Carregar foto</label>
      <input name="arquivo" type="file" class="form-control" id="inputState">
    <?php
							if(!empty($_SESSION['vazio_arquivo_Bl'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_arquivo_Bl']."</p>";
								unset($_SESSION['vazio_arquivo_Bl']);
							}
						 ?>
    </div>

    <div class="form-group col-md-6">
      <label for="inputState">Posição</label>
      <select name="posicao" id="" class="form-control" id="inputState">
        <option value="#">Seleciona a Posição</option>
        <option value="Top">Top</option>
        <option value="Meio">Meio</option>
        <option value="Rodape">Rodape</option>
        
      </select>
    <?php
							if(!empty($_SESSION['vazio_posicao'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_posicao']."</p>";
								unset($_SESSION['vazio_posicao']);
							}
						 ?>
    </div>

    


    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <input type="hidden" name="Cadastrar" value="post">
</form>








<br><br><br>


<div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Listar Banner</h1>

        <br><br>
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
                  <th>nome</th>
                  <th>Link</th>
                  <th>Foto</th>
                  <th>Posição</th>
                  <th>Acções</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach ($banner->listar() as $key => $value):?>
                <tr>
                  <td><?php echo $value->nome;?></td>
                  
                  <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal1<?php echo $value->idBanner;?>">Link</button></td>
                   
                  
                  <td>
                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $value->idBanner;?>">Visualizar</button>
        
                  </td>
                  <td><?php echo $value->posicao;?></td>
                  <td>
                  <button type="button" class="btn btn-xs btn-warning"><a style="color: #fff" href="Editar_Banner.php?id=<?php echo $value->idBanner;?>">Editar</a></button>
                    
                    <button type="button" class="btn btn-xs btn-danger"> <a href="processo/Processo_Delete.php?idBan=<?php echo $value->idBanner;?>" onclick="return confirm('Deseja realmente deletar?');" style="color: #fff;">Apagar</a></button>
                  </td>
                </tr>
                <!-- Inicio Modal -->
                <div class="modal fade" id="myModal<?php echo $value->idBanner;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $value->nome;?></h4>
                      </div>
                      <div class="modal-body">
                        <p><img src="imagem/<?php echo $value->foto;?>" alt="<?php echo $value->nome;?>" style="width: 200px;"></p>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal -->


                <!-- Inicio Modal -->
                <div class="modal fade" id="myModal1<?php echo $value->idBanner;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $value->nome;?></h4>
                      </div>
                      <div class="modal-body">
                        <p><?php echo $value->link;?></p>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal -->




                 
              <?php endforeach; ?>
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