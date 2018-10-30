<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// Retrieve the email template required
$message = file_get_contents('templates/order-email.html');
$username = 'Mustapha';
$food_item = 'Banku';
$item_price = '9.00';

// Replace the % with the actual information
$message = str_replace('%username%', $username, $message);
$message = str_replace('%food_item%', $food_item, $message);  //TODO: Get food items from database.
$message = str_replace('%item_price%', $item_price, $message);  //TODO: Get item price from database.

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

    //Recipients
    $mail->setFrom('takeawayproject112@gmail.com', 'Take Away Team');

    //TODO: Get recipient email from the database
    $mail->addAddress('takeawayproject112@gmail.com', $username);     // Add a 

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'no-reply@takeaway.com';
    $mail->Body    = $message;
    // $mail->AltBody = strip_tags($message);

    $url = $_SERVER['DOCUMENT_ROOT'].'/takeaway-webtech/customer-dashboard.php'; 
    $mail->send();
    header("Location:../customer-order-alert.php"); 
    
    echo 'Message has been sent ';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}