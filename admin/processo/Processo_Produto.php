
        <?php
        
        spl_autoload_register(function($class_nome) 
        {
            include '../../class/' . $class_nome . '.php';
        });

$cat = new Class_Produto();
session_start();
if(empty($_POST['nome'])){
    $_SESSION['vazio_nome_Bl'] = "Campo nome é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Produto.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_nome_Bl'] = $_POST['nome'];
}


if(empty($_POST['descricao'])){
    $_SESSION['vazio_descricao_Bl'] = "campo descricao é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Produto.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_descricao_Bl'] = $_POST['descricao'];
}


if(empty($_POST['preco'])){
    $_SESSION['value_preco'] = "campo preco é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Produto.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_preco_Bl'] = $_POST['preco'];
}

if(empty($_POST['categoria'])){
    $_SESSION['value_categoria'] = "campo categoria é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Produto.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_categoria_Bl'] = $_POST['categoria'];
}


if(empty($_POST['estado'])){
    $_SESSION['value_estado'] = "campo estado é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Produto.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_estado_Bl'] = $_POST['estado'];
}
if(empty($_FILES['arquivo']['name'])){
    $_SESSION['vazio_arquivo_Bl'] = "campo foto é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Hamburguer.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_arquivo_Li'] = $_FILES['arquivo']['name'];
}
//htmlspecialchars(addslashes($_POST['nomeP']))
$nome  = htmlspecialchars(addslashes($_POST['nome']));
$descricao = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", addslashes($_POST['descricao']));
$preco = addslashes($_POST['preco']);
$categoria = addslashes($_POST['categoria']);
$estado = addslashes($_POST['estado']);


$nome1 = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nome)));




     
$_UP['pasta'] = '../imagem/';
 
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
 
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'PNG');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}
 
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
// Faz a verificação da extensão do arquivo
$file_extension = explode('.', $_FILES['arquivo']['name']);
$extensao = end($file_extension);


if (array_search($extensao, $_UP['extensoes']) === false) {

echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Hamburguer.php'>
        <script type=\"text/javascript\">
            alert(\"Por favor, envie arquivos com as seguintes extensões: jpg, png ou jpeg.\");
        </script>
        ";
}
 
// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {

echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Hamburguer.php'>
        <script type=\"text/javascript\">
            alert(\"O arquivo enviado é muito grande, envie arquivos de até 2Mb.\");
        </script>
        ";
}
 
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
$nome_final = time().'.jpg';
} else {
// Mantém o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];

}
 
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
    $cat->setNome($nome);
    $cat->setpreco($preco);
    $cat->setDescricao($descricao);
    $cat->setFoto($nome_final);
    $cat->setCategoria($categoria);
    $cat->setEstado($estado);

    # Insert
    if($cat->insert()){

       if($categoria == 'Hamburguer'){

        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Listar_Hamburguer.php'>
        <script type=\"text/javascript\">
            alert(\"Hamburguer registado com sucesso.\");
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
            alert(\"Pizza registado com sucesso.\");
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
            alert(\"Bolo registado com sucesso.\");
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
            alert(\"Soverte registado com sucesso.\");
        </script>
        ";
        unset($_SESSION['value_preco']);
        unset($_SESSION['value_nome_Bl']);
        unset($_SESSION['value_descricao_Bl']);
        unset($_SESSION['value_categoria']);

       }
        
        
      
    }else{
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Hamburguer.php'>
        <script type=\"text/javascript\">
            alert(\"Produto não registado.\");
        </script>
        ";
    }
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}
 
}



         
         
      ?>
      
