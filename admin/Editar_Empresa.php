<?php

   include_once "include/menu.php";
        
   spl_autoload_register(function($class_nome) 
   {
       include '../class/' . $class_nome . '.php';
   });
   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
   

$equi = new Class_SobreEmpresa();


$resultado = $equi->find($id);

?>
<br><br>

<main>
<div class="container">
  <h1> Editar Empresa</h1>
  
  
  


<form method="POST" action="processo/Processo_Editar_Emp.php?id=<?php echo $id;?>">
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Nome da Empresa</label>
      <input name="nome" type="text" value="<?php echo $resultado->empresaNome;?>" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">E-mail da Empresa</label>
      <input name="email" type="email" value="<?php echo $resultado->empresaEmail;?>" class="form-control" id="inputState">
    </div>
    
  </div>

  <div class="form-row">
    
    <div class="form-group col-md-12">
      <label for="inputState">Sobre a Empresa</label> 
      <textarea name="descricao" id="" cols="30" rows="10" class="form-control" id="inputState"><?php echo $resultado->empresaDescricao;?></textarea>
    </div>
    
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Contacto 1</label>
     <input type="number" name="cont1" value="<?php echo $resultado->empresaContacto1;?>" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Contacto 2</label>
     <input type="number" name="cont2" value="<?php echo $resultado->empresaContacto2;?>" class="form-control" id="inputCity">
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