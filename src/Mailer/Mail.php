<?php 

require ("./vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;


// try{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'nidec.express@gmail.com';
    $mail->Password = '6ERt9TP9vmVeUWv';
    $mail->Port = 587;

    $mail-> SetFrom('nidec.express@gmail.com');
    $mail->addReplyTo('nidec.express@gmail.com');
    $mail->addAddress('andre.silva@nidec-gpm.com');

    $mail->isHTML(true);
    $mail->Subject = 'Assunto do email';
    $mail->Body    = 'Este é o conteúdo da mensagem em <b>HTML!</b>';
    $mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';

    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
        echo 'Mensagem enviada.';
    }


// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
