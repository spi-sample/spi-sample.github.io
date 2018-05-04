<?php

$Email = $_POST['Email'];
$Message = $_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
                                    // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'gangabagga@yahoo.in';                 // SMTP username
    $mail->Password = 'cnyq ppax wzcn sibs';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('gangabagga@yahoo.in', 'Mailer');
    $mail->addAddress('gangasinghbagga@gmail.com', 'Joe User');     // Add a recipient
    

    //body
    $body = '<p>
    <p>You have a new message</p>
    <ul>
        
        <li>Email: </li>' . $Email .
        
        '<li>Message: </li>' . $Message . "</p>";
     

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'testing';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

    echo "<p style='color:black; font-size:250%; text-align:center; margin-top:10%;'>".'Thank you for contacting us.'.'<br>'.' We will get back to you'.'<br>'."<a href='https://spi-sample.github.io/index.html'>"."<button style='font-size:100%; margin-top:5%; cursor:pointer;'>".'Back to hack'.'</button>'."</a>"."</p>";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>