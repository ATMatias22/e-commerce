<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$to = "jp7592469@gmail.com";
$from = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$cmessage = $_POST['message'];
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 0;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'jp7592469@gmail.com';                     //SMTP username
  $mail->Password   = 'asd';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
  $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('jp7592469@gmail.com', 'Relojeria');     //Add a recipient
  $mail->addAddress($from, $name);

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $subject;
  $mail->Body    = $cmessage;

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>














