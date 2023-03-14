<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include 'config.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp-relay.sendinblue.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "pritesh.kody@gmail.com";                      //SMTP username
    $mail->Password   =  $password;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = "587";

    //Attachments
    $mail->addAttachment('invoice.pdf');



    //Content
    // $emailMessage = file_get_contents("template/email.html");
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is Your Invoice';
    $mail->Body    = "welcome";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->SMTPKeepAlive = true;

    $start_time = microtime(true);

    $mail->setFrom("no-reply@priteshyadav444.in", 'Pritesh Yadav');
    $mail->addReplyTo("pritesh.kody@gmail.com", 'Pritesh Yadav');
    for ($i = 0; $i < 1; $i++) {

        var_dump($mail->addAddress("pritesh.kody$i@gmail.com", 'Pritesh Yadav'));    //Add a recipient

        if (!$mail->send()) {
            echo 'Message Failed !!!' . PHP_EOL;
            break;
        }
        $mail->clearAddresses();
        echo 'Message has been sent' . PHP_EOL;
    }
    $end_time = microtime(true);
    $execution_time = ($end_time - $start_time);
    echo " Execution time: " . $execution_time . " seconds" . PHP_EOL;
    $mail->smtpClose();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
