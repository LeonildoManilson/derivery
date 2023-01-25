<?php

   include_once "include/menu.php";
        
   spl_autoload_register(function($class_nome) 
   {
       include '../class/' . $class_nome . '.php';
   });
   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
   

$cat = new Class_Banner();


$resultado = $cat->find($id);

?>
<br><br>
<main>

  <h1> Editar Banner</h1>
  
  
<form method="POST" action="processo/Processo_Editar_Banner.php?id=<?php echo $id;?>" enctype="multipart/form-data">
      <p style="margin-left: 20px;margin-top: 20px;">Colocar somente imagem PNG ou JPEG, para não ter problema na hora do cadastro.</p>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Nome</label>
      <input name="nome" class="form-control" id="inputCity" type="text" value="<?php echo $resultado->nome;?>">
             
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Link</label>
      <input name="link" class="form-control" id="inputState" type="text" value="<?php echo $resultado->link;?>">
    </div>

   

    <div class="form-group col-md-6">
      <label for="inputState">Posição</label>
      <select name="posicao" id="" class="form-control" id="inputState">
        <option value="#">Selecionar</option>
         <option value="<?php echo $resultado->posicao;?>" selected><?php echo $resultado->posicao;?></option>
         <option value="Top">Top</option>
         <option value="Meio">Meio</option>
         <option value="Rodape">Rodape</option>
      </select>
    <?php
              if(!empty($_SESSION['vazio_estado'])){
                echo "<p style='color: #f00; '>".$_SESSION['vazio_estado']."</p>";
                unset($_SESSION['vazio_estado']);
              }
             ?>
    </div>
    
  </div>



  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputState">Carregar foto</label>
      <input name="arquivo" type="file" class="form-control" id="inputState">
    </div> 
    
    <div class="form-group col-md-6">
      <label for="inputState">Foto Antiga</label><p></p>
      <img src="imagem/<?php echo $resultado->foto;?>" alt="" style="width: 200px;">
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