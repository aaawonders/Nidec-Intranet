var Senha1 = document.getElementsByClassName('Senha1')[0];
    var Senha2 = document.getElementsByClassName('Senha2')[0];

    Senha1.addEventListener('input', () =>{
        if (Senha1.value.length >= 8) {
            Senha2.style.display = 'block';
        } else if (Senha2.value.length < 8) {
            Senha2.style.display = 'none';
        }
    });