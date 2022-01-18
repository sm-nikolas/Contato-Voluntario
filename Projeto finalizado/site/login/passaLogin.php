<?php
    include 'conexao.php';
    session_start();

    $senhaC   = @$_POST["senha"];
    $senha    = md5($senhaC);
    $message  = "E-mail ou senha inválidos!";
    $email    = @$_POST["email"];
    if($senhaC=="admconecte123" && $email=="admconecte@gmail.com"){
        $_SESSION["adm"]     = true;
        header("Location:../index.php");
    }
    if(count($_POST)>0) {
        $sql     = "SELECT * FROM usuario WHERE email='{$email}' AND senha='{$senha}'";
        $result  = mysqli_query($conexao,$sql);
        $row     = mysqli_fetch_array($result);
        if (is_array($row)) {
            if($row["tipo_usuario"]==1) {
                $_SESSION["email"]          = $row['email'];
                $_SESSION["senha"]          = $row['senha'];
                $_SESSION["tipo_usuario"]   = $row['tipo_usuario'];
                $_SESSION["normal"]         = true;
                setcookie("id",$row["id_usuario"], time()+86400, '/');
                header("Location:../index.php");
            }else if($row["tipo_usuario"]==2){
                setcookie("id",$row["id_usuario"], time()+86400, '/');
                $_SESSION["secundario"]     = true;
                header("Location:../index.php");
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>Contato Voluntário - Login</title>
            <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
            <link type="text/css" rel="stylesheet" href="css/styleLogin.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        </head>
        <body id="fundo">
            <div id="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form h-auto">
                        <div id=form>
                            <h2 class="display-3" id="bv">Bem-Vindo</h2>
                            <br><br>
                            <img src="img/logo.png">

                            <br><div class="dados">
                                <form name="frmUser" method="POST" action="passaLogin.php">
                                    <div>
                                        <input type="text" name="email" class="linha" required="">
                                        <label>E-mail</label>	
                                    </div>
                                    
                                    <div>
                                        <input type="password" name="senha" class="linha" required="">
                                        <label>Senha</label>
                                        <p class="message" style="color: red"><?php if($message!="") { echo $message; } ?></p>
                                    </div>
                                    <?php
                                        //isset = se a variável msg é diferente de NULL
                                        if(isset($_SESSION['msg2'])){
                                            //mostra na tela
                                            echo $_SESSION['msg2'];
                                            //unset = destrói a variável msg.
                                            unset($_SESSION['msg2']);
                                        }
                                    ?>
                                    <div>
                                        <input id="botao" type="submit" class="btn btn-light" value="Login"/>
                                    <div>
                                        <blockquote class="text-center">
                                            <p>Não tem acesso? <a href="cadastro.php">Cadastra-se</a></p>
                                        </blockquote>
                                    </div>    
                                </form>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>        
        </body>
    </html>
   