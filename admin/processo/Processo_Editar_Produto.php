<?php
        
        spl_autoload_register(function($class_nome) 
        {
            include '../../class/' . $class_nome . '.php';
        });

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$cat = new Class_Produto();
$nome  = htmlspecialchars(addslashes($_POST['nome']));
$preco  = htmlspecialchars(addslashes($_POST['preco']));
$categoria  = htmlspecialchars(addslashes($_POST['categoria']));
$estado  = htmlspecialchars(addslashes($_POST['estado']));
$descricao = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", addslashes($_POST['descricao']));
$nome1 = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nome)));

//Verificar imagem antes de alterar
$resultado = $cat->find($id);

if (empty($_FILES['arquivo']['name'])) {

    $cat->setNome($nome);
    $cat->setPreco($preco);
  
        $cat->setDescricao($descricao);
        $cat->setFoto($resultado->foto);
        $cat->setCategoria($categoria);
         $cat->setEstado($estado);
    
        # Insert
        if($cat->update($id)){
           
            if($categoria == 'Hamburguer'){

                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Hamburguer.php'>
                <script type=\"text/javascript\">
                    alert(\"Hamburguer editado com sucesso.\");
                </script>
                ";
                unset($_SESSION['value_preco']);
                unset($_SESSION['value_nome_Bl']);
                unset($_SESSION['value_descricao_Bl']);
                unset($_SESSION['value_categoria']);
        
               } 
        
               if($categoria == 'Pizza'){
        
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Pizza.php'>
                <script type=\"text/javascript\">
                    alert(\"Pizza editado com sucesso.\");
                </script>
                ";
                unset($_SESSION['value_preco']);
                unset($_SESSION['value_nome_Bl']);
                unset($_SESSION['value_descricao_Bl']);
                unset($_SESSION['value_categoria']);
        
               }
        
               if($categoria == 'Bolo'){
        
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Bolo.php'>
                <script type=\"text/javascript\">
                    alert(\"Bolo editado com sucesso.\");
                </script>
                ";
                unset($_SESSION['value_preco']);
                unset($_SESSION['value_nome_Bl']);
                unset($_SESSION['value_descricao_Bl']);
                unset($_SESSION['value_categoria']);
        
               }
        
               if($categoria == 'Soverte'){
        
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Soverte.php'>
                <script type=\"text/javascript\">
                    alert(\"Soverte editado com sucesso.\");
                </script>
                ";
                unset($_SESSION['value_preco']);
                unset($_SESSION['value_nome_Bl']);
                unset($_SESSION['value_descricao_Bl']);
                unset($_SESSION['value_categoria']);
        
               }
            
          
        }else{
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Hamburguer.php'>
            <script type=\"text/javascript\">
                alert(\"Hamburguer n??o editado.\");
            </script>
            ";
        }

}else{

    if (unlink("../imagem/$resultado->foto")) {
        
        
        $_UP['pasta'] = '../imagem/';
        
        // Tamanho m??ximo do arquivo (em Bytes)
        $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
        
        // Array com as extens??es permitidas
        $_UP['extensoes'] = array('jpg', 'png', 'PNG');
        
        // Renomeia o arquivo? (Se true, o arquivo ser?? salvo como .jpg e um nome ??nico)
        $_UP['renomeia'] = false;
        
        // Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'N??o houve erro';
        $_UP['erros'][1] = 'O arquivo no upload ?? maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'N??o foi feito o upload do arquivo';
        
        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($_FILES['arquivo']['error'] != 0) {
        die("N??o foi poss??vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
        exit; // Para a execu????o do script
        }
        
        // Caso script chegue a esse ponto, n??o houve erro com o upload e o PHP pode continuar
        
        // Faz a verifica????o da extens??o do arquivo
        $file_extension = explode('.', $_FILES['arquivo']['name']);
        $extensao = end($file_extension);
        
        
        if (array_search($extensao, $_UP['extensoes']) === false) {
        
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Hamburguer.php'>
                <script type=\"text/javascript\">
                    alert(\"Por favor, envie arquivos com as seguintes extens??es: jpg, png ou jpeg.\");
                </script>
                ";
        }
        
        // Faz a verifica????o do tamanho do arquivo
        else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        
        echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Hamburguer.php'>
                <script type=\"text/javascript\">
                    alert(\"O arquivo enviado ?? muito grande, envie arquivos de at?? 2Mb.\");
                </script>
                ";
        }
        
        // O arquivo passou em todas as verifica????es, hora de tentar mov??-lo para a pasta
        else {
        // Primeiro verifica se deve trocar o nome do arquivo
        if ($_UP['renomeia'] == true) {
        // Cria um nome baseado no UNIX TIMESTAMP atual e com extens??o .jpg
        $nome_final = time().'.jpg';
        } else {
        // Mant??m o nome original do arquivo
        $nome_final = $_FILES['arquivo']['name'];
        
        }
        
        // Depois verifica se ?? poss??vel mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
            $cat->setNome($nome);
            $cat->setPreco($preco);
            $cat->setDescricao($descricao);
            $cat->setFoto($nome_final);
            $cat->setCategoria($categoria);
            $cat->setEstado($estado);
        
            # Insert
            if($cat->update($id)){
                
                if($categoria == 'Hamburguer'){

                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Hamburguer.php'>
                    <script type=\"text/javascript\">
                        alert(\"Hamburguer editado com sucesso.\");
                    </script>
                    ";
                    unset($_SESSION['value_preco']);
                    unset($_SESSION['value_nome_Bl']);
                    unset($_SESSION['value_descricao_Bl']);
                    unset($_SESSION['value_categoria']);
            
                   } 
            
                   if($categoria == 'Pizza'){
            
                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Pizza.php'>
                    <script type=\"text/javascript\">
                        alert(\"Pizza editado com sucesso.\");
                    </script>
                    ";
                    unset($_SESSION['value_preco']);
                    unset($_SESSION['value_nome_Bl']);
                    unset($_SESSION['value_descricao_Bl']);
                    unset($_SESSION['value_categoria']);
            
                   }
            
                   if($categoria == 'Bolo'){
            
                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Bolo.php'>
                    <script type=\"text/javascript\">
                        alert(\"Bolo editado com sucesso.\");
                    </script>
                    ";
                    unset($_SESSION['value_preco']);
                    unset($_SESSION['value_nome_Bl']);
                    unset($_SESSION['value_descricao_Bl']);
                    unset($_SESSION['value_categoria']);
            
                   }
            
                   if($categoria == 'Soverte'){
            
                    echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Soverte.php'>
                    <script type=\"text/javascript\">
                        alert(\"Soverte editado com sucesso.\");
                    </script>
                    ";
                    unset($_SESSION['value_preco']);
                    unset($_SESSION['value_nome_Bl']);
                    unset($_SESSION['value_descricao_Bl']);
                    unset($_SESSION['value_categoria']);
            
                   }
                    
                    
                
            
            }else{
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Hamburguer.php'>
                <script type=\"text/javascript\">
                    alert(\"Hamburguer n??o editado.\");
                </script>
                ";
            }
        } else {
        // N??o foi poss??vel fazer o upload, provavelmente a pasta est?? incorreta
        echo "N??o foi poss??vel enviar o arquivo, tente novamente";
        }
    }

    }

}





?>