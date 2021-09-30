<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$name = $_POST['text-0'];
$country = $_POST['text-1'];
$age = $_POST['text-2'];
$gender = $_POST['text-3'];
$phone = $_POST['text-4'];
$email = $_POST['text-5'];
$addries = $_POST['text-6'];
$bank = $_POST['text-7'];
$bank_place = $_POST['text-8'];
$account = $_POST['text-9'];
$iban = $_POST['text-10'];
$loan_subject = $_POST['text-11'];
$loan_num = $_POST['text-12'];
$payment = $_POST['text-13'];
$time=$_POST['text-14'];
$job=$_POST['text-15'];
$story=$_POST['text-16'];
$mail = new PHPMailer(true);

try {
  //Server settings
  //$mail->SMTPDebug = 2;
  $mail->isSMTP();  
  $mail->CharSet = 'UTF-8';
  $mail->Host       = 'mail.tamwel.us';
  $mail->Username = "contact@tamwel.us";
  $mail->Password = "khm123456";
  $mail->SMTPAuth = false;
  $mail->SMTPSecure = false;
  $mail->SMTPAutoTLS = false;
  $mail->Port       = 25;
  $mail->Encoding     = "base64";

  //Recipients
  $mail->setFrom('contact@tamwel.us', 'استمارة طلب قرض');
  $mail->addAddress('khm.lowyer@gmail.com'); 
  // Content
  $mail->isHTML(true);
  $mail->Subject = 'عميل جديد';
  $mail->Body    = 'name: ' . $name . 
                    '<br>country: ' . $country . 
                    '<br>age: ' . $age . 
                    '<br>gender: ' . $gender. 
                    '<br>phone: ' . $phone. 
                    '<br>email: ' . $email. 
                    '<br>addries: ' . $addries. 
                    '<br>bank: ' . $bank. 
                    '<br>bank_place: ' . $bank_place. 
                    '<br>iban: ' . $iban. 
                    '<br>loan_subject: ' . $loan_subject. 
                    '<br>loan_num: ' . $loan_num.
                    '<br>payment: ' . $payment. 
                    '<br>time: ' . $time. 
                    '<br>job: ' . $job.
                    '<br>story: ' . $story;
  $mail->AltBody = 'new';
  if ($mail->send()) {
    echo "<script>
    alert('سيتم نحويلك الى الصفحه السابقه');
    window.close();</script>";
    }
   else {
    header("Location: /contact.html");
  }
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}