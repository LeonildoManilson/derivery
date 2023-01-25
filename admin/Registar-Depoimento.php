

<?php include_once "include/menu.php";?>
<br><br>

<main>
<div class="container">
  <h1>Registar Depoimento</h1>
  

<form method="POST" action="processo/Processo_Depoimento.php" enctype="multipart/form-data">
    <p style="margin-left: 20px;margin-top: 20px;">Colocar somente imagem PNG ou JPEG, para não ter problema na hora do cadastro.</p>

  <div class="form-row">
    
    <div class="form-group col-md-12">
      <label for="inputState">Palavra Chave</label>
      <input class="form-control" id="inputState" name="nome" type="text" <?php
							if(!empty($_SESSION['value_nome_De'])){
								echo "value='".$_SESSION['value_nome_De']."'";
								unset($_SESSION['value_nome_De']);
							}
						 ?>>
             <?php
							if(!empty($_SESSION['vazio_nome_De'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_nome_De']."</p>";
								unset($_SESSION['vazio_nome_De']);
							}
						 ?>
    </div>
    
  </div>

  <div class="form-row">
    
    <div class="form-group col-md-12">
      <label for="inputState">Descrição</label>
       <textarea name="descricao" id="" cols="30" rows="10" class="form-control" id="inputState">
    <?php
							if(!empty($_SESSION['value_descricao_De'])){
								echo $_SESSION['value_descricao_De'];
								unset($_SESSION['value_descricao_De']);
							}
						 ?>
    </textarea>
    </div>
    
  </div>


  <div class="form-row">
    
    <div class="form-group col-md-12">
      <label for="inputState">Carregar Foto</label>
      <input name="arquivo" type="file" class="form-control" id="inputState">
    <?php
							if(!empty($_SESSION['vazio_arquivo_De'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_arquivo_De']."</p>";
								unset($_SESSION['vazio_arquivo_De']);
							}
						 ?>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <input type="hidden" name="cadastro" value="post">
</form>
</main>
  
  
<script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>