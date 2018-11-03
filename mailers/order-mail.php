<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// set path to look
set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
// import file
require_once get_include_path()."initDatabase.php";
$db = new InitDatabase();  //create db and tables if not exists
$db->createDataBaseTables();
//Load Composer's autoloader
require 'vendor/autoload.php';

// Retrieve the email template required
$message = file_get_contents('templates/order-email-template.php');
$username = 'Samuel Atule';

// Replace the % with the actual information
$message = str_replace('%username%', $username, $message);
// get data from submitted form through php curl
$orders_data = explode('&', $_POST['orders_data']);

$total_price = $orders_data[0];
$orders_id = array_slice($orders_data, 1);
print_r($total_price);
print_r($orders_id);
// Loop through and retrieve food items into food message
foreach($orders_id as $id) {
    $orders = $db->selectItemByColumn($db->ak_orders_table, $db->orders_id, $id);
    // retrieve order with this id
    $order_item = $orders->fetch();
    // retrieve the onl;y the id of the order
    $food_item_id = $order_item['food_item_id'];
    //  get unservered food menu items from food menu table
    $unserved_food_item = $db->selectItemByColumn($db->ak_food_menu_table, $db->food_item_id, $food_item_id);
    // retrieve data
    $row = $unserved_food_item->fetch();
    // retrieve food items into food message
    $message = str_replace('%food_item'.$id.'%', $row["food_item"], $message);  // Get food items from database
    $message = str_replace('%item_price'.$id.'%', $row["price"], $message);  // Get item price from database
}

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
    $mail->addAddress('mustapha.yussif@ashesi.edu.gh', $username);     // Add a  

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'no-reply@takeaway.com';
    $mail->Body    = $message;
    // $mail->AltBody = strip_tags($message);

    $url = $_SERVER['DOCUMENT_ROOT'].'/takeaway-webtech/customer-dashboard.php'; 
    // $mail->send();
    header("Location:../customer-food-menu.php"); 
    
    echo 'Message has been sent ';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}