
$('.Form').submit(function (e) { 
    e.preventDefault();
    
    var nome = $('.NomeInput').val() == undefined ? '' : $('.NomeInput').val();
    var sobrenome = $('.SobrenomeInput').val()== undefined ? '' : $('.SobrenomeInput').val();
    var aniversario = $('.NiverInput').val() == undefined ? '' : $('.NiverInput').val();
    var genero = $('.GeneroInput').val()== undefined ? '' : $('.GeneroInput').val();
    var email = $('.EmailInput').val()== undefined ? '' : $('.EmailInput').val();

    $.ajax({
        type: "post",
        url: "./rh/cadastrarCad",
        data: {Nome: nome, Sobrenome: sobrenome, Aniversario: aniversario, Genero: genero, Email: email},
        success: function (response) {
            
            console.log(response);
            $('.Admin--Table').html($('.Admin--Table').html() + response);
        },
        error: function (response) {
            console.log(response);
        }
    });

});


$('.cell--Tools').submit(function (e) { 
    e.preventDefault();

    var id = $(this).closest("form").attr('id').split('id')[1];

    var Trigger = e.originalEvent.submitter.value;

    function EditToggle(){
        var EditPass = $('.Colab--Row').attr('edit');

        if (EditPass == 'false'){
            $('.Colab--Row').attr('edit','true');
        } else if (EditPass == 'true'){
            $('.Colab--Row').attr('edit','false');
        }
    }
    

    if (Trigger === 'Edit'){

        var nome =  $('.Cell--Nome.id' + id).html();
        var sobrenome =  $('.Cell--Sobrenome.id' + id).html();
        var Email =  $('.Cell--Email.id' + id).html();
        var Niver =  $('.Cell--Aniversario.id' + id).html();

        $('.Colab--Row.id' + id).attr('edit','true');
        $('.Cell--Nome.id' + id).html(`<input type='text' name='Nome' class='Nome-Edit id${id}' placeholder='Nome' value='${nome}'>`);
        $('.Cell--Sobrenome.id' + id).html(`<input type='text' name='Sobrenome-Edit' class='Sobrenome-Edit id${id}' placeholder='Sobrenome' value='${sobrenome}'>`);
        $('.Cell--Email.id' + id).html(`<input type='email' name='Email' class='Email-Edit id${id}' placeholder='Email' value='${Email}'>`);
        $('.Cell--Aniversario.id' + id).html(`<input type='date' name='Niver' class='Niver-Edit id${id}' placeholder='Niver' value='${Niver}'>`);
        $('.circle--foto').addClass('InEdit');

        $('.circle--foto').click(function (){
            console.log('teste');
        })

        $('.Edit.id' + id).val('Pronto');
        $('.Edit.id' + id).addClass('InEdit');
        $('.Delete.id' + id).css('display', 'none');
        $('.cell--Tools.id' + id)
        $('.cell--Tools.id' + id).addClass('Editando');

    } else if (Trigger === 'Del'){
       

        
        console.log('Foi Deletado');


    } else if( Trigger === 'Pronto'){

        var nomeAntigo = nome;
        var sobrenomeAntigo = sobrenome;

        var nome =  $('.Nome-Edit.id' + id).val();
        var sobrenome = $('.Sobrenome-Edit.id' + id).val();
        var email =  $('.Email-Edit.id' + id).val();
        var Niver =  $('.Niver-Edit.id' + id).val();
        var dbID =  $('.dbid' + id).val();

        $.ajax({
            type: "post",
            url: "./rh/editarCad",
            data: {ID: dbID, Nome: nome, Sobrenome: sobrenome, Aniversario: Niver, Email: email},
            dataType: 'json',
            success: function (response) {
                
            },
            error: function (error) {
                console.log(error);
            }
        });

        $('.Colab--Row.id' + id).attr('edit','false');
        $('.Edit.id' + id).val('Edit');
        $('.Edit.id' + id).removeClass('InEdit');
        $('.circle--foto').removeClass('InEdit');
        $('.Delete.id' + id).removeAttr('style', '');
        $('.Cell--Nome.id' + id).html(nome);
        $('.Cell--Sobrenome.id' + id).html(sobrenome);
        $('.Cell--Email.id' + id).html(email);
        $('.Cell--Aniversario.id' + id).html(Niver);


    }
});




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