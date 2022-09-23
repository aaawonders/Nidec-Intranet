<?php

require (__DIR__.'/../../MySQL/MySQLInteract.php');

if (isset($_GET['Token'])) {
    $Token = $_GET['Token'];
    $ss = decodeToken($Token);

    $Nome = $ss[2];

    $conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 

    $sql = "SELECT * FROM senhas WHERE Token = '$Token'";

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    if ($QuantPass == 0) {
        die('<h1>Falha: Token Inválido</h1>');
    }

} else{
    die('<h1>Falha: Sem Token</h1>');
}


function ValidarSenha($Senha){

    if (!is_numeric($Senha)){
        return "Senha sem números";
    }

    $uppercase = preg_match('@[A-Z]@', $Senha);
    $lowercase = preg_match('@[a-z]@', $Senha);
    $number    = preg_match('@[0-9]@', $Senha);
    $specialChars = preg_match('@[^\w]@', $Senha);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['CriarSenha']) < 8) {
        return "Não Passou";
    } else {
        return "Passou";
    }
}


function decodeToken($Token) {
    $Token = base64_decode($Token);

    $ss = explode('&', $Token);

    return $ss;
}

?>

<style><?php include (__DIR__.'/style.css'); ?></style>


<div id="Recover">
    <h1>Olá <?php echo $Nome;?></h1>
    <br>
    <p>Para recuperar sua conta, digite uma senha válida para os padrões de segurança</p>

    <div class="form">
        <form action="" method='post'>
            <input type="hidden" name="Token" value="<?php echo $Token;?>">
            <input type="password" name="Senha1" class="Senha1" placeholder='Digite a senha'>
            <input type="password" name="Senha2" class="Senha2" placeholder='Repita a senha'>
            <input type="submit" class="SubSenha" value="Alterar">
        </form>
    </div>
</div>




<script>
var Senha1 = document.getElementsByClassName('Senha1')[0];
    var Senha2 = document.getElementsByClassName('Senha2')[0];

    Senha1.addEventListener('input', () =>{
        if (Senha1.value.length >= 8) {
            Senha2.classList.add('active');
        } else if (Senha2.value.length < 8) {
            Senha2.classList.remove('active');
        }
    });
    
</script>