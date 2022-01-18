// Formatação do campo nome e telefone
function somente_letras(){
    var sDigitos="abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWXYZãõñÃÕÑáéíóúÁÉÍÓÚêâôÂÊÔàè.- ÀÈ";
    var cTecla = event.key;
    if(sDigitos.indexOf(cTecla)==-1){
        return false;
    }else{
        return true;
    }
}

function somenteNumeros(){
    var sDigitos ="0123456789,.-()";
    var cTecla = event.key;
    if(sDigitos.indexOf(cTecla)==-1){
        return false;
    }else{
        return true;
    }
}

/*******************************************************************/

// verificação de cpf
function isValidCPF(cpf) {
    if (typeof cpf !== "string") return false
    cpf = cpf.replace(/[\s.-]*/igm, '')
    if(
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999" 
    ){
        id("informaCPF").innerHTML = 'CPF inválido. Tente novamente';
        id('cpfCliente').value=("");
        id('cpfCliente').focus();
    }else{
        id("informaCPF").innerHTML = '';
        var soma = 0;
        var resto;
        for(var i = 1; i <= 9; i++){
            soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
        }    
        resto = (soma * 10) % 11;
        if ((resto == 10) || (resto == 11)){
            resto = 0;
        }
        if (resto != parseInt(cpf.substring(9, 10)) ){
            soma = 0;
            id("informaCPF").innerHTML = 'CPF inválido. Tente novamente';
            id('cpfCliente').value=("");
            id('cpfCliente').focus();
            
        }
        for (var i = 1; i <= 10; i++){
            soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
        }    
        resto = (soma * 10) % 11
        if ((resto == 10) || (resto == 11)){
            resto = 0;
        }  
        if (resto != parseInt(cpf.substring(10, 11))){
            return false;
        } 
        return true
    } 
}

/*******************************************************************/

// preenchimento de endereço automático
function limpa_formulário_cep(){
    //Limpa valores do formulário de cep.
   id('rua').value=("");
   id('bairro').value=("");
   id('cidade').value=("");
}

function meu_callback(conteudo){
if(!("erro" in conteudo)){
    //Atualiza os campos com os valores.
   id('rua').value=(conteudo.logradouro);
   id('bairro').value=(conteudo.bairro);
   id('cidade').value=(conteudo.localidade);
   id("informaCEP").innerHTML = '';
} 
else{
    //CEP não Encontrado.
    limpa_formulário_cep();
    id("informaCEP").innerHTML = 'CEP não encontrado';
}
}

function pesquisacep(valor){

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if(cep != ""){

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)){

        //Preenche os campos com 'Aguarde um instante' enquanto consulta webservice.
       id('rua').value="Aguarde um instante";
       id('bairro').value="Aguarde um instante";
       id('cidade').value="Aguarde um instante";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

        id("informaCEP").innerHTML = '';
    }
    else{
        //cep é inválido.
        limpa_formulário_cep();
        id("informaCEP").innerHTML = 'CEP inválido';
    }
}
else{
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
    }
};

/*******************************************************************/

// Confirmação de senha
// function confirmação(){
//     var senha = id("senha").value;
//     var cSenha = id("cSenha").value;
//     if(senha==cSenha){
//         id("informaSenha").innerHTML = '';
//     }else{
//         id("informaSenha").innerHTML = 'As senhas não conferem. Tente outra vez.';
//     }
// }

/*******************************************************************/
function id(sId){
    return document.getElementById(sId);
}
/*******************************************************************/

// Formatação do campo e-mail

function formata_email(){
    var sDigitos="abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#$%&'*+-/=?^_`{|}~.";
    var cTecla = event.key;
    if(sDigitos.indexOf(cTecla)==-1){
        return false;
    }else{
        return true;
    }
}

function emailMask() {
    var email = id("email").value;
    var result= email.indexOf("@") > -1;
    if(result == false){
        id("informaEmail").innerHTML = 'E-mail inválido. Tente novamente';
        id('email').value=("");
        id('email').focus();

    }else{
        id("informaEmail").innerHTML = "";
    }
}    




