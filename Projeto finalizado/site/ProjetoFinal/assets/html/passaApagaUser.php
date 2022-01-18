<?php
    include 'conexao.php';
    $id = $_POST["idUser"];


    $getUser = mysqli_query($conexao,"SELECT * FROM usuario WHERE id_usuario='$id'");
    $array_tipo_user = mysqli_fetch_array($getUser);

    if($array_tipo_user['tipo_usuario'] == 1){
        $resultServ = "DELETE FROM servico where id_usuario = '$id'";
        $resultadoUsuario2 = mysqli_query($conexao, $resultServ);
    }else if($array_tipo_user['tipo_usuario'] == 2){
        $resultramo = "DELETE FROM ramo where id_usuario = '$id'";
        $resultadoUsuario3 = mysqli_query($conexao, $resultramo);
    }

    $resultUser = "DELETE FROM usuario where id_usuario = '$id'";
    $resultadoUsuario = mysqli_query($conexao, $resultUser);

    

    
    if($resultadoUsuario && $resultadoUsuario2 || $resultadoUsuario && $resultadoUsuario3){
        header("Location:../../../../site/login/logout.php");
    }else{
        header("Location: pgPerfil.php");
    }
?>