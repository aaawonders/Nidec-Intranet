<?php

require ('./SQLServer.php');

$query      = $Conexao->query("SELECT * FROM Login.TabelaCadastros");
$tabela   = $query->fetchAll();

echo count($tabela);


if (isset($_POST['Nome']) && isset($_POST['Sobrenome'])){
    $PostNome = $_POST['Nome'];
    $PostSobrenome = $_POST['Sobrenome'];


    $SQl = "INSERT INTO Login.TabelaCadastros (Nome, Sobrenome) VALUES ('$PostNome', '$PostSobrenome')";

    $Conexao->query($SQl);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['id'])){
        
        echo '<br>'.$_GET['id'];
    } 
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
<body>

<form action="" method="post" id="CRUD">
    <input type="text" name="Nome" placeholder="Nome" id="">
    <input type="text" name="Sobrenome" placeholder="Sobrenome" id="">
    <input type="email" name="Email" placeholder="Email" id="">
    <input type="submit" value="Sub" id='button'>
</form>

<table>
    <tr>
        <th></th>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Email</th>
    </tr>

    <?php
        $i = 0;

        foreach ($tabela as $item){
            echo "<tr>";
            echo "<td><input type='checkbox' name='ck_$i' class='checkbox $i'></td>";
            echo "<td>".$item['ID']."</td>";
            echo "<td>".$item['Nome']."</td>";
            echo "<td>".$item['Sobrenome']."</td>";
            echo "<td>".$item['Email']."</td>";
            echo "<td id='ButtonDel'><a href='index.php?delete=true&id=$i' class='Delete'>X</a></td>";
            echo "</tr>";

            $i++;
        }
    ?>

</table>

<!-- <input type='submit' name='delete $i' value='X' class='Delete $i'> -->

<div id='ModalDelete' style='display: none;'>
    <p>Tem certeza que quer excluir?</p>
    <div>
        <button type="button" class='btModal Cancel'>Cancelar</button>
        <button type="button" class='btModal Excluir'>Excluir</button>
    </div>
</div>

</body>
<style>#ModalDelete{display:block;}</style>
<script src="./script.js"></script>

</html>