var BotaoIr = document.getElementsByClassName('SubmitButton'); 


if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}


//Abrir painel de login
var FormLogin = document.getElementsByClassName("floatform");
var BlurPopup = document.getElementsByClassName("popup");
var LoginBotao = document.getElementById("loginButton");
var LoginBotaoFechar = document.getElementById("CloseButtonForm");
var LoginAtivado = document.querySelectorAll('.floatform.ativado');

LoginBotao.addEventListener('click', function PopUPLogin() {
    BlurPopup[0].classList.add("ativado");
    FormLogin[0].classList.add("ativado");
}) 

// Abrir Painel de Criar Conta

var FormLoginCriar = document.getElementsByClassName("floatformCreate");
var CriarLoginBotao = document.getElementById("CriarLogin");
var LoginCriarAtivado = document.querySelectorAll('.floatformCreate.ativado');

CriarLoginBotao.addEventListener('click', function() {
    FormLogin[0].classList.remove("ativado");
    FormLoginCriar[0].classList.add("ativado");
}) 

LoginBotaoFechar.addEventListener('click', () => {
    FormLoginPopup[0].classList.remove("ativado");
    if (LoginAtivado.length > 0) {
        FormLogin[0].classList.remove("ativado");
    } else if (LoginCriarAtivado.length > 0) {
        FormLoginCriar[0].classList.remove("ativado");
    }

}) 

//validar Senhas com estilo

var MyPassword = document.getElementById('PSW');
var ValLetra = document.getElementsByClassName('LetraChar');
var ValNum = document.getElementsByClassName('NumChar');
var ValSymb = document.getElementsByClassName('SymbChar');
var ValTamanho = document.getElementsByClassName('QuantChar');

MyPassword.onfocus = function() {
    document.getElementById("ValSenha").style.display = "block";
  }

  MyPassword.onblur = function() {
    document.getElementById("ValSenha").style.display = "none";
  }

  // When the user starts to type something inside the password field
  MyPassword.onkeyup = function() {
  
    // Validar letras maiúsculas
    var upperCaseLetters = /[A-Z]/g;
    if(MyPassword.value.match(upperCaseLetters)) {
    ValLetra[0].classList.remove("CharNPassou");
    ValLetra[0].classList.add("CharPassou");
    } else {
    ValLetra[0].classList.remove("CharPassou");
    ValLetra[0].classList.add("CharNPassou");
    }
  
    // Validar números
    var numbers = /[0-9]/g;
    if(MyPassword.value.match(numbers)) {
    ValNum[0].classList.remove("CharNPassou");
    ValNum[0].classList.add("CharPassou");
    } else {
    ValNum[0].classList.remove("CharPassou");
    ValNum[0].classList.add("CharNPassou");
    }

    // Validar simbolos
    var symbol = /[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/g;
    if(MyPassword.value.match(symbol)) {
        ValSymb[0].classList.remove("CharNPassou");
        ValSymb[0].classList.add("CharPassou");
    } else {
        ValSymb.classList.remove("CharPassou");
        ValSymb.classList.add("CharNPassou");
    }
  
    // Validar tamanho
    if(MyPassword.value.length > 7) {
        ValTamanho[0].classList.remove("CharNPassou");
        ValTamanho[0].classList.add("CharPassou");
    } else {
        ValTamanho[0].classList.remove("CharPassou");
        ValTamanho[0].classList.add("CharNPassou");
    }
  }
