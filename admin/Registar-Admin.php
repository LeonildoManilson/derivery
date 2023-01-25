<?php

   include_once "include/menu.php";
 
        
        spl_autoload_register(function($class_nome) 
        {
            include '../class/' . $class_nome . '.php';
        });

$cat = new Class_Admin();


?>
<br><br>
<main>

  <h1>Registar  administrador</h1>



<form action="processo/Processo_Admin.php" method="post">
  
  <div class="form-row">
    
    <div class="form-group col-md-4">
      <label for="inputState">Nome</label>
      <input type="text" class="form-control" id="inputState" name="nome" <?php
                            if(!empty($_SESSION['value_nome_Se'])){
                                echo "value='".$_SESSION['value_nome_Se']."'";
                                unset($_SESSION['value_nome_Se']);
                            }
                         ?>>
                         
                         <?php
                            if(!empty($_SESSION['vazio_nome_Se'])){
                                echo "<p style='color: #f00; '>".$_SESSION['vazio_nome_Se']."</p>";
                                unset($_SESSION['vazio_nome_Se']);
                            }
                         ?>
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">E-mail</label>
      <input type="email" class="form-control" id="inputState" name="email" <?php
                            if(!empty($_SESSION['value_email_Se'])){
                                echo "value='".$_SESSION['value_email_Se']."'";
                                unset($_SESSION['value_email_Se']);
                            }
                         ?>>
                         
                         <?php
                            if(!empty($_SESSION['vazio_email_Se'])){
                                echo "<p style='color: #f00; '>".$_SESSION['vazio_email_Se']."</p>";
                                unset($_SESSION['vazio_email_Se']);
                            }
                         ?>
    </div>
    
  </div>

  <div class="form-row">
    
    <div class="form-group col-md-4">
      <label for="inputState">Senha</label>
      <input type="password" class="form-control" id="inputState" name="senha" <?php
                            if(!empty($_SESSION['value_senha_Se'])){
                                echo "value='".$_SESSION['value_senha_Se']."'";
                                unset($_SESSION['value_senha_Se']);
                            }
                         ?>>
                         
                         <?php
                            if(!empty($_SESSION['vazio_senha_Se'])){
                                echo "<p style='color: #f00; '>".$_SESSION['vazio_senha_Se']."</p>";
                                unset($_SESSION['vazio_senha_Se']);
                            }
                         ?>
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Dica</label>
      <input type="text" class="form-control" id="inputState" name="dica" <?php
                            if(!empty($_SESSION['value_dica_Se'])){
                                echo "value='".$_SESSION['value_dica_Se']."'";
                                unset($_SESSION['value_dica_Se']);
                            }
                         ?>>
                         
                         <?php
                            if(!empty($_SESSION['vazio_dica_Se'])){
                                echo "<p style='color: #f00; '>".$_SESSION['vazio_dica_Se']."</p>";
                                unset($_SESSION['vazio_dica_Se']);
                            }
                         ?>
                         <p>Escolha uma dica para caso esqueceres a senhar, poderas usar a dica para recuperar-lá</p>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  <input type="hidden" name="cadastro" value="post">
</form>
</main>


    

    <br><br><br>

<div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Administradores do Site</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
             <th>Nome</th>
              <th>E-mail</th>
              <th>Acções</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach ($cat->listar() as $key => $value):?>
                <tr>
                    <td><?php echo $value->adminNome;?></td>
                    <td><?php echo $value->adminEmail;?></td>
                  
                  <td>
                    
                    
                   <button type="button" class="btn btn-xs btn-danger"> <a href="processo/Processo_Delete.php?idAd=<?php echo $value->idAdmin;?>" onclick="return confirm('Deseja realmente deletar?');" style="color: #fff;">Apagar</a></button>

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