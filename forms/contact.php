<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
$name=$_POST['name'];
$subject=$_POST['subject'];
$email=$_POST['email'];
$message=$_POST['message']; 
$messagecontent ="Name = ". $name . "<br>Subject = " . $subject . "<br>Email = " . $email . "<br>Message =" . $message;

$mail = new PHPMailer(true);
                     
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.siteprotect.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'loumagui@toroventuresus.com';                 // SMTP username
$mail->Password = 'Two+seven=9';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//Recipients
$mail->setFrom('loumagui@toroventuresus.com');
$mail->addAddress('loumagui@toroventuresus.com');     // Add a recipient
$mail->addCC('sanbirtrading2016@gmail.com');
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Message from Customer';
$mail->Body    = $messagecontent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>