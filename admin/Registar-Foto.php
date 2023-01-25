<?php

   include_once "include/menu.php";
 
        
        spl_autoload_register(function($class_nome) 
        {
            include '../class/' . $class_nome . '.php';
        });

$cat = new Class_Categoria();


?>


<br><br>
<main>
<div class="container">
  <h1> Registar Fotos</h1>
 



<form method="POST" action="processo/Processo_Foto.php" enctype="multipart/form-data">
  
  <div class="form-row">
    
    <div class="form-group col-md-4">
      <label for="inputState">Nome</label>
      <input class="form-control" id="inputState" name="nome" type="text" <?php
              if(!empty($_SESSION['value_nome_Fo'])){
                echo "value='".$_SESSION['value_nome_Fo']."'";
                unset($_SESSION['value_nome_Fo']);
              }
             ?>>
             <?php
              if(!empty($_SESSION['vazio_nome_Fo'])){
                echo "<p style='color: #f00; '>".$_SESSION['vazio_nome_Fo']."</p>";
                unset($_SESSION['vazio_nome_Fo']);
              }
             ?>
    </div>


    <div class="form-group col-md-6">
      <label for="inputCity">Categoria</label>
      <select name="categoria" class="form-control" id="inputCity" >
                    <option value="">Selecione a categoria</option>
                    <?php foreach ($cat->listar() as $key => $value):?>
                      <option value="<?php echo $value->categoriaNome;?>"><?php echo $value->categoriaNome;?></option>
                    <?php endforeach; ?>
               </select>
               <?php
              if(!empty($_SESSION['vazio_select_Fo'])){
                echo "<p style='color: #f00; '>".$_SESSION['vazio_select_Fo']."</p>";
                unset($_SESSION['vazio_select_Fo']);
              }
             ?>
    </div>

    
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Carregar Foto</label>
      <input name="arquivo[]" type="file" class="form-control" id="inputCity" multiple><br><br>
          <?php
              if(!empty($_SESSION['vazio_arquivo_Fo'])){
                echo "<p style='color: #f00; '>".$_SESSION['vazio_arquivo_Fo']."</p>";
                unset($_SESSION['vazio_arquivo_Fo']);
              }
             ?>
    </div>


   
    
  </div>
  
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <input type="hidden" name="env" value="Cadastrar">

  <p style="margin-left: 20px;margin-top: 20px;">Colocar somente imagem PNG ou JPEG, para não ter problema na hora do cadastro. <strong>Só deves enviar 7 fotos de uma vez</strong></p>
</form>
<main>

    
<script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>