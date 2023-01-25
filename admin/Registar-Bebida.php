

<?php include_once "include/menu.php";?>
<br><br>
<main>

  <h1>Registar bebida</h1>



<form method="POST" action="processo/Processo_Bebida.php" enctype="multipart/form-data">
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
      <label for="inputState">Preço</label>
      <input name="preco" class="form-control" id="inputState" type="text" <?php
							if(!empty($_SESSION['value_bebida'])){
								echo "value='".$_SESSION['value_bebida']."'";
								unset($_SESSION['value_bebida']);
							}
						 ?>>
             <?php
							if(!empty($_SESSION['vazio_bebida'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_bebida']."</p>";
								unset($_SESSION['vazio_bebida']);
							}
						 ?>
    </div>
    
  </div>


  <div class="form-row">
    
    <div class="form-group col-md-12">
      <label for="inputState">Descrição</label>
      <textarea name="descricao" id="" cols="30" rows="10" class="form-control" id="inputState">
    <?php
							if(!empty($_SESSION['value_descricao_Bl'])){
								echo $_SESSION['value_descricao_Bl'];
								unset($_SESSION['value_descricao_Bl']);
							}
						 ?>
    </textarea>
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
    
  </div>
  
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <input type="hidden" name="Cadastrar" value="post">
</form>
</main>
  
   
<script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>