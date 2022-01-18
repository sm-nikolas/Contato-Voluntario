function verifUsuario(){
    var tipoUsuario= document.querySelector('input[name=radioUsuario]:checked').value;
    if(tipoUsuario=='ong'){
document.getElementById("dadoOng").disabled = false;
document.getElementById("dadoOng2").disabled = false;

    }else{
document.getElementById("dadoOng").disabled = true;
document.getElementById("dadoOng").value = "";

document.getElementById("dadoOng2").disabled = true;
document.getElementById("dadoOng2").value = "";
    }
    
    }

