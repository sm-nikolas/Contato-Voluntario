<?php
    $bdServidor = 'localhost';
    $bdUsuario  = 'root';
    $bdPassword = '';
    $dbBanco    = 'contato';
    $conexao = mysqli_connect($bdServidor,$bdUsuario,$bdPassword,$dbBanco)
               or die('Não foi possivel conectar');
?>