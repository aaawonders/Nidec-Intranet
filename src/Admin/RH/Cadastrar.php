<?php


// if (isset($_POST['Nome'])){

    $Nome = $_POST['Nome'];
    $Sobrenome = $_POST['Sobrenome'];
    $Aniversario = $_POST['Aniversario'];
    $Email = $_POST['Email'];
    $Genero = $_POST['Genero'];

    require_once(__DIR__. '/../../MySQL/MySQLInteract.php');

    $sql = "SELECT * FROM perfil WHERE Nome='$Nome' AND Sobrenome='$Sobrenome'" ;

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    if($QuantPass == 0){
        date_default_timezone_set('America/Sao_Paulo');
        $Data = date('Y-m-d H:i:s',time());

        $sql = " INSERT INTO `perfil` (`Nome`, `Sobrenome`, `Email`, `Aniversário`, `Genero`, `Data_Criacao`) 
        VALUES ('$Nome', '$Sobrenome', '$Email', '$Aniversario', '$Genero', '$Data')";

        mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

        $sql = "SELECT MAX(ID) FROM perfil";

        $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

        while($row = mysqli_fetch_array($result)){
            $Max[] = $row['MAX(ID)'];
        }

        $id = $Max[0];

        echo "<div class='TableRow Colab--Row Colab$id' edit='false'>";
        echo "<div class='Cell Value Cell--Sel id$id'><input type='checkbox' name='ck$id' id=''></div>";
        echo "<div class='Cell Value Cell--Nome id$id'>$Nome</div>";
        echo "<div class='Cell Value Cell--Sobrenome id$id'>$Sobrenome</div>";
        echo "<div class='Cell Value Cell--Email id$id'>$Email</div>";
        echo "<div class='Cell Value Cell--Aniversario id$id'>$Aniversario</div>";
        echo "<div class='Cell Value Cell--Genero id$id'>$Genero</div>";
        echo "<div class='Cell Value Cell--Edit id$id'>";
        echo "    <form method='post' class='cell--Tools id'' id='id$id'>";
        echo "        <input type='hidden' name='id' value='$id'>";
        echo "        <input type='submit' class='Edit id$id' value='Edit'>";
        echo "        <input type='submit' class='Delete id$id' value='Del'>";
        echo "    </form>";
        echo "</div>";
        echo "</div>";
    }
// }