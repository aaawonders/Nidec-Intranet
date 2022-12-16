<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar Problema</title>
    <link rel="icon" href="/nidec/assets/img/favicon.ico" type="image/ico">
</head>
<style><?php include(__DIR__.'/Report.css');?></style>
<body>

<header>
    <?php 
        include (__DIR__.'/../MainHeader/MainHeader.php');
    ?>
</header>

<div class="form--div">
    <form action="" method='post' class="form--area">
        <div class="form--info form--field">
            <!-- <div class="form--ticket--info">
                <span >#</span>
                <input disabled type="text" class="form--input--ticket" name='ticketID' value='152'>
            </div> -->
            <div class="form--ticket--title form--input--div">
                <label for="">Qual o problema?</label>
                <input type="text" name='ReportTitle' class="form--input--title">
            </div>
        </div>

        <div class="form--radio--categoria form--field">
            <span>Qual a categoria?</span>
            <div class="form--radio--list  form--input--div">
                <div class="radio--cat1">
                    <input type="radio" name="radioCat" class='radio--cat' value='Interface'>
                    <label for="">Interface</label>
                </div>
                <div class="radio--cat2">
                    <input type="radio" name="radioCat" class='radio--cat' value='AddFuncao'>
                    <label for="">Adição de função</label>
                </div>
                <div class="radio--cat3">
                    <input type="radio" name="radioCat" class='radio--cat' value='BugFuncao'>
                    <label for="">Problema de ação</label>
                </div>
            </div>
        </div>
        <div class="form--annex form--field">
            <label for="">Envie um anexo</label>
            <input type="file" name="FileAnnex" accept="image/*" class='file--annex--area'>
        </div>
        <div class="form--desc form--input--div form--field">
            <label for="">Descrição do Problema</label>
            <textarea name="DescReport" class='form--desc--area' cols="30" rows="10"></textarea>
        </div>

        <?php
            // if (isset($_SESSION['nome']) && isset($_SESSION['InternID'])){

            // }

            echo "<input type='hidden' class='form--name--req' name='Nome' value='André'>";
            echo "<input type='hidden' class='form--email--req' name='Nome' value='AAAAA@gmail.com'>";
        ?>

        <input type="submit" class='input--report--submit' value="Enviar Ticket">
    </form>
</div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="./Report.js"></script>

</html>


