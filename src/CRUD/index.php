<?php

require ('./SQLServer.php');

$query      = $Conexao->query("SELECT * FROM Login.TabelaCadastros");
$tabela   = $query->fetchAll();

if (isset($_POST['Nome']) && isset($_POST['Sobrenome'])){
    $PostNome = $_POST['Nome'];
    $PostSobrenome = $_POST['Sobrenome'];


    $SQl = "INSERT INTO Login.TabelaCadastros (Nome, Sobrenome) VALUES ('$PostNome', '$PostSobrenome')";

    $Conexao->query($SQl);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_GET['id'])){
        if (isset($_POST['ModalExcluir'])) {
            $ID = $_GET['id'];

            $SQl = "DELETE FROM Login.TabelaCadastros WHERE ID = '$ID'";
            $Conexao->query($SQl);
            header("Location: ./index.php");
        } else if (isset($_POST['ModalCancel'])) {
            header("Location: ./index.php");
        }
     } 
} else {
        echo "<style>#ModalDelete{display:none !important;}</style>";
}

?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <style><?php include ('./style.css'); ?></style>

<?php if (!isset($_GET['id']) && !isset($_GET['delete'])) {
    echo "<style>#ModalDelete{display:none !important;}</style>";
} else {
    echo "<style>#ModalDelete{display:flex !important;}</style>";
}?>
<body>

<form action="" method="post" id="CRUD">
    <input type="text" name="Nome" placeholder="Nome" id="">
    <input type="text" name="Sobrenome" placeholder="Sobrenome" id="">
    <input type="email" name="Email" placeholder="Email" id="">
    <input type="submit" value="Sub" id='button'>
</form>

<table>
    <tr>
        <!-- <th></th> -->
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Email</th>
    </tr>

    <?php
        $i = 0;

        foreach ($tabela as $item){
            echo "<tr>";
            // echo "<td><input type='checkbox' name='ck_$i' class='checkbox $i'></td>";
            echo "<td>".$item['ID']."</td>";
            echo "<td>".$item['Nome']."</td>";
            echo "<td>".$item['Sobrenome']."</td>";
            echo "<td>".$item['Email']."</td>";
            echo "<td id='ButtonDel'><a href='index.php?delete=true&index=$i&id=".$item['ID']."' class='Delete'>X</a></td>";
            echo "</tr>";
            $i++;
        }
    ?>

</table>

<!-- <input type='submit' name='delete $i' value='X' class='Delete $i'> -->

<div id='ModalDelete'>
    <p>Tem certeza que quer excluir?</p>
    <span></span>
    <div>
        <form action="" method="post">
            <input type="submit" name="ModalCancel" class='btModal Cancel' value="Cancelar">
            <input type="submit" name="ModalExcluir"  class='btModal Excluir' value="Excluir">
        </form>
        <!-- <button type="button" class='btModal Cancel'>Cancelar</button>
        <button type="button" class='btModal Excluir'>Excluir</button> -->
    </div>
</div>

</body>
<style>#ModalDelete{display:block;}</style>
<script src="./script.js"></script>

</html>