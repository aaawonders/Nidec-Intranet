var BotaoIr = document.getElementsByClassName('SubmitButton'); 


// if ( window.history.replaceState ) {
//     window.history.replaceState( null, null, window.location.href );
// }


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

  let clima = {
    "apiKey": "10e2581e4657c6cccd117380cd5fd213",
    fetchWeather: function (){
        fetch(
            "https://api.openweathermap.org/data/2.5/weather?lat=-23.09028&lon=-47.21806&units=metric&lang=pt_br&appid=10e2581e4657c6cccd117380cd5fd213"
        ).then((response) => response.json())
        .then((data) => this.displayWeather(data));
    },
    displayWeather: (data) => {
        const {name} = data;
        const {icon, description} = data.weather[0];
        const { temp, temp_min,temp_max, humidity } = data.main
        const {speed} = data.wind;
        console.log(name, icon, description, temp, humidity);
        document.querySelector(".city").innerHTML = name;
        document.querySelector(".temp").innerHTML = Math.round(temp) + "°C";
        document.querySelector(".description").innerHTML = description.toUpperCase();
        document.querySelector(".icon").src = "https://openweathermap.org/img/wn/" + icon + ".png";
        document.querySelector(".TempMin").innerHTML = "Min: " + Math.round(temp_min) + "°";
        document.querySelector(".TempMax").innerHTML = "Máx: " + Math.round(temp_max) + "°";

        document.querySelector(".CardCity").innerHTML = name;
        document.querySelector(".CardTemp").innerHTML = Math.round(temp) + "°C";
        document.querySelector(".CardDesc").innerHTML = description.toUpperCase();
        document.querySelector(".CardImg").src = "https://openweathermap.org/img/wn/" + icon + ".png";
        document.querySelector(".CardMin").innerHTML = "Min: " + temp_min + "°";
        document.querySelector(".CardMax").innerHTML = "Máx: " + temp_max + "°";
        document.querySelector(".CardUmidade").innerHTML = "Umidade: " + humidity + "%";
        document.querySelector(".CardVel").innerHTML = "Velocidade do ar: " + speed + " km/h";
        document.querySelector('.weather').classList.remove('loading');
    }
  };

clima.fetchWeather(); 

setInterval(() => {
    clima.fetchWeather()
}, 3600000)

var ClimaClique = document.querySelectorAll(".Clima");
var ClimaCard = document.querySelectorAll(".WeatherCard");
var ClimaClose = document.querySelectorAll(".CloseWeather");

ClimaClique[0].addEventListener('click', () => {
    BlurPopup[0].classList.add("ativado");
    ClimaCard[0].classList.add("active");
})

ClimaClose[0].addEventListener('click', () => {
    BlurPopup[0].classList.remove("ativado");
    ClimaCard[0].classList.remove("active");
})