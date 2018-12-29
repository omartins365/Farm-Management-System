<?php
require_once 'PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['send']))
{
// Fetching data that is entered by the user
$email = $_POST['email'];
$password = $_POST['password'];
$to_id = $_POST['toid'];
$message = $_POST['message'];
$subject = $_POST['subject'];

// Configuring SMTP server settings
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;
$mail->FromName = "SoftAOX - PHP Mailer";

// Email Sending Details
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);

// Success or Failure
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p>'.$error.'</p>';
}
else {
echo '<p>Message sent!</p>';
}
}
else{
echo '<p>Please enter valid data</p>';
}
?>