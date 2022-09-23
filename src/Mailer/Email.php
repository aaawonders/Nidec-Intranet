<?php



?>

<style>
    form {
        display: flex;
        flex-direction: column;
        width: 20%;
        padding: 15px;
        justify-content: space-between;
        align-items: center;
    }
    form input{
        padding: 5px;
        margin: 5px;
    }

    form input[type="submit"]{
        background-color: rgb(0,0,255);
        color: white;
        border: none;
        width: 40%;
        padding: 8px 15px;
        cursor: pointer;
    }
</style>


<form action="mail.php" method="get">

    <input type="email" name="Email-Para" id="" placeholder="Para">
    <input type="text" name="Email-CC" id="" placeholder="CC">
    <input type="text" name="Assunto" id="" placeholder="Assunto">
    <textarea name="Corpo" id="" cols="30" rows="10" placeholder="Corpo"></textarea>

    <input type="submit" value="Enviar">

</form>

