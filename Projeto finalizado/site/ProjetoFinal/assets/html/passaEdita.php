<?php
    include 'conexao.php';

    if(isset($_POST["email"]) && isset($_POST["telefone1"])){
        $email        = $_POST["email"];
        $complemento  = $_POST["complemento"];
        $cep          = $_POST["cep"];
        $num_resid    = $_POST["numeroResi"];
        $imagem       = $_FILES["imagem"];
        $dir          = "../../../login/imgCarregadas/"; 
        $servico      = @$_POST["servico"];
        $ramo         = @$_POST["ramo"];
        $telefone1    = $_POST["telefone1"];
        $telefone2    = $_POST["telefone2"];
        $id           = $_COOKIE["id"];

        $getUser = mysqli_query($conexao,"SELECT * FROM usuario WHERE id_usuario='$id'");
        $array_tipo_user = mysqli_fetch_array($getUser);


        if($array_tipo_user["tipo_usuario"] == 1){
            if($telefone2==""){
                if($imagem["name"]==""){
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='', cep='$cep', num_resid='$num_resid' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE servico SET servico='$servico' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                
                    }else{
                        header("Location:pgPerfil.php");
                        exit;
                    }
                }else{
                    move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                    $caminho_img = $imagem["name"];
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='', cep='$cep', num_resid='$num_resid', imagem='$caminho_img' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE servico SET servico='$servico' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                
                    }else{
                        header("Location:pgPerfil.php");
                        exit;
                    }
                }
            }else{
                if($imagem["name"]==""){
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='$telefone2', cep='$cep', num_resid='$num_resid' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE servico SET servico='$servico' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                
                    }else{
                        header("Location:pgPerfil.php");
                        exit;
                    }
                }else{
                    move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                    $caminho_img = $imagem["name"];
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='$telefone2', cep='$cep', num_resid='$num_resid', imagem='$caminho_img' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE servico SET servico='$servico' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                    }else{
                        header("Location:pgPerfil.php");
                        exit; 
                    }
                }
            }


        }else if($array_tipo_user["tipo_usuario"]  == 2){
            if($telefone2==""){
                if($imagem["name"]==""){
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='', cep='$cep', num_resid='$num_resid' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE ramo SET ramo='$ramo' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                
                    }else{
                        header("Location:pgPerfil.php");
                        exit;
                    }
                }else{
                    move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                    $caminho_img = $imagem["name"];
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='', cep='$cep', num_resid='$num_resid', imagem='$caminho_img' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE ramo SET ramo='$ramo' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                
                    }else{
                        header("Location:pgPerfil.php");
                        exit;
                    }
                }
            }else{
                if($imagem["name"]==""){
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='$telefone2', cep='$cep', num_resid='$num_resid' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE ramo SET ramo='$ramo' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                
                    }else{
                        header("Location:pgPerfil.php");
                        exit;
                    }
                }else{
                    move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                    $caminho_img = $imagem["name"];
                    $editaUser = mysqli_query($conexao, "UPDATE usuario SET email='$email', complemento='$complemento', telefone1='$telefone1', telefone2='$telefone2', cep='$cep', num_resid='$num_resid', imagem='$caminho_img' WHERE id_usuario='$id'");
                    $editaServ = mysqli_query($conexao, "UPDATE ramo SET ramo='$ramo' WHERE id_usuario='$id'");
                    if(mysqli_affected_rows($conexao)){
                        header("Location:pgPerfil.php");
                        exit;
                    }else{
                        header("Location:pgPerfil.php");
                        exit; 
                    }
                }
            }
        }
    }
?>