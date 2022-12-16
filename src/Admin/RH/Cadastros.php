<?php

    // if (!isset($_SESSION['Nome'])){
    //     header('location: ./../../../index.php');
    // }

    require_once(__DIR__. '/../../MySQL/MySQLInteract.php');

    $sql = "SELECT * FROM perfil" ;

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    while($row = mysqli_fetch_array($result)){
        $Nome[] = $row['Nome'];
        $Sobrenome[] = $row['Sobrenome'];
        $Aniversario[] = $row['Aniversário'];
        $Email[] = $row['Email'];
        $Genero[] = $row['Genero'];
        $ID[] = $row['ID'];
    }


?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Colaborador</title>
    <link rel="icon" href="/nidec/assets/img/favicon.ico" type="image/ico">
</head>
<style><?php include (__DIR__.'/cadastros.css');?></style>
<body>

<header>
    <?php 
        include (__DIR__.'/../../MainHeader/MainHeader.php');
    ?>
</header>

<div class="Admin">
    <h1>Cadastros de Colaboradores</h1>

    <div class="Admin--List">
        <div class="Admin--form">
            <form action="" class="Form" method="post">
                <input type="text" name="Nome" class="NomeInput" placeholder='Nome'>
                <input type="text" name="Sobrenome" class="SobrenomeInput" placeholder='Sobrenome'>
                <input type="email" name="Email" class="EmailInput" placeholder='Email'>
                <input type="date" name="Niver" class="NiverInput" placeholder='Aniversário'>
                <div class="Genero">
                    <label for="">M</label>
                    <input type="radio" name="GeneroInput" id="" value='M'>
                    <label for="">F</label>
                    <input type="radio" name="GeneroInput" id="" value='F'>
                </div>
                <input type="submit" class="submit" value="+">
            </form>
        </div>
        <div class="Admin--Table">
            <div class="TableRow Colab--Header">
                <div class="Cell Head Head--"></div>
                <!-- <div class="Cell Head Head--Foto">Foto</div> -->
                <div class="Cell Head Head--Nome">Nome</div>
                <div class="Cell Head Head--Sobrenome">Sobrenome</div>
                <div class="Cell Head Head--Email">Email</div>
                <div class="Cell Head Head--Aniversario">Aniversario</div>
                <div class="Cell Head Head--Genero">Genero</div>
                <div class="Cell Head Head--Null"></div>
            </div>
            <?php
                if ($QuantPass > 0){
                    
                    for ($i = 0; $i < $QuantPass; $i++){

                        $id = $i + 1;

                        echo "<div class='TableRow Colab--Row Colab$id' edit='false'>";
                        echo "<div class='Cell Value Cell--Sel id$id'><input type='checkbox' name='ck$id' id=''></div>";
                        echo "<div class='Cell Value Cell--Nome id$id'>$Nome[$i]</div>";
                        echo "<div class='Cell Value Cell--Sobrenome id$id'>$Sobrenome[$i]</div>";
                        echo "<div class='Cell Value Cell--Email id$id'>$Email[$i]</div>";
                        echo "<div class='Cell Value Cell--Aniversario id$id'>$Aniversario[$i]</div>";
                        echo "<div class='Cell Value Cell--Genero id$id'>$Genero[$i]</div>";
                        echo "<div class='Cell Value Cell--Edit id$id'>";
                        echo "    <form method='post' class='cell--Tools id'' id='id$id'>";
                        echo "        <input type='hidden' class='dbid$id' name='id' value='$ID[$i]'>";
                        echo "        <input type='submit' class='Edit id$id' value='Edit'>";
                        echo "        <input type='submit' class='Delete id$id' value='Del'>";
                        echo "    </form>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            ?>            

            
            <!-- <div class="TableRow Colab--Row Colab1" edit='false'>
                <div class="Cell Value Cell--Sel id1"><input type="checkbox" name="ck1" id=""></div>
                <div class="Cell Value Cell--Foto id1">
                    <div class="circle--foto">
                        <div class="foto">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="Cell Value Cell--Nome id1">Nome</div>
                <div class="Cell Value Cell--Sobrenome id1">Sobrenome</div>
                <div class="Cell Value Cell--Email id1">Email@gmail.com</div>
                <div class="Cell Value Cell--Aniversario id1">30/09/2022</div>
                <div class="Cell Value Cell--Genero id1">Masculino</div>
                <div class="Cell Value Cell--Edit id1">
                    <form method="post" class="cell--Tools id1" id="id1">
                        <input type="hidden" name="id" value="1">
                        <input type="submit" class="Edit id1" value="Edit">
                        <input type="submit" class="Delete id1" value="Del">
                    </form>
                </div>
            </div> -->
            

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="/nidec/src/admin/rh/Cadastrar.js"></script>

</body>
</html>