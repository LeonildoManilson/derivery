
        <?php
        
        spl_autoload_register(function($class_nome) 
        {
            include '../../class/' . $class_nome . '.php';
        });

$cat = new Class_Banner();
session_start();
if(empty($_POST['link'])){
    $_SESSION['vazio_link_Bl'] = "Campo link é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_link_Bl'] = $_POST['link'];
}

if(empty($_POST['nome'])){
    $_SESSION['vazio_nome_Bl'] = "Campo nome é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_nome_Bl'] = $_POST['nome'];
}



if(empty($_POST['posicao'])){
    $_SESSION['value_posicao'] = "campo posicao é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_posicao_Bl'] = $_POST['posicao'];
}
if(empty($_FILES['arquivo']['name'])){
    $_SESSION['vazio_arquivo_Bl'] = "campo foto é obrigatório";
    $url = 'http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php';
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
    ";
}else{
    $_SESSION['value_arquivo_Li'] = $_FILES['arquivo']['name'];
}
//htmlspecialchars(addslashes($_POST['nomeP']))
$link  = htmlspecialchars(addslashes($_POST['link']));
$posicao = addslashes($_POST['posicao']);
$nome = addslashes($_POST['nome']);








     
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
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php'>
        <script type=\"text/javascript\">
            alert(\"Por favor, envie arquivos com as seguintes extensões: jpg, png ou jpeg.\");
        </script>
        ";
}
 
// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {

echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php'>
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
    $cat->setLink($link);
    $cat->setPosicao($posicao);
    $cat->setFoto($nome_final);
    
    

    # Insert
    if($cat->insert()){


        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php'>
        <script type=\"text/javascript\">
            alert(\"Banner registado com sucesso.\");
        </script>
        ";
        unset($_SESSION['value_link']);
        unset($_SESSION['value_link_Bl']);
        unset($_SESSION['value_nome_Bl']);
        unset($_SESSION['value_posicao_Bl']);
        unset($_SESSION['value_posicao']);
   
      
    }else{
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php'>
        <script type=\"text/javascript\">
            alert(\"Banner não registado.\");
        </script>
        ";
    }
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}
 
}



         
         
      ?>
      
