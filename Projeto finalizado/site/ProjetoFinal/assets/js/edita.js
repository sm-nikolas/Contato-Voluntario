// Formatação do campo nome e telefone
function somente_letras(){
    var sDigitos="abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWXYZãõñÃÕÑáéíóúÁÉÍÓÚêâôÂÊÔàè ÀÈ";
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

// preenchimento de endereço automático
function limpa_formulário_cep(){
    //Limpa valores do formulário de cep.
   id('rua2').value=("");
   id('bairro2').value=("");
   id('cidade2').value=("");
   id('cep').focus();
}

function meu_callback(conteudo){
    if(!("erro" in conteudo)){
        //Atualiza os campos com os valores.
        id('rua2').value=(conteudo.logradouro);
        id('bairro2').value=(conteudo.bairro);
        id('cidade2').value=(conteudo.localidade);
        id("informaCEP").innerHTML = '';
    }else{
        //CEP não Encontrado.
        limpa_formulário_cep();
        id("informaCEP").innerHTML = 'CEP não encontrado';
        id('cep').focus();
    }
}

function pesquisacep(valor){

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if(cep == ""){
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
        
    }else{
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)){

            //Preenche os campos com 'Aguarde um instante' enquanto consulta webservice.
        id('rua2').value="Aguarde um instante";
        id('bairro2').value="Aguarde um instante";
        id('cidade2').value="Aguarde um instante";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

            id("informaCEP").innerHTML = '';
        }else{
            //cep é inválido.
            limpa_formulário_cep();
        }
    }
};

/*******************************************************************/
function id(sId){
    return document.getElementById(sId);
}
/*******************************************************************/