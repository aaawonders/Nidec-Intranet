
$('.form--area').submit(function (e) { 
    e.preventDefault();
    
    var tkTitulo = $('.form--input--title').val();
    // var tkTicket = $('.form--input--ticket').val();
    var tkCat = $('input[name=radioCat]:checked').val();
    var tkFile = $('.file--annex--area').val();
    var tkDesc = $('.form--desc--area').val();


    $.ajax({
        type: "post",
        url: "ticket/GerarTicket.php",
        data: {Titulo: tkTitulo, Categoria: tkCat, Arquivo: tkFile, Descricao: tkDesc},
        // dataType: "dataType",
        success: function (response) {
            var tkTicket = response.split('Ticket criado ')[1];
            $('.form--div').html(
                `<div class='form--sucess'> 
                <h1>Ticket <span># ${tkTicket}</span> criado</h1>


                </div>`
            );
        },
        error: function (response){
            console.log(response);
        }
    });
});