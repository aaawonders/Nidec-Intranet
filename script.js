//Abrir painel de login

var FormLogin = document.getElementsByClassName("floatform");
var FormLoginPopup = document.getElementsByClassName("popup");
var LoginBotao = document.getElementById("loginButton");
var LoginBotaoFechar = document.getElementById("CloseButtonForm");

LoginBotao.addEventListener('click', function() {
    FormLoginPopup[0].classList.add("ativado");
    FormLogin[0].classList.add("ativado");
}) 

LoginBotaoFechar.addEventListener('click', function() {
    FormLoginPopup[0].classList.remove("ativado");
    FormLogin[0].classList.remove("ativado");
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