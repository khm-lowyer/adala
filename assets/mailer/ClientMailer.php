<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$name = $_POST['name'];
$phone=$_POST['phone'];
$email = $_POST['email'];
$country = $_POST['country'];
$message=$_POST['message'];
$mail = new PHPMailer(true);

try {
  //Server settings
  //$mail->SMTPDebug = 2;
  $mail->isSMTP();  
  $mail->CharSet = 'UTF-8';
  $mail->Host       = 'mail.tamwel.us';
  $mail->Username = "info@adala.capital";
  $mail->Password = "khm123456";
  $mail->SMTPAuth = false;
  $mail->SMTPSecure = false;
  $mail->SMTPAutoTLS = false;
  $mail->Port       = 25;
  $mail->Encoding     = "base64";

  //Recipients
  $mail->setFrom('info@adala.capital', 'مكاتب عدالة');
  $mail->addAddress('khm.lowyer@gmail.com'); 

  // Content
  $mail->isHTML(true);
  $mail->Subject = 'عميل جديد';
  $mail->Body    = 'اسم العميل: ' . $name . '<br> اميل العميل: ' . $email . '<br>رقم هاتف العميل: ' . $phone . '<br>البلد: ' . $country. '<br>القصة: ' . $message;
  $mail->AltBody = 'new';
  if ($mail->send()) {
    header("Location: /index.html");
    }
   else {
    header("Location: /index.html");
  }
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}