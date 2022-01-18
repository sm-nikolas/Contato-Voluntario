<?php
    session_start();
    //deleta as variáveis de sessão
    unset($_SESSION['normal']);
    unset($_SESSION['adm']);
    unset($_SESSION['secundario']);
    //finaliza a sessão
    session_destroy();
    sleep(2); //aguarda 2 segundos
    header("location:../index.php");
    setcookie('id', null, -1, '/');
?>