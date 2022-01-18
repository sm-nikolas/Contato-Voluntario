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
                                    </div>
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