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
                                    <label class="label text-center">Selecione uma foto de perfil</label>

                                    <br><br>

                                    <div class="mb-3">
                                        <input class="form-control" accept="image/*" id="imagem" name="imagem" type="file" id="formFile">
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
                                        <option selected value=0>Escolha um serviço...</option>
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
                                        <option>Doador</option=>
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
                                        <option selected value=0>Serviço necessário...</option>
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
                                    <p class="message" name="message" value="" style="color: red"></p>
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