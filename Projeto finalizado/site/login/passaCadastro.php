<?php
    include 'conexao.php';
    $escolha      = $_POST["rb"];
    $nome         = $_POST["nome"];
    $email        = $_POST["email"];
    $senhaPri     = $_POST["senha"];
    $confSenha    = $_POST["cSenha"];
    $cpf          = $_POST["cpf"];
    $complemento  = $_POST["complemento"];
    $cep          = $_POST["cep"];
    $numeroResi   = $_POST["numeroResi"];
    $imagem       = $_FILES['imagem'];
    $dir          = "imgCarregadas/"; 
    $servico      = $_POST["servico"];
    $ramo         = $_POST["ramo"];
    $rb           = $_POST["rb"];
    $tipo         = 1;

    $messageSenha = "As senhas não conferem. Por favor, tente novamente.";
    $messageDados = "Nem todos os dados foram preenchidos!";
    $messageEmail = "Este e-mail já foi cadastrado";


    $senha        = md5($senhaPri);
    $cSenha       = md5($confSenha);
    
    $telefone1 = "1";

    $consultaEmail = mysqli_query($conexao,"SELECT email FROM usuario WHERE email='$email'");
   
    if(mysqli_num_rows($consultaEmail) == 1){
?>
        <!DOCTYPE html>
            <html lang="pt-br">
                <head>
                    <meta charset="UTF-8">
                    <title>Contato Voluntário - Cadastro</title>
                    <link rel="shortcut icon" href="../assets/img/icone.png">  
                    <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                    <script src="js/selecao.js"></script>
                    <script src="js/cadastro.js"></script>
                    
                    <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                    
                    <script type="text/javascript">

                        var contTelefone = 1;

                        function id(sId){
                            return document.getElementById(sId);
                        } 

                        $(document).ready(function(){
                        
                            var counter = 2;

                        
                            $("#addButton").click(function () {

                                if(counter>3){
                                    id("informaTel").innerHTML = ("Cadastre apenas 2 campos de telefone");
                                    return false;
                                }
                        
                                var newTextBoxDiv = $(document.createElement('div'))
                                .attr("id", 'TextBoxDiv' + counter);
                                newTextBoxDiv.attr("class", 'col-xs-3 col-sm-6 col-md-6 col-lg-6');

                                var input = $(document.createElement('input'))
                                .attr("onkeypress", '$(this).mask("(99) 9 9999-9999");');
                                input.attr("type", 'text');
                                input.attr("id", 'telefone' + contTelefone);
                                input.attr("class", 'cad tel');
                                input.attr("name", 'telefone' + contTelefone);
                                input.attr("required", "required");
                                input.attr("maxlength", '15');
                                
                                
                                newTextBoxDiv.after().html(input);
                                contTelefone++;

                                newTextBoxDiv.appendTo("#TextBoxesGroup");
                            
                            
                                counter++;


                                
                                var numTel = $('.tel').length;
                                var arrayTel = [numTel];

                                if(arrayTel>1){
                                    id("removeButton").disabled = false;
                                }
                                
                            
                            });

                            
                            $("#removeButton").click(function () {
                                if(counter==3){
                                    id("informaTel").innerHTML = ("É necessário pelo menos 1 telefone para contato");
                                    id("removeButton").value=("");
                                    id("removeButton").disabled = true;
                                    return false;
                                }   
                            
                                counter--;
                            
                                $("#TextBoxDiv" + counter).remove();
                                contTelefone--;
                            
                            });

                            
                        });

                    
                        $( document ).ready(function() {
                            $(".og").hide();
                            $("#rb1").click(function(){
                            if ($(this).prop('checked')){
                                $(".vl").show();
                                $(".og").hide();
                                document.getElementById("cpfCliente").setAttribute("required", "required");    
                            } else {
                                $(".og").show();
                                $(".vl").hide();
                                document.getElementById("cpfCliente").removeAttribute("required");      
                            }
                            });
                            $("#rb2").click(function(){
                                if($(this).prop('checked')){
                                    $(".og").show();
                                    $(".vl").hide();  
                                    document.getElementById("cpfCliente").removeAttribute("required");  
                                }else{
                                    $(".vl").show();
                                    $(".og").hide(); 
                                    document.getElementById("cpfCliente").setAttribute("required", "required");
                                }
                            });
                        });
                    </script>
                
                </head>
                <body id="fundo">
                    <div id="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                <div id="form">
                                    <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>

                                    <br><br><br><br>
                                    
                                    <div class="dados">                                
                                        <form id="formulario1" method="POST" action="passaCadastro.php" enctype="multipart/form-data">  
                                            <div class="row">
                                                <label class="label">Selecione uma foto de perfil</label>

                                                <br><br>

                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                    <div class="custom-file">
                                                        <input type="file" accept=".jpg" class="custom-file-input" id="imagem" name="imagem" required>
                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Foto de perfil</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <br><br>

                                            <div class="selectBtn">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="rb" id="rb1" class="form-check-input" value="1" checked>
                                                    <label class="form-check-label label2" for="rb1">Voluntário</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="rb" id="rb2" class="form-check-input" value="2">
                                                    <label class="form-check-label label2" for="rb2">ONG</label>
                                                </div>
                                            </div>
                                                
                                            
                                            <br><br>
                                        
                                            <div>
                                                <input type="text" id="nome" class="cad" name="nome" onkeypress="return somente_letras(this);" required>
                                                <label class="label1">Nome</label>
                                            </div>
                                            <br class="og"><br class="og">
                                            <div class="vl">
                                                <input type="text" class="cad input" onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpf" onblur="isValidCPF(this.value);" required>
                                                <label class="label1">CPF</label>
                                                <p id="informaCPF" class="informa"></p>
                                            </div> 
                                            <br class="vl"><br class="vl">
                                            
                                                <div>
                                                    <input type="text" name="cep" id="cep" value=""  class="cad" onkeypress="$(this).mask('99999-999');"  class="input" onblur="pesquisacep(this.value);" required>
                                                    <label class="label1">CEP</label>
                                                    <p id="informaCEP" class="informa"></p>
                                                </div>
                                            <div class="row">    
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                    <input id="rua" type="text" class="cad" name="rua" required>
                                                    <label class="cep label1">Endereço</label>
                                                </div>    
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                    <input id="numeroResi" class="cad" name="numeroResi" type="number" required>
                                                    <label class="cep label1">Número</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                    <input id="bairro" class="cad" type="text" required/>       
                                                    <label class="cep label1">Bairro</label>
                                                </div>
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                    <input id="cidade" class="cad" type="text" required/>
                                                    <label class="cep label1">Cidade</label>
                                                </div>   
                                                <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
                                                    <input id="complemento" class="cad" name="complemento" type="text"/>
                                                    <p class="cep2 label3">Complemento</p>
                                                    
                                                </div> 
                                            </div>
                                            

                                        


                                            <br><br>

                                            <div class="row" id='TextBoxesGroup'>
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" id="TextBoxDiv1">  
                                                    <input type="hidden" name="contTelefone" id="contTelefone" value="">
                                                    <input type="text" class="cad tel" maxlength="15" id="telefone0" name="telefone0"  onkeypress='return somenteNumeros();' disabled>
                                                    <label class="cep label1">Telefone</label>
                                                </div>
                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-4 btns">
                                                    <button type="button" class="btn btn-light" id="addButton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                                        </svg>    
                                                    </button>
                                                    <button type="button" class="btn btn-light" type='button' id='removeButton' disabled>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <p id="informaTel" class="informa"></p>

                                            <br><br>

                                            <div class="row og">
                                                <label class="label">Anexe os documentos abaixo</label>
                                                <br class="og"><br class="og">

                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                    <div class="custom-file">
                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile01">Certificado de Utilidade Pública Federal</label>
                                                    </div>
                                                </div>
                                                <br class="og"><br class="og">
                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                    <div class="custom-file">
                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile02">
                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Certificado de Utilidade Pública Estadual</label>
                                                    </div>
                                                </div>
                                                <br class="og"><br class="og">
                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                    <div class="custom-file">
                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile03">
                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile03">Certificado de Utilidade Pública Municipal</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br class="og"><br class="og">

                                            <div id="servicos" class="vl">
                                                <select class="custom-select" id="inputGroupSelect01" name="servico">
                                                    <option selected value="0" >Escolha um serviço...</option>
                                                    <option> Animador</option>
                                                    <option> Arquiteto</option>
                                                    <option>Artista plástico</option>
                                                    <option> Biblioteconomista</option>
                                                    <option> Cozinheiro</option>
                                                    <option> Cientista da computação</option>
                                                    <option> Cooperativista</option>
                                                    <option> Cuidador</option>
                                                    <option> Dentista</option>
                                                    <option>Diarista</option>
                                                    <option>Doador</option>
                                                    <option>Educador</option>
                                                    <option>Educomunicador</option>
                                                    <option>Eletricista</option>
                                                    <option>Enfermeiro</option>
                                                    <option>Fotógrafo</option>
                                                    <option>Fisioterapeuta</option>
                                                    <option>Gestor</option>
                                                    <option>Jardineiro</option>
                                                    <option>Marqueteiro</option>
                                                    <option>Músico</option>
                                                    <option>Nutricionista</option>
                                                    <option>Pedagogo</option>
                                                    <option>Pedreiro Geral</option>
                                                    <option>Pedreiro Azuleijista</option>
                                                    <option>Pedreiro de Acabamento</option>
                                                    <option>Pedreiro de Alvenaria</option>
                                                    <option>Pedreiro de OAC</option>
                                                    <option>Pedreiro de Manutenção Geral</option>
                                                    <option>Pintor</option>
                                                    <option>Profissional em Educação Física</option>
                                                    <option>Psicólogo</option>
                                                    <option>Psiquiatra</option>
                                                </select>
                                            </div>
                                            <div id="servicos" class="og">
                                                <select class="custom-select" id="inputGroupSelect02"  name="ramo">
                                                    <option selected value="0" >Serviço necessário...</option>
                                                    <option>Animador</option>
                                                    <option>Arquiteto</option>
                                                    <option>Artista plástico</option>
                                                    <option>Biblioteconomista</option>
                                                    <option>Cozinheiro</option>
                                                    <option>Cientista da computação</option>
                                                    <option>Cooperativista</option>
                                                    <option>Cuidador</option>
                                                    <option>Dentista</option>
                                                    <option>Diarista</option>
                                                    <option>Doador</option>
                                                    <option>Educador</option>
                                                    <option>Educomunicador</option>
                                                    <option>Eletricista</option>
                                                    <option>Enfermeiro</option>
                                                    <option>Fotógrafo</option>
                                                    <option>Fisioterapeuta</option>
                                                    <option>Gestor</option>
                                                    <option>Jardineiro</option>
                                                    <option>Marqueteiro</option>
                                                    <option>Músico</option>
                                                    <option>Nutricionista</option>
                                                    <option>Pedagogo</option>
                                                    <option>Pedreiro Geral</option>
                                                    <option>Pedreiro Azuleijista</option>
                                                    <option>Pedreiro de Acabamento</option>
                                                    <option>Pedreiro de Alvenaria</option>
                                                    <option>Pedreiro de OAC</option>
                                                    <option>Pedreiro de Manutenção Geral</option>
                                                    <option>Pintor</option>
                                                    <option>Profissional em Educação Física</option>
                                                    <option>Psicólogo</option>
                                                    <option>Psiquiatra</option>
                                                </select>
                                            </div>

                                            <br class="og"><br class="og">

                                            <br><br>

                                            <div>
                                                <input type="text" class="cad" name="email" id="email" onkeypress="return formata_email()" onblur="emailMask()" required>
                                                <label class="label1 email">E-mail</label>
                                                <p id="informaEmail" class="informa"></p>
                                            </div>
                                            
                                            <div>
                                                <input type="password" id="senha1" class="cad" name="senha" required>
                                                <label class="label1">Senha</label>
                                            </div>
                                            <div>    
                                                <input type="password" id="cSenha1" class="cad" name="cSenha" required>
                                                <label class="label1">confirme sua senha</label>
                                                <p class="message" style="color: red">
                                                <?php 
                                                    if(mysqli_num_rows($consultaEmail) == 1){
                                                        if($messageEmail!="") { echo $messageEmail; }
                                                    }else{
                                                        if($messagecpf!="") { echo $messagecpf; }
                                                    }
                                                     
                                                
                                                ?></p>
                                            </div>
                                            <div>
                                                <br><br>
                                                <input type="submit" class="btn btn-light" class="cad" value="Cadastrar-se" id="cadastrar1" name="cadastrar">
                                            </div>        
                                        </form>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </body>
            </html>
<?php
    }else{
        if($rb==1){
            if(isset($_POST["telefone1"])){
                $telefone1 = $_POST["telefone1"];
                if(!empty($email) && !empty($senha) && !empty($cSenha) && !empty($imagem) && !empty($telefone1) && $servico != "0"){
                    if($senha == $cSenha){
                        $telefone2 = $_POST["telefone2"];
                        if($telefone2==""){
                            move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                            $sql = "INSERT INTO usuario(nome_usuario, email, senha, cpf, num_resid, complemento, tipo_usuario, cep, telefone1, imagem) VALUES (?,?,?,?,?,?,?,?,?,?)";
                            $stmt = $conexao->prepare($sql);
                            $stmt->bind_param("ssssisisss",$nome,$email,$senha,$cpf,$numeroResi,$complemento,$tipo,$cep,$telefone1,$imagem["name"]);
                            if(!$stmt->execute()){
                                $erro = $stmt->error;
                                echo $erro;
                            }else{
                                $codDele = "SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT 1";
                                $result = mysqli_query($conexao,$codDele);
                                $array =  mysqli_fetch_array($result, MYSQLI_ASSOC);

                                $sqlTel = "INSERT INTO servico(servico, id_usuario) VALUES (?,?)";
                                $stmtTel = $conexao->prepare($sqlTel);
                                $stmtTel->bind_param("si",$servico,$array['id_usuario']);
                                if(!$stmtTel->execute()){
                                    $erro = $stmtTel->error;
                                    echo $erro;
                                }    
                                header("Location:../login/login.php");
                                exit;
                            }
                        }else{
                            move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                            $sql = "INSERT INTO usuario(nome_usuario, email, senha, cpf, num_resid, complemento, tipo_usuario, cep, telefone1, telefone2, imagem) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                            $stmt = $conexao->prepare($sql);
                            $stmt->bind_param("ssssisissss",$nome,$email,$senha,$cpf,$numeroResi,$complemento,$tipo,$cep,$telefone1,$telefone2,$imagem["name"]);
                            if(!$stmt->execute()){
                                $erro = $stmt->error;
                                echo $erro;
                            }else{
                                $codDele = "SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT 1";
                                $result = mysqli_query($conexao,$codDele);
                                $array =  mysqli_fetch_array($result, MYSQLI_ASSOC);

                                $sqlTel = "INSERT INTO servico(servico, id_usuario) VALUES (?,?)";
                                $stmtTel = $conexao->prepare($sqlTel);
                                $stmtTel->bind_param("si",$servico,$array['id_usuario']);
                                if(!$stmtTel->execute()){
                                    $erro = $stmtTel->error;
                                    echo $erro;
                                }    
                                header("Location:../login/login.php");
                                exit;
                            }
                        } 
                    }else{
                        $telefone2 = "";
?>
                        <!DOCTYPE html>
                            <html lang="pt-br">
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Contato Voluntário - Cadastro</title>
                                    <link rel="shortcut icon" href="../assets/img/icone.png">  
                                    <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                                    <script src="js/selecao.js"></script>
                                    <script src="js/cadastro.js"></script>
                                    
                                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                    <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                                    
                                    <script type="text/javascript">

                                        var contTelefone = 1;

                                        function id(sId){
                                            return document.getElementById(sId);
                                        } 

                                        $(document).ready(function(){
                                        
                                            var counter = 2;

                                        
                                            $("#addButton").click(function () {

                                                if(counter>3){
                                                    id("informaTel").innerHTML = ("Cadastre apenas 2 campos de telefone");
                                                    return false;
                                                }
                                        
                                                var newTextBoxDiv = $(document.createElement('div'))
                                                .attr("id", 'TextBoxDiv' + counter);
                                                newTextBoxDiv.attr("class", 'col-xs-3 col-sm-6 col-md-6 col-lg-6');

                                                var input = $(document.createElement('input'))
                                                .attr("onkeypress", '$(this).mask("(99) 9 9999-9999");');
                                                input.attr("type", 'text');
                                                input.attr("id", 'telefone' + contTelefone);
                                                input.attr("class", 'cad tel');
                                                input.attr("name", 'telefone' + contTelefone);
                                                input.attr("required", "required");
                                                input.attr("maxlength", '15');
                                                
                                                
                                                newTextBoxDiv.after().html(input);
                                                contTelefone++;

                                                newTextBoxDiv.appendTo("#TextBoxesGroup");
                                            
                                            
                                                counter++;


                                                
                                                var numTel = $('.tel').length;
                                                var arrayTel = [numTel];

                                                if(arrayTel>1){
                                                    id("removeButton").disabled = false;
                                                }
                                                
                                            
                                            });

                                            
                                            $("#removeButton").click(function () {
                                                if(counter==3){
                                                    id("informaTel").innerHTML = ("É necessário pelo menos 1 telefone para contato");
                                                    id("removeButton").value=("");
                                                    id("removeButton").disabled = true;
                                                    return false;
                                                }   
                                            
                                                counter--;
                                            
                                                $("#TextBoxDiv" + counter).remove();
                                                contTelefone--;
                                            
                                            });

                                            
                                        });

                                    
                                        $( document ).ready(function() {
                                            $(".og").hide();
                                            $("#rb1").click(function(){
                                            if ($(this).prop('checked')){
                                                $(".vl").show();
                                                $(".og").hide();
                                                document.getElementById("cpfCliente").setAttribute("required", "required");    
                                            } else {
                                                $(".og").show();
                                                $(".vl").hide();
                                                document.getElementById("cpfCliente").removeAttribute("required");      
                                            }
                                            });
                                            $("#rb2").click(function(){
                                                if($(this).prop('checked')){
                                                    $(".og").show();
                                                    $(".vl").hide();  
                                                    document.getElementById("cpfCliente").removeAttribute("required");  
                                                }else{
                                                    $(".vl").show();
                                                    $(".og").hide(); 
                                                    document.getElementById("cpfCliente").setAttribute("required", "required");
                                                }
                                            });
                                        });
                                    </script>
                                
                                </head>
                                <body id="fundo">
                                    <div id="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                                <div id="form">
                                                    <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>

                                                    <br><br><br><br>
                                                    
                                                    <div class="dados">                                
                                                        <form id="formulario1" method="POST" action="passaCadastro.php" enctype="multipart/form-data">  
                                                            <div class="row">
                                                                <label class="label">Selecione uma foto de perfil</label>

                                                                <br><br>

                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".jpg" class="custom-file-input" id="imagem" name="imagem" required>
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Foto de perfil</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br><br>

                                                            <div class="selectBtn">
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" name="rb" id="rb1" class="form-check-input" value="1" checked>
                                                                    <label class="form-check-label label2" for="rb1">Voluntário</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" name="rb" id="rb2" class="form-check-input" value="2">
                                                                    <label class="form-check-label label2" for="rb2">ONG</label>
                                                                </div>
                                                            </div>
                                                                
                                                            
                                                            <br><br>
                                                        
                                                            <div>
                                                                <input type="text" id="nome" class="cad" name="nome" onkeypress="return somente_letras(this);" required>
                                                                <label class="label1">Nome</label>
                                                            </div>
                                                            <br class="og"><br class="og">
                                                            <div class="vl">
                                                                <input type="text" class="cad input" onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpf" onblur="isValidCPF(this.value);" required>
                                                                <label class="label1">CPF</label>
                                                                <p id="informaCPF" class="informa"></p>
                                                            </div> 
                                                            <br class="vl"><br class="vl">
                                                            
                                                                <div>
                                                                    <input type="text" name="cep" id="cep" value=""  class="cad" onkeypress="$(this).mask('99999-999');"  class="input" onblur="pesquisacep(this.value);" required>
                                                                    <label class="label1">CEP</label>
                                                                    <p id="informaCEP" class="informa"></p>
                                                                </div>
                                                            <div class="row">    
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                    <input id="rua" type="text" class="cad" name="rua" required>
                                                                    <label class="cep label1">Endereço</label>
                                                                </div>    
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                    <input id="numeroResi" class="cad" name="numeroResi" type="number" required>
                                                                    <label class="cep label1">Número</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                                    <input id="bairro" class="cad" type="text" required/>       
                                                                    <label class="cep label1">Bairro</label>
                                                                </div>
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                    <input id="cidade" class="cad" type="text" required/>
                                                                    <label class="cep label1">Cidade</label>
                                                                </div>   
                                                                <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
                                                                    <input id="complemento" class="cad" name="complemento" type="text"/>
                                                                    <p class="cep2 label3">Complemento</p>
                                                                    
                                                                </div> 
                                                            </div>
                                                            

                                                        


                                                            <br><br>

                                                            <div class="row" id='TextBoxesGroup'>
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" id="TextBoxDiv1">  
                                                                    <input type="hidden" name="contTelefone" id="contTelefone" value="">
                                                                    <input type="text" class="cad tel" maxlength="15" id="telefone0" name="telefone0"  onkeypress='return somenteNumeros();' disabled>
                                                                    <label class="cep label1">Telefone</label>
                                                                </div>
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-4 btns">
                                                                    <button type="button" class="btn btn-light" id="addButton">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                                                        </svg>    
                                                                    </button>
                                                                    <button type="button" class="btn btn-light" type='button' id='removeButton' disabled>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p id="informaTel" class="informa"></p>

                                                            <br><br>

                                                            <div class="row og">
                                                                <label class="label">Anexe os documentos abaixo</label>
                                                                <br class="og"><br class="og">

                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile01">
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile01">Certificado de Utilidade Pública Federal</label>
                                                                    </div>
                                                                </div>
                                                                <br class="og"><br class="og">
                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile02">
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Certificado de Utilidade Pública Estadual</label>
                                                                    </div>
                                                                </div>
                                                                <br class="og"><br class="og">
                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile03">
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile03">Certificado de Utilidade Pública Municipal</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br class="og"><br class="og">

                                                            <div id="servicos" class="vl">
                                                                <select class="custom-select" id="inputGroupSelect01" name="servico">
                                                                    <option selected value="0" >Escolha um serviço...</option>
                                                                    <option> Animador</option>
                                                                    <option> Arquiteto</option>
                                                                    <option>Artista plástico</option>
                                                                    <option> Biblioteconomista</option>
                                                                    <option> Cozinheiro</option>
                                                                    <option> Cientista da computação</option>
                                                                    <option> Cooperativista</option>
                                                                    <option> Cuidador</option>
                                                                    <option> Dentista</option>
                                                                    <option>Diarista</option>
                                                                    <option>Doador</option>
                                                                    <option>Educador</option>
                                                                    <option>Educomunicador</option>
                                                                    <option>Eletricista</option>
                                                                    <option>Enfermeiro</option>
                                                                    <option>Fotógrafo</option>
                                                                    <option>Fisioterapeuta</option>
                                                                    <option>Gestor</option>
                                                                    <option>Jardineiro</option>
                                                                    <option>Marqueteiro</option>
                                                                    <option>Músico</option>
                                                                    <option>Nutricionista</option>
                                                                    <option>Pedagogo</option>
                                                                    <option>Pedreiro Geral</option>
                                                                    <option>Pedreiro Azuleijista</option>
                                                                    <option>Pedreiro de Acabamento</option>
                                                                    <option>Pedreiro de Alvenaria</option>
                                                                    <option>Pedreiro de OAC</option>
                                                                    <option>Pedreiro de Manutenção Geral</option>
                                                                    <option>Pintor</option>
                                                                    <option>Profissional em Educação Física</option>
                                                                    <option>Psicólogo</option>
                                                                    <option>Psiquiatra</option>
                                                                </select>
                                                            </div>
                                                            <div id="servicos" class="og">
                                                                <select class="custom-select" id="inputGroupSelect02"  name="ramo">
                                                                    <option selected value="0" >Serviço necessário...</option>
                                                                    <option>Animador</option>
                                                                    <option>Arquiteto</option>
                                                                    <option>Artista plástico</option>
                                                                    <option>Biblioteconomista</option>
                                                                    <option>Cozinheiro</option>
                                                                    <option>Cientista da computação</option>
                                                                    <option>Cooperativista</option>
                                                                    <option>Cuidador</option>
                                                                    <option>Dentista</option>
                                                                    <option>Diarista</option>
                                                                    <option>Doador</option>
                                                                    <option>Educador</option>
                                                                    <option>Educomunicador</option>
                                                                    <option>Eletricista</option>
                                                                    <option>Enfermeiro</option>
                                                                    <option>Fotógrafo</option>
                                                                    <option>Fisioterapeuta</option>
                                                                    <option>Gestor</option>
                                                                    <option>Jardineiro</option>
                                                                    <option>Marqueteiro</option>
                                                                    <option>Músico</option>
                                                                    <option>Nutricionista</option>
                                                                    <option>Pedagogo</option>
                                                                    <option>Pedreiro Geral</option>
                                                                    <option>Pedreiro Azuleijista</option>
                                                                    <option>Pedreiro de Acabamento</option>
                                                                    <option>Pedreiro de Alvenaria</option>
                                                                    <option>Pedreiro de OAC</option>
                                                                    <option>Pedreiro de Manutenção Geral</option>
                                                                    <option>Pintor</option>
                                                                    <option>Profissional em Educação Física</option>
                                                                    <option>Psicólogo</option>
                                                                    <option>Psiquiatra</option>
                                                                </select>
                                                            </div>

                                                            <br class="og"><br class="og">

                                                            <br><br>

                                                            <div>
                                                                <input type="text" class="cad" name="email" id="email" onkeypress="return formata_email()" onblur="emailMask()" required>
                                                                <label class="label1 email">E-mail</label>
                                                                <p id="informaEmail" class="informa"></p>
                                                            </div>
                                                            
                                                            <div>
                                                                <input type="password" id="senha1" class="cad" name="senha" required>
                                                                <label class="label1">Senha</label>
                                                            </div>
                                                            <div>    
                                                                <input type="password" id="cSenha1" class="cad" name="cSenha" required>
                                                                <label class="label1">confirme sua senha</label>
                                                                <p class="message" style="color: red"><?php if($messageSenha!="") { echo $messageSenha; } ?></p>
                                                            </div>
                                                            <div>
                                                                <br><br>
                                                                <input type="submit" class="btn btn-light" class="cad" value="Cadastrar-se" id="cadastrar1" name="cadastrar">
                                                            </div>        
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </body>
                            </html>
<?php
                    }
                }else{
                    $telefone2 = "";
?>
                    <!DOCTYPE html>
                        <html lang="pt-br">
                            <head>
                                <meta charset="UTF-8">
                                <title>Contato Voluntário - Cadastro</title>
                                <link rel="shortcut icon" href="../assets/img/icone.png">  
                                <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                                <script src="js/selecao.js"></script>
                                <script src="js/cadastro.js"></script>
                                
                                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                                
                                <script type="text/javascript">

                                    var contTelefone = 1;

                                    function id(sId){
                                        return document.getElementById(sId);
                                    } 

                                    $(document).ready(function(){
                                    
                                        var counter = 2;

                                    
                                        $("#addButton").click(function () {

                                            if(counter>3){
                                                id("informaTel").innerHTML = ("Cadastre apenas 2 campos de telefone");
                                                return false;
                                            }
                                    
                                            var newTextBoxDiv = $(document.createElement('div'))
                                            .attr("id", 'TextBoxDiv' + counter);
                                            newTextBoxDiv.attr("class", 'col-xs-3 col-sm-6 col-md-6 col-lg-6');

                                            var input = $(document.createElement('input'))
                                            .attr("onkeypress", '$(this).mask("(99) 9 9999-9999");');
                                            input.attr("type", 'text');
                                            input.attr("id", 'telefone' + contTelefone);
                                            input.attr("class", 'cad tel');
                                            input.attr("name", 'telefone' + contTelefone);
                                            input.attr("required", "required");
                                            input.attr("maxlength", '15');
                                            
                                            
                                            newTextBoxDiv.after().html(input);
                                            contTelefone++;

                                            newTextBoxDiv.appendTo("#TextBoxesGroup");
                                        
                                        
                                            counter++;


                                            
                                            var numTel = $('.tel').length;
                                            var arrayTel = [numTel];

                                            if(arrayTel>1){
                                                id("removeButton").disabled = false;
                                            }
                                            
                                        
                                        });

                                        
                                        $("#removeButton").click(function () {
                                            if(counter==3){
                                                id("informaTel").innerHTML = ("É necessário pelo menos 1 telefone para contato");
                                                id("removeButton").value=("");
                                                id("removeButton").disabled = true;
                                                return false;
                                            }   
                                        
                                            counter--;
                                        
                                            $("#TextBoxDiv" + counter).remove();
                                            contTelefone--;
                                        
                                        });

                                        
                                    });

                                
                                    $( document ).ready(function() {
                                        $(".og").hide();
                                        $("#rb1").click(function(){
                                        if ($(this).prop('checked')){
                                            $(".vl").show();
                                            $(".og").hide();
                                            document.getElementById("cpfCliente").setAttribute("required", "required");    
                                        } else {
                                            $(".og").show();
                                            $(".vl").hide();
                                            document.getElementById("cpfCliente").removeAttribute("required");      
                                        }
                                        });
                                        $("#rb2").click(function(){
                                            if($(this).prop('checked')){
                                                $(".og").show();
                                                $(".vl").hide();  
                                                document.getElementById("cpfCliente").removeAttribute("required");  
                                            }else{
                                                $(".vl").show();
                                                $(".og").hide(); 
                                                document.getElementById("cpfCliente").setAttribute("required", "required");
                                            }
                                        });
                                    });
                                </script>
                            
                            </head>
                            <body id="fundo">
                                <div id="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                            <div id="form">
                                                <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>

                                                <br><br><br><br>
                                                
                                                <div class="dados">                                
                                                    <form id="formulario1" method="POST" action="passaCadastro.php" enctype="multipart/form-data">  
                                                        <div class="row">
                                                            <label class="label">Selecione uma foto de perfil</label>

                                                            <br><br>

                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".jpg" class="custom-file-input" id="imagem" name="imagem" required>
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Foto de perfil</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br><br>

                                                        <div class="selectBtn">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="rb" id="rb1" class="form-check-input" value="1" checked>
                                                                <label class="form-check-label label2" for="rb1">Voluntário</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="rb" id="rb2" class="form-check-input" value="2">
                                                                <label class="form-check-label label2" for="rb2">ONG</label>
                                                            </div>
                                                        </div>
                                                            
                                                        
                                                        <br><br>
                                                    
                                                        <div>
                                                            <input type="text" id="nome" class="cad" name="nome" onkeypress="return somente_letras(this);" required>
                                                            <label class="label1">Nome</label>
                                                        </div>
                                                        <br class="og"><br class="og">
                                                        <div class="vl">
                                                            <input type="text" class="cad input" onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpf" onblur="isValidCPF(this.value);" required>
                                                            <label class="label1">CPF</label>
                                                            <p id="informaCPF" class="informa"></p>
                                                        </div> 
                                                        <br class="vl"><br class="vl">
                                                        
                                                            <div>
                                                                <input type="text" name="cep" id="cep" value=""  class="cad" onkeypress="$(this).mask('99999-999');"  class="input" onblur="pesquisacep(this.value);" required>
                                                                <label class="label1">CEP</label>
                                                                <p id="informaCEP" class="informa"></p>
                                                            </div>
                                                        <div class="row">    
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                <input id="rua" type="text" class="cad" name="rua" required>
                                                                <label class="cep label1">Endereço</label>
                                                            </div>    
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                <input id="numeroResi" class="cad" name="numeroResi" type="number" required>
                                                                <label class="cep label1">Número</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                                <input id="bairro" class="cad" type="text" required/>       
                                                                <label class="cep label1">Bairro</label>
                                                            </div>
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                <input id="cidade" class="cad" type="text" required/>
                                                                <label class="cep label1">Cidade</label>
                                                            </div>   
                                                            <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
                                                                <input id="complemento" class="cad" name="complemento" type="text"/>
                                                                <p class="cep2 label3">Complemento</p>
                                                                
                                                            </div> 
                                                        </div>
                                                        

                                                    


                                                        <br><br>

                                                        <div class="row" id='TextBoxesGroup'>
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" id="TextBoxDiv1">  
                                                                <input type="hidden" name="contTelefone" id="contTelefone" value="">
                                                                <input type="text" class="cad tel" maxlength="15" id="telefone0" name="telefone0"  onkeypress='return somenteNumeros();' disabled>
                                                                <label class="cep label1">Telefone</label>
                                                            </div>
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-4 btns">
                                                                <button type="button" class="btn btn-light" id="addButton">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                                                    </svg>    
                                                                </button>
                                                                <button type="button" class="btn btn-light" type='button' id='removeButton' disabled>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <p id="informaTel" class="informa"></p>

                                                        <br><br>

                                                        <div class="row og">
                                                            <label class="label">Anexe os documentos abaixo</label>
                                                            <br class="og"><br class="og">

                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile01">
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile01">Certificado de Utilidade Pública Federal</label>
                                                                </div>
                                                            </div>
                                                            <br class="og"><br class="og">
                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile02">
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Certificado de Utilidade Pública Estadual</label>
                                                                </div>
                                                            </div>
                                                            <br class="og"><br class="og">
                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile03">
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile03">Certificado de Utilidade Pública Municipal</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br class="og"><br class="og">

                                                        <div id="servicos" class="vl">
                                                            <select class="custom-select" id="inputGroupSelect01" name="servico">
                                                                <option selected value="0" >Escolha um serviço...</option>
                                                                <option>Animador</option>
                                                                <option>Arquiteto</option>
                                                                <option>Artista plástico</option>
                                                                <option>Biblioteconomista</option>
                                                                <option>Cozinheiro</option>
                                                                <option>Cientista da computação</option>
                                                                <option>Cooperativista</option>
                                                                <option>Cuidador</option>
                                                                <option>Dentista</option>
                                                                <option>Diarista</option>
                                                                <option>Doador</option>
                                                                <option>Educador</option>
                                                                <option>Educomunicador</option>
                                                                <option>Eletricista</option>
                                                                <option>Enfermeiro</option>
                                                                <option>Fotógrafo</option>
                                                                <option>Fisioterapeuta</option>
                                                                <option>Gestor</option>
                                                                <option>Jardineiro</option>
                                                                <option>Marqueteiro</option>
                                                                <option>Músico</option>
                                                                <option>Nutricionista</option>
                                                                <option>Pedagogo</option>
                                                                <option>Pedreiro Geral</option>
                                                                <option>Pedreiro Azuleijista</option>
                                                                <option>Pedreiro de Acabamento</option>
                                                                <option>Pedreiro de Alvenaria</option>
                                                                <option>Pedreiro de OAC</option>
                                                                <option>Pedreiro de Manutenção Geral</option>
                                                                <option>Pintor</option>
                                                                <option>Profissional em Educação Física</option>
                                                                <option>Psicólogo</option>
                                                                <option>Psiquiatra</option>
                                                            </select>
                                                        </div>
                                                        <div id="servicos" class="og">
                                                            <select class="custom-select" id="inputGroupSelect02"  name="ramo">
                                                                <option selected value="0" >Serviço necessário...</option>
                                                                <option>Animador</option>
                                                                <option>Arquiteto</option>
                                                                <option>Artista plástico</option>
                                                                <option>Biblioteconomista</option>
                                                                <option>Cozinheiro</option>
                                                                <option>Cientista da computação</option>
                                                                <option>Cooperativista</option>
                                                                <option>Cuidador</option>
                                                                <option>Dentista</option>
                                                                <option>Diarista</option>
                                                                <option>Doador</option>
                                                                <option>Educador</option>
                                                                <option>Educomunicador</option>
                                                                <option>Eletricista</option>
                                                                <option>Enfermeiro</option>
                                                                <option>Fotógrafo</option>
                                                                <option>Fisioterapeuta</option>
                                                                <option>Gestor</option>
                                                                <option>Jardineiro</option>
                                                                <option>Marqueteiro</option>
                                                                <option>Músico</option>
                                                                <option>Nutricionista</option>
                                                                <option>Pedagogo</option>
                                                                <option>Pedreiro Geral</option>
                                                                <option>Pedreiro Azuleijista</option>
                                                                <option>Pedreiro de Acabamento</option>
                                                                <option>Pedreiro de Alvenaria</option>
                                                                <option>Pedreiro de OAC</option>
                                                                <option>Pedreiro de Manutenção Geral</option>
                                                                <option>Pintor</option>
                                                                <option>Profissional em Educação Física</option>
                                                                <option>Psicólogo</option>
                                                                <option>Psiquiatra</option>
                                                            </select>
                                                        </div>

                                                        <br class="og"><br class="og">

                                                        <br><br>

                                                        <div>
                                                            <input type="text" class="cad" name="email" id="email" onkeypress="return formata_email()" onblur="emailMask()" required>
                                                            <label class="label1 email">E-mail</label>
                                                            <p id="informaEmail" class="informa"></p>
                                                        </div>
                                                        
                                                        <div>
                                                            <input type="password" id="senha1" class="cad" name="senha" required>
                                                            <label class="label1">Senha</label>
                                                        </div>
                                                        <div>    
                                                            <input type="password" id="cSenha1" class="cad" name="cSenha" required>
                                                            <label class="label1">confirme sua senha</label>
                                                        </div>
                                                        <div>
                                                            <br><br>
                                                            <p class="message" style="color: red"><?php if($messageDados!="") { echo $messageDados; } ?></p>
                                                            <input type="submit" class="btn btn-light" class="cad" value="Cadastrar-se" id="cadastrar1" name="cadastrar">
                                                        </div>        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </body>
                        </html>
<?php
                }
            }else{
?>
                <!DOCTYPE html>
                    <html lang="pt-br">
                        <head>
                            <meta charset="UTF-8">
                            <title>Contato Voluntário - Cadastro</title>
                            <link rel="shortcut icon" href="../assets/img/icone.png">  
                            <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                            <script src="js/selecao.js"></script>
                            <script src="js/cadastro.js"></script>
                            
                            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                            <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                            
                            <script type="text/javascript">

                                var contTelefone = 1;

                                function id(sId){
                                    return document.getElementById(sId);
                                } 

                                $(document).ready(function(){
                                
                                    var counter = 2;

                                
                                    $("#addButton").click(function () {

                                        if(counter>3){
                                            id("informaTel").innerHTML = ("Cadastre apenas 2 campos de telefone");
                                            return false;
                                        }
                                
                                        var newTextBoxDiv = $(document.createElement('div'))
                                        .attr("id", 'TextBoxDiv' + counter);
                                        newTextBoxDiv.attr("class", 'col-xs-3 col-sm-6 col-md-6 col-lg-6');

                                        var input = $(document.createElement('input'))
                                        .attr("onkeypress", '$(this).mask("(99) 9 9999-9999");');
                                        input.attr("type", 'text');
                                        input.attr("id", 'telefone' + contTelefone);
                                        input.attr("class", 'cad tel');
                                        input.attr("name", 'telefone' + contTelefone);
                                        input.attr("required", "required");
                                        input.attr("maxlength", '15');
                                        
                                        
                                        newTextBoxDiv.after().html(input);
                                        contTelefone++;

                                        newTextBoxDiv.appendTo("#TextBoxesGroup");
                                    
                                    
                                        counter++;


                                        
                                        var numTel = $('.tel').length;
                                        var arrayTel = [numTel];

                                        if(arrayTel>1){
                                            id("removeButton").disabled = false;
                                        }
                                        
                                    
                                    });

                                    
                                    $("#removeButton").click(function () {
                                        if(counter==3){
                                            id("informaTel").innerHTML = ("É necessário pelo menos 1 telefone para contato");
                                            id("removeButton").value=("");
                                            id("removeButton").disabled = true;
                                            return false;
                                        }   
                                    
                                        counter--;
                                    
                                        $("#TextBoxDiv" + counter).remove();
                                        contTelefone--;
                                    
                                    });

                                    
                                });

                            
                                $( document ).ready(function() {
                                    $(".og").hide();
                                    $("#rb1").click(function(){
                                    if ($(this).prop('checked')){
                                        $(".vl").show();
                                        $(".og").hide();
                                        document.getElementById("cpfCliente").setAttribute("required", "required");    
                                    } else {
                                        $(".og").show();
                                        $(".vl").hide();
                                        document.getElementById("cpfCliente").removeAttribute("required");      
                                    }
                                    });
                                    $("#rb2").click(function(){
                                        if($(this).prop('checked')){
                                            $(".og").show();
                                            $(".vl").hide();  
                                            document.getElementById("cpfCliente").removeAttribute("required");  
                                        }else{
                                            $(".vl").show();
                                            $(".og").hide(); 
                                            document.getElementById("cpfCliente").setAttribute("required", "required");
                                        }
                                    });
                                });
                            </script>
                        
                        </head>
                        <body id="fundo">
                            <div id="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                        <div id="form">
                                            <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>

                                            <br><br><br><br>
                                            
                                            <div class="dados">                                
                                                <form id="formulario1" method="POST" action="passaCadastro.php" enctype="multipart/form-data">  
                                                    <div class="row">
                                                        <label class="label">Selecione uma foto de perfil</label>

                                                        <br><br>

                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".jpg" class="custom-file-input" id="imagem" name="imagem" required>
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Foto de perfil</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br><br>

                                                    <div class="selectBtn">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="rb" id="rb1" class="form-check-input" value="1" checked>
                                                            <label class="form-check-label label2" for="rb1">Voluntário</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="rb" id="rb2" class="form-check-input" value="2">
                                                            <label class="form-check-label label2" for="rb2">ONG</label>
                                                        </div>
                                                    </div>
                                                        
                                                    
                                                    <br><br>
                                                
                                                    <div>
                                                        <input type="text" id="nome" class="cad" name="nome" onkeypress="return somente_letras(this);" required>
                                                        <label class="label1">Nome</label>
                                                    </div>
                                                    <br class="og"><br class="og">
                                                    <div class="vl">
                                                        <input type="text" class="cad input" onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpf" onblur="isValidCPF(this.value);" required>
                                                        <label class="label1">CPF</label>
                                                        <p id="informaCPF" class="informa"></p>
                                                    </div> 
                                                    <br class="vl"><br class="vl">
                                                    
                                                        <div>
                                                            <input type="text" name="cep" id="cep" value=""  class="cad" onkeypress="$(this).mask('99999-999');"  class="input" onblur="pesquisacep(this.value);" required>
                                                            <label class="label1">CEP</label>
                                                            <p id="informaCEP" class="informa"></p>
                                                        </div>
                                                    <div class="row">    
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                            <input id="rua" type="text" class="cad" name="rua" required>
                                                            <label class="cep label1">Endereço</label>
                                                        </div>    
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                            <input id="numeroResi" class="cad" name="numeroResi" type="number" required>
                                                            <label class="cep label1">Número</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                            <input id="bairro" class="cad" type="text" required/>       
                                                            <label class="cep label1">Bairro</label>
                                                        </div>
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                            <input id="cidade" class="cad" type="text" required/>
                                                            <label class="cep label1">Cidade</label>
                                                        </div>   
                                                        <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
                                                            <input id="complemento" class="cad" name="complemento" type="text"/>
                                                            <p class="cep2 label3">Complemento</p>
                                                            
                                                        </div> 
                                                    </div>
                                                    

                                                


                                                    <br><br>

                                                    <div class="row" id='TextBoxesGroup'>
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" id="TextBoxDiv1">  
                                                            <input type="hidden" name="contTelefone" id="contTelefone" value="">
                                                            <input type="text" class="cad tel" maxlength="15" id="telefone0" name="telefone0"  onkeypress='return somenteNumeros();' disabled>
                                                            <label class="cep label1">Telefone</label>
                                                        </div>
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-4 btns">
                                                            <button type="button" class="btn btn-light" id="addButton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                                                </svg>    
                                                            </button>
                                                            <button type="button" class="btn btn-light" type='button' id='removeButton' disabled>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <p id="informaTel" class="informa"></p>

                                                    <br><br>

                                                    <div class="row og">
                                                        <label class="label">Anexe os documentos abaixo</label>
                                                        <br class="og"><br class="og">

                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile01">Certificado de Utilidade Pública Federal</label>
                                                            </div>
                                                        </div>
                                                        <br class="og"><br class="og">
                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile02">
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Certificado de Utilidade Pública Estadual</label>
                                                            </div>
                                                        </div>
                                                        <br class="og"><br class="og">
                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile03">
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile03">Certificado de Utilidade Pública Municipal</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br class="og"><br class="og">

                                                    <div id="servicos" class="vl">
                                                        <select class="custom-select" id="inputGroupSelect01" name="servico">
                                                            <option selected value="0" >Escolha um serviço...</option>
                                                            <option>Animador</option>
                                                            <option>Arquiteto</option>
                                                            <option>Artista plástico</option>
                                                            <option>Biblioteconomista</option>
                                                            <option>Cozinheiro</option>
                                                            <option>Cientista da computação</option>
                                                            <option>Cooperativista</option>
                                                            <option>Cuidador</option>
                                                            <option>Dentista</option>
                                                            <option>Diarista</option>
                                                            <option>Doador</option>
                                                            <option>Educador</option>
                                                            <option>Educomunicador</option>
                                                            <option>Eletricista</option>
                                                            <option>Enfermeiro</option>
                                                            <option>Fotógrafo</option>
                                                            <option>Fisioterapeuta</option>
                                                            <option>Gestor</option>
                                                            <option>Jardineiro</option>
                                                            <option>Marqueteiro</option>
                                                            <option>Músico</option>
                                                            <option>Nutricionista</option>
                                                            <option>Pedagogo</option>
                                                            <option>Pedreiro Geral</option>
                                                            <option>Pedreiro Azuleijista</option>
                                                            <option>Pedreiro de Acabamento</option>
                                                            <option>Pedreiro de Alvenaria</option>
                                                            <option>Pedreiro de OAC</option>
                                                            <option>Pedreiro de Manutenção Geral</option>
                                                            <option>Pintor</option>
                                                            <option>Profissional em Educação Física</option>
                                                            <option>Psicólogo</option>
                                                            <option>Psiquiatra</option>
                                                        </select>
                                                    </div>
                                                    <div id="servicos" class="og">
                                                        <select class="custom-select" id="inputGroupSelect02"  name="ramo">
                                                            <option selected value="0" >Serviço necessário...</option>
                                                            <option>Animador</option>
                                                            <option>Arquiteto</option>
                                                            <option>Artista plástico</option>
                                                            <option>Biblioteconomista</option>
                                                            <option>Cozinheiro</option>
                                                            <option>Cientista da computação</option>
                                                            <option>Cooperativista</option>
                                                            <option>Cuidador</option>
                                                            <option>Dentista</option>
                                                            <option>Diarista</option>
                                                            <option>Doador</option>
                                                            <option>Educador</option>
                                                            <option>Educomunicador</option>
                                                            <option>Eletricista</option>
                                                            <option>Enfermeiro</option>
                                                            <option>Fotógrafo</option>
                                                            <option>Fisioterapeuta</option>
                                                            <option>Gestor</option>
                                                            <option>Jardineiro</option>
                                                            <option>Marqueteiro</option>
                                                            <option>Músico</option>
                                                            <option>Nutricionista</option>
                                                            <option>Pedagogo</option>
                                                            <option>Pedreiro Geral</option>
                                                            <option>Pedreiro Azuleijista</option>
                                                            <option>Pedreiro de Acabamento</option>
                                                            <option>Pedreiro de Alvenaria</option>
                                                            <option>Pedreiro de OAC</option>
                                                            <option>Pedreiro de Manutenção Geral</option>
                                                            <option>Pintor</option>
                                                            <option>Profissional em Educação Física</option>
                                                            <option>Psicólogo</option>
                                                            <option>Psiquiatra</option>
                                                        </select>
                                                    </div>

                                                    <br class="og"><br class="og">

                                                    <br><br>

                                                    <div>
                                                        <input type="text" class="cad" name="email" id="email" onkeypress="return formata_email()" onblur="emailMask()" required>
                                                        <label class="label1 email">E-mail</label>
                                                        <p id="informaEmail" class="informa"></p>
                                                    </div>
                                                    
                                                    <div>
                                                        <input type="password" id="senha1" class="cad" name="senha" required>
                                                        <label class="label1">Senha</label>
                                                    </div>
                                                    <div>    
                                                        <input type="password" id="cSenha1" class="cad" name="cSenha" required>
                                                        <label class="label1">confirme sua senha</label>
                                                    </div>
                                                    <div>
                                                        <br><br>
                                                        <p class="message" style="color: red"><?php if($messageDados!="") { echo $messageDados; } ?></p>
                                                        <input type="submit" class="btn btn-light" class="cad" value="Cadastrar-se" id="cadastrar1" name="cadastrar">
                                                    </div>        
                                                </form>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </body>
                    </html>
<?php
            }
        }else{
            $cpf  = "";
            $tipo = 2;


            if(isset($_POST["telefone1"])){
                $telefone1 = $_POST["telefone1"];
                if(!empty($email) && !empty($senha) && !empty($cSenha) && !empty($imagem) && !empty($telefone1) && $ramo != "0"){
                    if($senha == $cSenha){
                        if($telefone2==""){
                            move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                            $sql = "INSERT INTO usuario(nome_usuario, email, senha, num_resid, complemento, tipo_usuario, cep, telefone1, imagem) VALUES (?,?,?,?,?,?,?,?,?)";
                            $stmt = $conexao->prepare($sql);
                            $stmt->bind_param("sssisisss",$nome,$email,$senha,$numeroResi,$complemento,$tipo,$cep,$telefone1,$imagem["name"]);
                            if(!$stmt->execute()){
                                $erro = $stmt->error;
                                echo $erro;
                            }else{
                                $codDele = "SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT 1";
                                $result = mysqli_query($conexao,$codDele);
                                $array =  mysqli_fetch_array($result, MYSQLI_ASSOC);

                                $sqlTel = "INSERT INTO ramo(ramo, id_usuario) VALUES (?,?)";
                                $stmtTel = $conexao->prepare($sqlTel);
                                $stmtTel->bind_param("si",$ramo,$array['id_usuario']);
                                if(!$stmtTel->execute()){
                                    $erro = $stmtTel->error;
                                    echo $erro;
                                }
                                header("Location:../login/login.php");
                                exit;
                            }
                        }else{
                            move_uploaded_file($imagem["tmp_name"], "$dir/".$imagem["name"]);
                            $sql = "INSERT INTO usuario(nome_usuario, email, senha, num_resid, complemento, tipo_usuario, cep, telefone1, telefone2, imagem) VALUES (?,?,?,?,?,?,?,?,?,?)";
                            $stmt = $conexao->prepare($sql);
                            $stmt->bind_param("sssisissss",$nome,$email,$senha,$numeroResi,$complemento,$tipo,$cep,$telefone1,$telefone2,$imagem["name"]);
                            if(!$stmt->execute()){
                                $erro = $stmt->error;
                                echo $erro;
                            }else{
                                $codDele = "SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT 1";
                                $result = mysqli_query($conexao,$codDele);
                                $array =  mysqli_fetch_array($result, MYSQLI_ASSOC);

                                $sqlTel = "INSERT INTO ramo(ramo, id_usuario) VALUES (?,?)";
                                $stmtTel = $conexao->prepare($sqlTel);
                                $stmtTel->bind_param("si",$ramo,$array['id_usuario']);
                                if(!$stmtTel->execute()){
                                    $erro = $stmtTel->error;
                                    echo $erro;
                                }    
                                header("Location:../login/login.php");
                                exit;
                            }
                        }
                    }else{
                        $telefone2 = "";
?>
                        <!DOCTYPE html>
                            <html lang="pt-br">
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Contato Voluntário - Cadastro</title>
                                    <link rel="shortcut icon" href="../assets/img/icone.png">  
                                    <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                                    <script src="js/selecao.js"></script>
                                    <script src="js/cadastro.js"></script>
                                    
                                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                    <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                                    
                                    <script type="text/javascript">

                                        var contTelefone = 1;

                                        function id(sId){
                                            return document.getElementById(sId);
                                        } 

                                        $(document).ready(function(){
                                        
                                            var counter = 2;

                                        
                                            $("#addButton").click(function () {

                                                if(counter>3){
                                                    id("informaTel").innerHTML = ("Cadastre apenas 2 campos de telefone");
                                                    return false;
                                                }
                                        
                                                var newTextBoxDiv = $(document.createElement('div'))
                                                .attr("id", 'TextBoxDiv' + counter);
                                                newTextBoxDiv.attr("class", 'col-xs-3 col-sm-6 col-md-6 col-lg-6');

                                                var input = $(document.createElement('input'))
                                                .attr("onkeypress", '$(this).mask("(99) 9 9999-9999");');
                                                input.attr("type", 'text');
                                                input.attr("id", 'telefone' + contTelefone);
                                                input.attr("class", 'cad tel');
                                                input.attr("name", 'telefone' + contTelefone);
                                                input.attr("required", "required");
                                                input.attr("maxlength", '15');
                                                
                                                
                                                newTextBoxDiv.after().html(input);
                                                contTelefone++;

                                                newTextBoxDiv.appendTo("#TextBoxesGroup");
                                            
                                            
                                                counter++;


                                                
                                                var numTel = $('.tel').length;
                                                var arrayTel = [numTel];

                                                if(arrayTel>1){
                                                    id("removeButton").disabled = false;
                                                }
                                                
                                            
                                            });

                                            
                                            $("#removeButton").click(function () {
                                                if(counter==3){
                                                    id("informaTel").innerHTML = ("É necessário pelo menos 1 telefone para contato");
                                                    id("removeButton").value=("");
                                                    id("removeButton").disabled = true;
                                                    return false;
                                                }   
                                            
                                                counter--;
                                            
                                                $("#TextBoxDiv" + counter).remove();
                                                contTelefone--;
                                            
                                            });

                                            
                                        });

                                    
                                        $( document ).ready(function() {
                                            $(".og").hide();
                                            $("#rb1").click(function(){
                                            if ($(this).prop('checked')){
                                                $(".vl").show();
                                                $(".og").hide();
                                                document.getElementById("cpfCliente").setAttribute("required", "required");    
                                            } else {
                                                $(".og").show();
                                                $(".vl").hide();
                                                document.getElementById("cpfCliente").removeAttribute("required");      
                                            }
                                            });
                                            $("#rb2").click(function(){
                                                if($(this).prop('checked')){
                                                    $(".og").show();
                                                    $(".vl").hide();  
                                                    document.getElementById("cpfCliente").removeAttribute("required");  
                                                }else{
                                                    $(".vl").show();
                                                    $(".og").hide(); 
                                                    document.getElementById("cpfCliente").setAttribute("required", "required");
                                                }
                                            });
                                        });
                                    </script>
                                
                                </head>
                                <body id="fundo">
                                    <div id="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                                <div id="form">
                                                    <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>

                                                    <br><br><br><br>
                                                    
                                                    <div class="dados">                                
                                                        <form id="formulario1" method="POST" action="passaCadastro.php" enctype="multipart/form-data">  
                                                            <div class="row">
                                                                <label class="label">Selecione uma foto de perfil</label>

                                                                <br><br>

                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".jpg" class="custom-file-input" id="imagem" name="imagem" required>
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Foto de perfil</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br><br>

                                                            <div class="selectBtn">
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" name="rb" id="rb1" class="form-check-input" value="1" checked>
                                                                    <label class="form-check-label label2" for="rb1">Voluntário</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" name="rb" id="rb2" class="form-check-input" value="2">
                                                                    <label class="form-check-label label2" for="rb2">ONG</label>
                                                                </div>
                                                            </div>
                                                                
                                                            
                                                            <br><br>
                                                        
                                                            <div>
                                                                <input type="text" id="nome" class="cad" name="nome" onkeypress="return somente_letras(this);" required>
                                                                <label class="label1">Nome</label>
                                                            </div>
                                                            <br class="og"><br class="og">
                                                            <div class="vl">
                                                                <input type="text" class="cad input" onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpf" onblur="isValidCPF(this.value);" required>
                                                                <label class="label1">CPF</label>
                                                                <p id="informaCPF" class="informa"></p>
                                                            </div> 
                                                            <br class="vl"><br class="vl">
                                                            
                                                                <div>
                                                                    <input type="text" name="cep" id="cep" value=""  class="cad" onkeypress="$(this).mask('99999-999');"  class="input" onblur="pesquisacep(this.value);" required>
                                                                    <label class="label1">CEP</label>
                                                                    <p id="informaCEP" class="informa"></p>
                                                                </div>
                                                            <div class="row">    
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                    <input id="rua" type="text" class="cad" name="rua" required>
                                                                    <label class="cep label1">Endereço</label>
                                                                </div>    
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                    <input id="numeroResi" class="cad" name="numeroResi" type="number" required>
                                                                    <label class="cep label1">Número</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                                    <input id="bairro" class="cad" type="text" required/>       
                                                                    <label class="cep label1">Bairro</label>
                                                                </div>
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                    <input id="cidade" class="cad" type="text" required/>
                                                                    <label class="cep label1">Cidade</label>
                                                                </div>   
                                                                <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
                                                                    <input id="complemento" class="cad" name="complemento" type="text"/>
                                                                    <p class="cep2 label3">Complemento</p>
                                                                    
                                                                </div> 
                                                            </div>
                                                            

                                                        


                                                            <br><br>

                                                            <div class="row" id='TextBoxesGroup'>
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" id="TextBoxDiv1">  
                                                                    <input type="hidden" name="contTelefone" id="contTelefone" value="">
                                                                    <input type="text" class="cad tel" maxlength="15" id="telefone0" name="telefone0"  onkeypress='return somenteNumeros();' disabled>
                                                                    <label class="cep label1">Telefone</label>
                                                                </div>
                                                                <div class="col-xs-3 col-sm-6 col-md-6 col-lg-4 btns">
                                                                    <button type="button" class="btn btn-light" id="addButton">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                                                        </svg>    
                                                                    </button>
                                                                    <button type="button" class="btn btn-light" type='button' id='removeButton' disabled>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p id="informaTel" class="informa"></p>

                                                            <br><br>

                                                            <div class="row og">
                                                                <label class="label">Anexe os documentos abaixo</label>
                                                                <br class="og"><br class="og">

                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile01">
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile01">Certificado de Utilidade Pública Federal</label>
                                                                    </div>
                                                                </div>
                                                                <br class="og"><br class="og">
                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile02">
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Certificado de Utilidade Pública Estadual</label>
                                                                    </div>
                                                                </div>
                                                                <br class="og"><br class="og">
                                                                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                    <div class="custom-file">
                                                                        <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile03">
                                                                        <label class="custom-file-label" id="labelInp" for="inputGroupFile03">Certificado de Utilidade Pública Municipal</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br class="og"><br class="og">

                                                            <div id="servicos" class="vl">
                                                                <select class="custom-select" id="inputGroupSelect01" name="servico">
                                                                    <option selected value="0" >Escolha um serviço...</option>
                                                                    <option>Animador</option>
                                                                    <option>Arquiteto</option>
                                                                    <option>Artista plástico</option>
                                                                    <option>Biblioteconomista</option>
                                                                    <option>Cozinheiro</option>
                                                                    <option>Cientista da computação</option>
                                                                    <option>Cooperativista</option>
                                                                    <option>Cuidador</option>
                                                                    <option>Dentista</option>
                                                                    <option>Diarista</option>
                                                                    <option>Doador</option>
                                                                    <option>Educador</option>
                                                                    <option>Educomunicador</option>
                                                                    <option>Eletricista</option>
                                                                    <option>Enfermeiro</option>
                                                                    <option>Fotógrafo</option>
                                                                    <option>Fisioterapeuta</option>
                                                                    <option>Gestor</option>
                                                                    <option>Jardineiro</option>
                                                                    <option>Marqueteiro</option>
                                                                    <option>Músico</option>
                                                                    <option>Nutricionista</option>
                                                                    <option>Pedagogo</option>
                                                                    <option>Pedreiro Geral</option>
                                                                    <option>Pedreiro Azuleijista</option>
                                                                    <option>Pedreiro de Acabamento</option>
                                                                    <option>Pedreiro de Alvenaria</option>
                                                                    <option>Pedreiro de OAC</option>
                                                                    <option>Pedreiro de Manutenção Geral</option>
                                                                    <option>Pintor</option>
                                                                    <option>Profissional em Educação Física</option>
                                                                    <option>Psicólogo</option>
                                                                    <option>Psiquiatra</option>
                                                                </select>
                                                            </div>
                                                            <div id="servicos" class="og">
                                                                <select class="custom-select" id="inputGroupSelect02"  name="ramo">
                                                                    <option selected value="0" >Serviço necessário...</option>
                                                                    <option>Animador</option>
                                                                    <option>Arquiteto</option>
                                                                    <option>Artista plástico</option>
                                                                    <option>Biblioteconomista</option>
                                                                    <option>Cozinheiro</option>
                                                                    <option>Cientista da computação</option>
                                                                    <option>Cooperativista</option>
                                                                    <option>Cuidador</option>
                                                                    <option>Dentista</option>
                                                                    <option>Diarista</option>
                                                                    <option>Doador</option>
                                                                    <option>Educador</option>
                                                                    <option>Educomunicador</option>
                                                                    <option>Eletricista</option>
                                                                    <option>Enfermeiro</option>
                                                                    <option>Fotógrafo</option>
                                                                    <option>Fisioterapeuta</option>
                                                                    <option>Gestor</option>
                                                                    <option>Jardineiro</option>
                                                                    <option>Marqueteiro</option>
                                                                    <option>Músico</option>
                                                                    <option>Nutricionista</option>
                                                                    <option>Pedagogo</option>
                                                                    <option>Pedreiro Geral</option>
                                                                    <option>Pedreiro Azuleijista</option>
                                                                    <option>Pedreiro de Acabamento</option>
                                                                    <option>Pedreiro de Alvenaria</option>
                                                                    <option>Pedreiro de OAC</option>
                                                                    <option>Pedreiro de Manutenção Geral</option>
                                                                    <option>Pintor</option>
                                                                    <option>Profissional em Educação Física</option>
                                                                    <option>Psicólogo</option>
                                                                    <option>Psiquiatra</option>
                                                                </select>
                                                            </div>

                                                            <br class="og"><br class="og">

                                                            <br><br>

                                                            <div>
                                                                <input type="text" class="cad" name="email" id="email" onkeypress="return formata_email()" onblur="emailMask()" required>
                                                                <label class="label1 email">E-mail</label>
                                                                <p id="informaEmail" class="informa"></p>
                                                            </div>
                                                            
                                                            <div>
                                                                <input type="password" id="senha1" class="cad" name="senha" required>
                                                                <label class="label1">Senha</label>
                                                            </div>
                                                            <div>    
                                                                <input type="password" id="cSenha1" class="cad" name="cSenha" required>
                                                                <label class="label1">confirme sua senha</label>
                                                                <p class="message" style="color: red"><?php if($messageSenha!="") { echo $messageSenha; } ?></p>
                                                            </div>
                                                            <div>
                                                                <br><br>
                                                                <input type="submit" class="btn btn-light" class="cad" value="cadastrar-se" id="cadastrar1" name="cadastrar">
                                                            </div>        
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </body>
                            </html>
<?php
                    }
                }else{
                    $telefone2 = "";
?>
                    <!DOCTYPE html>
                        <html lang="pt-br">
                            <head>
                                <meta charset="UTF-8">
                                <title>Contato Voluntário - Cadastro</title>
                                <link rel="shortcut icon" href="../assets/img/icone.png">  
                                <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                                <script src="js/selecao.js"></script>
                                <script src="js/cadastro.js"></script>
                                
                                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                                
                                <script type="text/javascript">

                                    var contTelefone = 1;

                                    function id(sId){
                                        return document.getElementById(sId);
                                    } 

                                    $(document).ready(function(){
                                    
                                        var counter = 2;

                                    
                                        $("#addButton").click(function () {

                                            if(counter>3){
                                                id("informaTel").innerHTML = ("Cadastre apenas 2 campos de telefone");
                                                return false;
                                            }
                                    
                                            var newTextBoxDiv = $(document.createElement('div'))
                                            .attr("id", 'TextBoxDiv' + counter);
                                            newTextBoxDiv.attr("class", 'col-xs-3 col-sm-6 col-md-6 col-lg-6');

                                            var input = $(document.createElement('input'))
                                            .attr("onkeypress", '$(this).mask("(99) 9 9999-9999");');
                                            input.attr("type", 'text');
                                            input.attr("id", 'telefone' + contTelefone);
                                            input.attr("class", 'cad tel');
                                            input.attr("name", 'telefone' + contTelefone);
                                            input.attr("required", "required");
                                            input.attr("maxlength", '15');
                                            
                                            
                                            newTextBoxDiv.after().html(input);
                                            contTelefone++;

                                            newTextBoxDiv.appendTo("#TextBoxesGroup");
                                        
                                        
                                            counter++;


                                            
                                            var numTel = $('.tel').length;
                                            var arrayTel = [numTel];

                                            if(arrayTel>1){
                                                id("removeButton").disabled = false;
                                            }
                                            
                                        
                                        });

                                        
                                        $("#removeButton").click(function () {
                                            if(counter==3){
                                                id("informaTel").innerHTML = ("É necessário pelo menos 1 telefone para contato");
                                                id("removeButton").value=("");
                                                id("removeButton").disabled = true;
                                                return false;
                                            }   
                                        
                                            counter--;
                                        
                                            $("#TextBoxDiv" + counter).remove();
                                            contTelefone--;
                                        
                                        });

                                        
                                    });

                                
                                    $( document ).ready(function() {
                                        $(".og").hide();
                                        $("#rb1").click(function(){
                                        if ($(this).prop('checked')){
                                            $(".vl").show();
                                            $(".og").hide();
                                            document.getElementById("cpfCliente").setAttribute("required", "required");    
                                        } else {
                                            $(".og").show();
                                            $(".vl").hide();
                                            document.getElementById("cpfCliente").removeAttribute("required");      
                                        }
                                        });
                                        $("#rb2").click(function(){
                                            if($(this).prop('checked')){
                                                $(".og").show();
                                                $(".vl").hide();  
                                                document.getElementById("cpfCliente").removeAttribute("required");  
                                            }else{
                                                $(".vl").show();
                                                $(".og").hide(); 
                                                document.getElementById("cpfCliente").setAttribute("required", "required");
                                            }
                                        });
                                    });
                                </script>
                            
                            </head>
                            <body id="fundo">
                                <div id="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                            <div id="form">
                                                <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>

                                                <br><br><br><br>
                                                
                                                <div class="dados">                                
                                                    <form id="formulario1" method="POST" action="passaCadastro.php" enctype="multipart/form-data">  
                                                        <div class="row">
                                                            <label class="label">Selecione uma foto de perfil</label>

                                                            <br><br>

                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".jpg" class="custom-file-input" id="imagem" name="imagem" required>
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Foto de perfil</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br><br>

                                                        <div class="selectBtn">
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="rb" id="rb1" class="form-check-input" value="1" checked>
                                                                <label class="form-check-label label2" for="rb1">Voluntário</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="rb" id="rb2" class="form-check-input" value="2">
                                                                <label class="form-check-label label2" for="rb2">ONG</label>
                                                            </div>
                                                        </div>
                                                            
                                                        
                                                        <br><br>
                                                    
                                                        <div>
                                                            <input type="text" id="nome" class="cad" name="nome" onkeypress="return somente_letras(this);" required>
                                                            <label class="label1">Nome</label>
                                                        </div>
                                                        <br class="og"><br class="og">
                                                        <div class="vl">
                                                            <input type="text" class="cad input" onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpf" onblur="isValidCPF(this.value);" required>
                                                            <label class="label1">CPF</label>
                                                            <p id="informaCPF" class="informa"></p>
                                                        </div> 
                                                        <br class="vl"><br class="vl">
                                                        
                                                            <div>
                                                                <input type="text" name="cep" id="cep" value=""  class="cad" onkeypress="$(this).mask('99999-999');"  class="input" onblur="pesquisacep(this.value);" required>
                                                                <label class="label1">CEP</label>
                                                                <p id="informaCEP" class="informa"></p>
                                                            </div>
                                                        <div class="row">    
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                <input id="rua" type="text" class="cad" name="rua" required>
                                                                <label class="cep label1">Endereço</label>
                                                            </div>    
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                <input id="numeroResi" class="cad" name="numeroResi" type="number" required>
                                                                <label class="cep label1">Número</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                                <input id="bairro" class="cad" type="text" required/>       
                                                                <label class="cep label1">Bairro</label>
                                                            </div>
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                                <input id="cidade" class="cad" type="text" required/>
                                                                <label class="cep label1">Cidade</label>
                                                            </div>   
                                                            <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
                                                                <input id="complemento" class="cad" name="complemento" type="text"/>
                                                                <p class="cep2 label3">Complemento</p>
                                                                
                                                            </div> 
                                                        </div>
                                                        

                                                    


                                                        <br><br>

                                                        <div class="row" id='TextBoxesGroup'>
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" id="TextBoxDiv1">  
                                                                <input type="hidden" name="contTelefone" id="contTelefone" value="">
                                                                <input type="text" class="cad tel" maxlength="15" id="telefone0" name="telefone0"  onkeypress='return somenteNumeros();' disabled>
                                                                <label class="cep label1">Telefone</label>
                                                            </div>
                                                            <div class="col-xs-3 col-sm-6 col-md-6 col-lg-4 btns">
                                                                <button type="button" class="btn btn-light" id="addButton">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                                                    </svg>    
                                                                </button>
                                                                <button type="button" class="btn btn-light" type='button' id='removeButton' disabled>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <p id="informaTel" class="informa"></p>

                                                        <br><br>

                                                        <div class="row og">
                                                            <label class="label">Anexe os documentos abaixo</label>
                                                            <br class="og"><br class="og">

                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile01">
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile01">Certificado de Utilidade Pública Federal</label>
                                                                </div>
                                                            </div>
                                                            <br class="og"><br class="og">
                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile02">
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Certificado de Utilidade Pública Estadual</label>
                                                                </div>
                                                            </div>
                                                            <br class="og"><br class="og">
                                                            <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile03">
                                                                    <label class="custom-file-label" id="labelInp" for="inputGroupFile03">Certificado de Utilidade Pública Municipal</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br class="og"><br class="og">

                                                        <div id="servicos" class="vl">
                                                            <select class="custom-select" id="inputGroupSelect01" name="servico">
                                                                <option selected value="0" >Escolha um serviço...</option>
                                                                <option>Animador</option>
                                                                <option>Arquiteto</option>
                                                                <option>Artista plástico</option>
                                                                <option>Biblioteconomista</option>
                                                                <option>Cozinheiro</option>
                                                                <option>Cientista da computação</option>
                                                                <option>Cooperativista</option>
                                                                <option>Cuidador</option>
                                                                <option>Dentista</option>
                                                                <option>Diarista</option>
                                                                <option>Doador</option>
                                                                <option>Educador</option>
                                                                <option>Educomunicador</option>
                                                                <option>Eletricista</option>
                                                                <option>Enfermeiro</option>
                                                                <option>Fotógrafo</option>
                                                                <option>Fisioterapeuta</option>
                                                                <option>Gestor</option>
                                                                <option>Jardineiro</option>
                                                                <option>Marqueteiro</option>
                                                                <option>Músico</option>
                                                                <option>Nutricionista</option>
                                                                <option>Pedagogo</option>
                                                                <option>Pedreiro Geral</option>
                                                                <option>Pedreiro Azuleijista</option>
                                                                <option>Pedreiro de Acabamento</option>
                                                                <option>Pedreiro de Alvenaria</option>
                                                                <option>Pedreiro de OAC</option>
                                                                <option>Pedreiro de Manutenção Geral</option>
                                                                <option>Pintor</option>
                                                                <option>Profissional em Educação Física</option>
                                                                <option>Psicólogo</option>
                                                                <option>Psiquiatra</option>
                                                            </select>
                                                        </div>
                                                        <div id="servicos" class="og">
                                                            <select class="custom-select" id="inputGroupSelect02"  name="ramo">
                                                                <option selected value="0" >Serviço necessário...</option>
                                                                <option>Animador</option>
                                                                <option>Arquiteto</option>
                                                                <option>Artista plástico</option>
                                                                <option>Biblioteconomista</option>
                                                                <option>Cozinheiro</option>
                                                                <option>Cientista da computação</option>
                                                                <option>Cooperativista</option>
                                                                <option>Cuidador</option>
                                                                <option>Dentista</option>
                                                                <option>Diarista</option>
                                                                <option>Doador</option>
                                                                <option>Educador</option>
                                                                <option>Educomunicador</option>
                                                                <option>Eletricista</option>
                                                                <option>Enfermeiro</option>
                                                                <option>Fotógrafo</option>
                                                                <option>Fisioterapeuta</option>
                                                                <option>Gestor</option>
                                                                <option>Jardineiro</option>
                                                                <option>Marqueteiro</option>
                                                                <option>Músico</option>
                                                                <option>Nutricionista</option>
                                                                <option>Pedagogo</option>
                                                                <option>Pedreiro Geral</option>
                                                                <option>Pedreiro Azuleijista</option>
                                                                <option>Pedreiro de Acabamento</option>
                                                                <option>Pedreiro de Alvenaria</option>
                                                                <option>Pedreiro de OAC</option>
                                                                <option>Pedreiro de Manutenção Geral</option>
                                                                <option>Pintor</option>
                                                                <option>Profissional em Educação Física</option>
                                                                <option>Psicólogo</option>
                                                                <option>Psiquiatra</option>
                                                            </select>
                                                        </div>

                                                        <br class="og"><br class="og">

                                                        <br><br>

                                                        <div>
                                                            <input type="text" class="cad" name="email" id="email" onkeypress="return formata_email()" onblur="emailMask()" required>
                                                            <label class="label1 email">E-mail</label>
                                                            <p id="informaEmail" class="informa"></p>
                                                        </div>
                                                        
                                                        <div>
                                                            <input type="password" id="senha1" class="cad" name="senha" required>
                                                            <label class="label1">Senha</label>
                                                        </div>
                                                        <div>    
                                                            <input type="password" id="cSenha1" class="cad" name="cSenha" required>
                                                            <label class="label1">confirme sua senha</label>
                                                        </div>
                                                        <div>
                                                            <br><br>
                                                            <p class="message" style="color: red"><?php if($messageDados!="") { echo $messageDados; } ?></p>
                                                            <input type="submit" class="btn btn-light" class="cad" value="Cadastrar-se" id="cadastrar1" name="cadastrar">
                                                        </div>        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </body>
                        </html>
<?php
                }
            }else{
?>
                <!DOCTYPE html>
                    <html lang="pt-br">
                        <head>
                            <meta charset="UTF-8">
                            <title>Contato Voluntário - Cadastro</title>
                            <link rel="shortcut icon" href="../assets/img/icone.png">  
                            <link type="text/css" rel="stylesheet" href="css/cadastro.css">
                            <script src="js/selecao.js"></script>
                            <script src="js/cadastro.js"></script>
                            
                            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <link rel="shortcut icon" href="../../site/ProjetoFinal/assets/img/icone.png">  
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
                            
                            <script type="text/javascript">

                                var contTelefone = 1;

                                function id(sId){
                                    return document.getElementById(sId);
                                } 

                                $(document).ready(function(){
                                
                                    var counter = 2;

                                
                                    $("#addButton").click(function () {

                                        if(counter>3){
                                            id("informaTel").innerHTML = ("Cadastre apenas 2 campos de telefone");
                                            return false;
                                        }
                                
                                        var newTextBoxDiv = $(document.createElement('div'))
                                        .attr("id", 'TextBoxDiv' + counter);
                                        newTextBoxDiv.attr("class", 'col-xs-3 col-sm-6 col-md-6 col-lg-6');

                                        var input = $(document.createElement('input'))
                                        .attr("onkeypress", '$(this).mask("(99) 9 9999-9999");');
                                        input.attr("type", 'text');
                                        input.attr("id", 'telefone' + contTelefone);
                                        input.attr("class", 'cad tel');
                                        input.attr("name", 'telefone' + contTelefone);
                                        input.attr("required", "required");
                                        input.attr("maxlength", '15');
                                        
                                        
                                        newTextBoxDiv.after().html(input);
                                        contTelefone++;

                                        newTextBoxDiv.appendTo("#TextBoxesGroup");
                                    
                                    
                                        counter++;


                                        
                                        var numTel = $('.tel').length;
                                        var arrayTel = [numTel];

                                        if(arrayTel>1){
                                            id("removeButton").disabled = false;
                                        }
                                        
                                    
                                    });

                                    
                                    $("#removeButton").click(function () {
                                        if(counter==3){
                                            id("informaTel").innerHTML = ("É necessário pelo menos 1 telefone para contato");
                                            id("removeButton").value=("");
                                            id("removeButton").disabled = true;
                                            return false;
                                        }   
                                    
                                        counter--;
                                    
                                        $("#TextBoxDiv" + counter).remove();
                                        contTelefone--;
                                    
                                    });

                                    
                                });

                            
                                $( document ).ready(function() {
                                    $(".og").hide();
                                    $("#rb1").click(function(){
                                    if ($(this).prop('checked')){
                                        $(".vl").show();
                                        $(".og").hide();
                                        document.getElementById("cpfCliente").setAttribute("required", "required");    
                                    } else {
                                        $(".og").show();
                                        $(".vl").hide();
                                        document.getElementById("cpfCliente").removeAttribute("required");      
                                    }
                                    });
                                    $("#rb2").click(function(){
                                        if($(this).prop('checked')){
                                            $(".og").show();
                                            $(".vl").hide();  
                                            document.getElementById("cpfCliente").removeAttribute("required");  
                                        }else{
                                            $(".vl").show();
                                            $(".og").hide(); 
                                            document.getElementById("cpfCliente").setAttribute("required", "required");
                                        }
                                    });
                                });
                            </script>
                        
                        </head>
                        <body id="fundo">
                            <div id="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form">
                                        <div id="form">
                                            <h2 class="display-3" id="bv">Bem-vindo à tela de cadastro</h2>

                                            <br><br><br><br>
                                            
                                            <div class="dados">                                
                                                <form id="formulario1" method="POST" action="passaCadastro.php" enctype="multipart/form-data">  
                                                    <div class="row">
                                                        <label class="label">Selecione uma foto de perfil</label>

                                                        <br><br>

                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".jpg" class="custom-file-input" id="imagem" name="imagem" required>
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Foto de perfil</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br><br>

                                                    <div class="selectBtn">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="rb" id="rb1" class="form-check-input" value="1" checked>
                                                            <label class="form-check-label label2" for="rb1">Voluntário</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="rb" id="rb2" class="form-check-input" value="2">
                                                            <label class="form-check-label label2" for="rb2">ONG</label>
                                                        </div>
                                                    </div>
                                                        
                                                    
                                                    <br><br>
                                                
                                                    <div>
                                                        <input type="text" id="nome" class="cad" name="nome" onkeypress="return somente_letras(this);" required>
                                                        <label class="label1">Nome</label>
                                                    </div>
                                                    <br class="og"><br class="og">
                                                    <div class="vl">
                                                        <input type="text" class="cad input" onkeypress="$(this).mask('000.000.000-00');" id="cpfCliente" name="cpf" onblur="isValidCPF(this.value);" required>
                                                        <label class="label1">CPF</label>
                                                        <p id="informaCPF" class="informa"></p>
                                                    </div> 
                                                    <br class="vl"><br class="vl">
                                                    
                                                        <div>
                                                            <input type="text" name="cep" id="cep" value=""  class="cad" onkeypress="$(this).mask('99999-999');"  class="input" onblur="pesquisacep(this.value);" required>
                                                            <label class="label1">CEP</label>
                                                            <p id="informaCEP" class="informa"></p>
                                                        </div>
                                                    <div class="row">    
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                            <input id="rua" type="text" class="cad" name="rua" required>
                                                            <label class="cep label1">Endereço</label>
                                                        </div>    
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                            <input id="numeroResi" class="cad" name="numeroResi" type="number" required>
                                                            <label class="cep label1">Número</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">  
                                                            <input id="bairro" class="cad" type="text" required/>       
                                                            <label class="cep label1">Bairro</label>
                                                        </div>
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6">
                                                            <input id="cidade" class="cad" type="text" required/>
                                                            <label class="cep label1">Cidade</label>
                                                        </div>   
                                                        <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
                                                            <input id="complemento" class="cad" name="complemento" type="text"/>
                                                            <p class="cep2 label3">Complemento</p>
                                                            
                                                        </div> 
                                                    </div>
                                                    

                                                


                                                    <br><br>

                                                    <div class="row" id='TextBoxesGroup'>
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-6" id="TextBoxDiv1">  
                                                            <input type="hidden" name="contTelefone" id="contTelefone" value="">
                                                            <input type="text" class="cad tel" maxlength="15" id="telefone0" name="telefone0"  onkeypress='return somenteNumeros();' disabled>
                                                            <label class="cep label1">Telefone</label>
                                                        </div>
                                                        <div class="col-xs-3 col-sm-6 col-md-6 col-lg-4 btns">
                                                            <button type="button" class="btn btn-light" id="addButton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                                                </svg>    
                                                            </button>
                                                            <button type="button" class="btn btn-light" type='button' id='removeButton' disabled>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <p id="informaTel" class="informa"></p>

                                                    <br><br>

                                                    <div class="row og">
                                                        <label class="label">Anexe os documentos abaixo</label>
                                                        <br class="og"><br class="og">

                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile01">Certificado de Utilidade Pública Federal</label>
                                                            </div>
                                                        </div>
                                                        <br class="og"><br class="og">
                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile02">
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile02">Certificado de Utilidade Pública Estadual</label>
                                                            </div>
                                                        </div>
                                                        <br class="og"><br class="og">
                                                        <div class="col-xs-2 col-sm-4 col-md-4 col-lg-12">
                                                            <div class="custom-file">
                                                                <input type="file" accept=".pdf" class="custom-file-input" id="inputGroupFile03">
                                                                <label class="custom-file-label" id="labelInp" for="inputGroupFile03">Certificado de Utilidade Pública Municipal</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br class="og"><br class="og">

                                                    <div id="servicos" class="vl">
                                                        <select class="custom-select" id="inputGroupSelect01" name="servico">
                                                            <option selected value="0" >Escolha um serviço...</option>
                                                            <option>Animador</option>
                                                            <option>Arquiteto</option>
                                                            <option>Artista plástico</option>
                                                            <option>Biblioteconomista</option>
                                                            <option>Cozinheiro</option>
                                                            <option>Cientista da computação</option>
                                                            <option>Cooperativista</option>
                                                            <option>Cuidador</option>
                                                            <option>Dentista</option>
                                                            <option>Diarista</option>
                                                            <option>Doador</option>
                                                            <option>Educador</option>
                                                            <option>Educomunicador</option>
                                                            <option>Eletricista</option>
                                                            <option>Enfermeiro</option>
                                                            <option>Fotógrafo</option>
                                                            <option>Fisioterapeuta</option>
                                                            <option>Gestor</option>
                                                            <option>Jardineiro</option>
                                                            <option>Marqueteiro</option>
                                                            <option>Músico</option>
                                                            <option>Nutricionista</option>
                                                            <option>Pedagogo</option>
                                                            <option>Pedreiro Geral</option>
                                                            <option>Pedreiro Azuleijista</option>
                                                            <option>Pedreiro de Acabamento</option>
                                                            <option>Pedreiro de Alvenaria</option>
                                                            <option>Pedreiro de OAC</option>
                                                            <option>Pedreiro de Manutenção Geral</option>
                                                            <option>Pintor</option>
                                                            <option>Profissional em Educação Física</option>
                                                            <option>Psicólogo</option>
                                                            <option>Psiquiatra</option>
                                                        </select>
                                                    </div>
                                                    <div id="servicos" class="og">
                                                        <select class="custom-select" id="inputGroupSelect02"  name="ramo">
                                                            <option selected value="0" >Serviço necessário...</option>
                                                            <option>Animador</option>
                                                            <option>Arquiteto</option>
                                                            <option>Artista plástico</option>
                                                            <option>Biblioteconomista</option>
                                                            <option>Cozinheiro</option>
                                                            <option>Cientista da computação</option>
                                                            <option>Cooperativista</option>
                                                            <option>Cuidador</option>
                                                            <option>Dentista</option>
                                                            <option>Diarista</option>
                                                            <option>Doador</option>
                                                            <option>Educador</option>
                                                            <option>Educomunicador</option>
                                                            <option>Eletricista</option>
                                                            <option>Enfermeiro</option>
                                                            <option>Fotógrafo</option>
                                                            <option>Fisioterapeuta</option>
                                                            <option>Gestor</option>
                                                            <option>Jardineiro</option>
                                                            <option>Marqueteiro</option>
                                                            <option>Músico</option>
                                                            <option>Nutricionista</option>
                                                            <option>Pedagogo</option>
                                                            <option>Pedreiro Geral</option>
                                                            <option>Pedreiro Azuleijista</option>
                                                            <option>Pedreiro de Acabamento</option>
                                                            <option>Pedreiro de Alvenaria</option>
                                                            <option>Pedreiro de OAC</option>
                                                            <option>Pedreiro de Manutenção Geral</option>
                                                            <option>Pintor</option>
                                                            <option>Profissional em Educação Física</option>
                                                            <option>Psicólogo</option>
                                                            <option>Psiquiatra</option>
                                                        </select>
                                                    </div>

                                                    <br class="og"><br class="og">

                                                    <br><br>

                                                    <div>
                                                        <input type="text" class="cad" name="email" id="email" onkeypress="return formata_email()" onblur="emailMask()" required>
                                                        <label class="label1 email">E-mail</label>
                                                        <p id="informaEmail" class="informa"></p>
                                                    </div>
                                                    
                                                    <div>
                                                        <input type="password" id="senha1" class="cad" name="senha" required>
                                                        <label class="label1">Senha</label>
                                                    </div>
                                                    <div>    
                                                        <input type="password" id="cSenha1" class="cad" name="cSenha" required>
                                                        <label class="label1">confirme sua senha</label>
                                                    </div>
                                                    <div>
                                                        <br><br>
                                                        <p class="message" style="color: red"><?php if($messageDados!="") { echo $messageDados; } ?></p>
                                                        <input type="submit" class="btn btn-light" class="cad" value="cadastrar-se" id="cadastrar1" name="cadastrar">
                                                    </div>        
                                                </form>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </body>
                    </html>
<?php
            }
        }
    }