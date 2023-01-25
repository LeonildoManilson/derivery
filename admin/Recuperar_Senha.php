<?php
session_start();
ob_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="processo/Processo_Recuperar_Senha.php" method="post">
    <h4>INSERIR O EMAIL E A DICA REGISTRADO NO SISTEMA PARA RECUPERAR A SENHA</h4>
        <input type="text" name="email" id="" placeholder="email">
        <input type="text" name="dica" id="" placeholder="Digite a dica">
        <input type="submit" value="enviar">
    </form>
</body>
</html>