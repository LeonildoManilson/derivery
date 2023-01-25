

<?php include_once "include/menu.php";?>
<br><br>
<main>

  <h1>Registar Produtor</h1>



<form method="POST" action="processo/Processo_Produto.php" enctype="multipart/form-data">
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
							if(!empty($_SESSION['value_preco'])){
								echo "value='".$_SESSION['value_preco']."'";
								unset($_SESSION['value_preco']);
							}
						 ?>>
             <?php
							if(!empty($_SESSION['vazio_preco'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_preco']."</p>";
								unset($_SESSION['vazio_preco']);
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

    <div class="form-group col-md-6">
      <label for="inputState">Categoria</label>
      <select name="categoria" id="" class="form-control" id="inputState">
        <option value="#">Seleciona a Categoria</option>
        <option value="Pizza">Pizza</option>
        <option value="Hamburguer">Hamburguer</option>
        <option value="Soverte">Soverte</option>
        <option value="Bolo">Bolo</option>
      </select>
    <?php
							if(!empty($_SESSION['vazio_categoria'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_categoria']."</p>";
								unset($_SESSION['vazio_categoria']);
							}
						 ?>
    </div>


    <div class="form-group col-md-6">
      <label for="inputState">Estado do Produto</label>
      <select name="estado" id="" class="form-control" id="inputState">
        <option value="#">Selecionar</option>
        <option value="disponivel">Disponível</option>
        <option value="indisponivel">Indisponível</option>
      </select>
    <?php
              if(!empty($_SESSION['vazio_estado'])){
                echo "<p style='color: #f00; '>".$_SESSION['vazio_estado']."</p>";
                unset($_SESSION['vazio_estado']);
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