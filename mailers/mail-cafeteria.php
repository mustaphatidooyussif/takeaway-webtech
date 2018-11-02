<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// // Retrieve the email template required
$user_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$_SESSION['mail_sent'] = true;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  //Sendgrid:smtp.sendgrid.net// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'takeawayproject112@gmail.com';                //Google: takeawayproject112@gmail.com  // SMTP username
    $mail->Password = 'takeawayproject';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Sender
    $mail->setFrom('takeawayproject112@gmail.com', 'Take Away Team');

    //Recipients
    $mail->addAddress($user_email);     // Add a
    

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    // $mail->AltBody = strip_tags($message);

    $mail->send();
    //header("Location:../mustapha-dashboard.php"); 
    
    echo 'Message has been sent ';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}