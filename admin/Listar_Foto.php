<?php

   include_once "include/menu.php";
 
        
        spl_autoload_register(function($class_nome) 
        {
            include '../class/' . $class_nome . '.php';
        });

$cat = new Class_Foto();


?>

     
     

<br><br><br>

<div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Sobre Empresa</h1>
        <br><br>
        <?php if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
              <th>Nome</th>
              <th>Categoria</th>
              <th>Acções</th>
               
              </tr>
            </thead>
            <tbody>
               <?php foreach ($cat->listar() as $key => $value):?>
                <tr>
                   <td><?php echo $value->nome;?></td>
                   <td><?php echo $value->fotoCategoria;?></td>
                  
                  <td>
                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $value->idFoto;?>">Visualizar Foto</button>
                    
                   <button type="button" class="btn btn-xs btn-danger"> <a href="processo/Processo_Delete.php?idFot=<?php echo $value->idFoto;?>" onclick="return confirm('Deseja realmente deletar?');" style="color: #fff;">Apagar</a></button>

                  </td>
                </tr>
                <!-- Inicio Modal -->
                <div class="modal fade" id="myModal<?php echo $value->idFoto;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $value->nome;?></h4>
                      </div>
                      <div class="modal-body">
                        <p><img src="imagem/<?php echo $value->foto;?>" alt="" style="width: 200px;"></p>
                        
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

       
<script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
  

</body>
</html>