$('.div--User').click(function() {
    $('.User--Block').toggleClass('active');
    $('.Options').toggleClass('active');

    if($('.User--Block').hasClass('active')){
        var tools
        
        var UserExpanded = $('.User--Block').html() ;
        $('User--Block').html()
    }
});


// Peça Individual

function total(){
    var prod = $('.input--prod.prod');
    var ok = $('.input--prod.ok').val()== '' ? 0 : $('.input--prod.ok').val();

    var nok = $('.input--prod.nok').val() == '' ? 0 : $('.input--prod.nok').val();
    var total = parseInt(ok) + parseInt(nok);

    prod.val(total);

    var perTotal = nok / prod.val() * 100;
    perTotal = Math.round((perTotal + Number.EPSILON) * 100) / 100;

    if (isNaN(perTotal)) perTotal = ''; 

    $('.Per--dia span').html(perTotal + ' %');
}

$('.input--prod').on('input', () =>{
    total();
})

var FalhaNome = [];
var labelFalhas = [];
var DataFalhas = [];
var PerFalhas = [];


$('.Falha').on('input',((e) => {
    // var Falha = e.target;
    
    // console.log(Falha.classList[1]);

    var list = $('.Falhas--list').children();
    var nokTotal = $('.input--prod.nok');

    var FalhaTotal = 0;

    for (var i = 0; i < list.length; i++) {
        var FalhaValor = list[i].querySelector('input').value == '' ? 0 : list[i].querySelector('input').value

        FalhaNome[i] = {Nome: list[i].classList[1], Quantidade: parseInt(FalhaValor)}

        FalhaTotal += parseInt(FalhaValor);
    }

    FalhaNome.sort(function(a, b) {
        return parseInt(b.Quantidade) - parseInt(a.Quantidade);
    });


    // console.log(FalhaNome.Nome);    
    nokTotal.val(FalhaTotal);
    total();


    // labelFalhas = [];
    // DataFalhas = [];
    // PerFalhas = [];

    var ie = 0;
    for (var i = 0; i < FalhaNome.length; i++){ 
        // if (FalhaNome[i].Quantidade !== 0){
            labelFalhas[i] = FalhaNome[i].Nome;
            DataFalhas[i] = FalhaNome[i].Quantidade;
            PerFalhas[i] = FalhaNome[i].Quantidade / parseInt(nokTotal.val()) * 100;
            // ie++;
        // }
    }

    myChart.update();
}));

const labels = labelFalhas;

const data = {
labels: labels,
datasets: [{
    label: 'Top Falhas',
    type: 'bar',
    backgroundColor: 'rgb(181, 14, 50)',
    data: DataFalhas,
    order: 2,
    yAxisID: 'y'
},
{
    label: 'Percentual Falhas',
    type: 'line',
    backgroundColor: 'rgb(27, 55, 99)',
    borderColor: 'rgb(27, 55, 99)',
    data: PerFalhas,
    borderWidth: 5,
    order: 1,
    yAxisID: 'y1'
}]};

const config = {
type: 'scatter',
data: data,
options: {
    maintainAspectRatio: false,
    responsive: true,
    scales: {
        y: {
          display: true,
          position: 'left',
        },
        y1: {
          display: true,
          position: 'right',
  
          // grid line settings
          grid: {
            drawOnChartArea: false, // only want the grid lines for one axis to show up
          },
        },
    },
    animation: {
        onComplete: () => {
          delayed = true;
        },
        delay: (context) => {
          let delay = 0;
          if (context.type === 'data' && context.mode === 'default' && !delayed) {
            delay = context.dataIndex * 300 + context.datasetIndex * 100;
          }
          return delay;
        }
    }
}
};

const myChart = new Chart(
document.getElementById('ChartParts'),
config
);


var ckPeriodo = $('#Periodo');

ckPeriodo.change( () =>{
    $('.input--data.ate').toggleClass('hidden');
    $('.labelAte').toggleClass('hidden');

    if (ckPeriodo.is(':checked')) {
        $('.labelDe').html('De:');
      } else {
        $('.labelDe').html('Dia:');
      }
});

$('.input--prod').change(() => {
    console.log('mudou')
    if ($('.input--prod.prod').val() !== 0  || $('.input--prod.prod').val() !== null){
        $('.salvar').removeAttr('disabled');
    }
});


$('.salvar').click(function () {
    
    


})

$('.salvar').attr('data-before', 'anything');

function popUp (texto, critico){
    var popUp = document.createElement('div');
    var titulo = document.createElement('span');

    popUp.classList.add('popUp');
    popUp.style.position = 'absolute';
    popUp.style.top = '50%';
    popUp.style.left = '50%';
    popUp.style.transform = 'translate(-50%, -50%)';

    titulo.classList.add('titulo--popUp');
    titulo.innerHTML = texto;

    document.body.appendChild(popUp);
    popUp.appendChild(titulo);
}


