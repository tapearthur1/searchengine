<?php
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->IsHTML(true);


$mail->SMTPAuth = true;
$mail->Username = "tapearthur1@gmail.com";
$mail->Password = "25K-eUS-JHY-vph";

//Sender Info
$mail->From = "no-reply@ictdesignhub.com";
$mail->FromName = "User Authentication";
