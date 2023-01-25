<?php
session_start();
spl_autoload_register(function($class_nome) 
{
    include '../../class/' . $class_nome . '.php';
});







/*$idDepo = new Class_Depoimento();
$idDep = filter_input(INPUT_GET, 'idDep', FILTER_SANITIZE_NUMBER_INT);
/**Delete Depoimento*/
//Verificar imagem antes de alterar
/*$resultado = $idDepo->find($idDep);


if(isset($idDep)){
    if (unlink("../imagem/$resultado->foto")) {
        if($idDepo->delete($idDep)){
            $_SESSION['msg'] = "<p style='color:green;'>Depoimento deletado com sucesso</p>";
            header("Location: http://localhost/fotografo/admin/Listar_Depoimento.php");
        
        
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Depoimento deletado não deletado</p>";
            header("Location: http://localhost/fotografo/admin/Listar_Depoimento.php");
        }

}
}*/

$idBlog = new Class_Produto();
$idBl = filter_input(INPUT_GET, 'idBl', FILTER_SANITIZE_NUMBER_INT);
/**Delete Depoimento*/
//Verificar imagem antes de alterar
$resultado = $idBlog->find($idBl);


if(isset($idBl)){
    if (unlink("../imagem/$resultado->foto")) {
        if($idBlog->delete($idBl)){
            $_SESSION['msg'] = "<p style='color:green;'>Produto deletado com sucesso</p>";
            header("Location: http://localhost/Programa%C3%A7ao%20Web/admin/inicio.php");
        
        
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Produto deletado não deletado</p>";
            header("Location: http://localhost/Programa%C3%A7ao%20Web/admin/inicio.php");
        }

}
} 


$idBanner = new Class_Banner();
$idBan = filter_input(INPUT_GET, 'idBan', FILTER_SANITIZE_NUMBER_INT);
/**Delete Depoimento*/
//Verificar imagem antes de alterar
$resultado = $idBanner->find($idBan);


if(isset($idBan)){
    if (unlink("../imagem/$resultado->foto")) {
        if($idBanner->delete($idBan)){
            $_SESSION['msg'] = "<p style='color:green;'>Banner deletado com sucesso</p>";
            header("Location: http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php");
        
        
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Banner deletado não deletado</p>";
            header("Location: http://localhost/Programa%C3%A7ao%20Web/admin/Registar-Banner.php");
        }

}
} 





$idFoto = new Class_Foto();
$idFot = filter_input(INPUT_GET, 'idFot', FILTER_SANITIZE_NUMBER_INT);
/**Delete Foto*/
//Verificar imagem antes de alterar
$resultado = $idFoto->find($idFot);


if(isset($idFot)){
   
    if (unlink("../imagem/$resultado->foto")) {
        if($idFoto->delete($idFot)){
            $_SESSION['msg'] = "<p style='color:green;'>Foto deletado com sucesso</p>";
            header("Location: http://localhost/fotografo/admin/Listar_Foto.php");
        
        
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Foto deletado não deletado</p>";
            header("Location: http://localhost/fotografo/admin/Listar_Foto.php");
        }

    }    

}






$idAdmin = new Class_Admin();
$idAd = filter_input(INPUT_GET, 'idAd', FILTER_SANITIZE_NUMBER_INT);
/**Delete Mensagem*/



if(isset($idAd)){
   
   
        if($idAdmin->delete($idAd)){
            $_SESSION['msg'] = "<p style='color:green;'>Mensagem deletado com sucesso</p>";
            header("Location: http://localhost/fotografo/admin/Registar-Admin.php");
        
        
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Mensagem deletado não deletado</p>";
            header("Location: http://localhost/fotografo/admin/Registar-Admin.php");
        }

      

}














?>