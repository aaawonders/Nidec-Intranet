<?php 

require (__DIR__."/vendor/autoload.php");
include (__DIR__. '/get_auth_token.php');
include (__DIR__. '/Email_Criado/Body.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

date_default_timezone_set('America/Sao_Paulo');

if (isset($_GET['Email-Para']) && isset($_GET['Corpo'])){

    $Para = $_GET['Email-Para'];
    $CC = $_GET['Email-CC'];
    $Assunto = $_GET['Assunto'];
    $Corpo = $_GET['Corpo'];

    if ($Assunto == null) {
        $Assunto = 'Sem Assunto';
    }
}

// try{
    $mail = new PHPMailer();
    $mail->isSMTP();
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->AuthType = 'XOAUTH2';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = 'nidec.express@gmail.com';
    $mail->Password = '6ERt9TP9vmVeUWv';
    $mail->Port = 587;

    $provider = new Google(
        [
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]
    );

    $mail->setOAuth(
        new OAuth(
            [
                'provider' => $provider,
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'refreshToken' => $refreshToken,
                'userName' => $email,
            ]
        )
    );

    $mail-> SetFrom('nidec.express@gmail.com');
    $mail->addReplyTo('nidec.express@gmail.com');
    $mail->addAddress($Para);
    $mail->addCC ('andre.silva@nidec-gpm.com');
    // $mail->addAddress('andre.silva@nidec-gpm.com');

    $mail ->CharSet = "UTF-8"; 
    $mail->isHTML(true);
    $mail->Subject = $Ass;
    $mail->Body    = $Mail;
    // $mail->Subject = 'Assunto do email';
    // $mail->Body    = 'Este é o conteúdo da mensagem em <b>HTML!</b>';
    // $mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';

    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
        echo "Mensagem enviada para $Para";
        
        echo "<script>alert('Mensagem enviada para $Para');</script>";

        // header('location: Email.php');
        echo "<script>alert('Mensagem enviada para $Para');</script>";
    }

// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
