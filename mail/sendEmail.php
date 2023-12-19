<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_REQUEST['full_name']) || empty($_REQUEST['email']) || empty($_REQUEST['message'])) {
        $notifications = [];
        if (empty($_REQUEST['full_name'])) {
            $notifications[] = 'Tên người gửi';
        }
        if (empty($_REQUEST['email'])) {
            $notifications[] = 'Email';
        }
        if (empty($_REQUEST['message'])) {
            $notifications[] = 'Nội dung';
        }
        if (!empty($notifications)) {
            $notification = 'Bạn cần nhập ' . implode(', ', $notifications);
        }
    } else {
        try {
            $full_name = $_REQUEST['full_name'];
            $email = $_REQUEST['email'];
            $message = $_REQUEST['message'];
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
            $mail->isSMTP(); // gửi mail SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'techdevice666@gmail.com'; // SMTP username
            $mail->Password = 'fhlo apma jccr bwgs'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('techdevice666@gmail.com', 'Tech Device');
            $mail->addAddress('minhgiap1357@gmail.com', 'Tech Infor');
            // $mail->addAddress('ellen@example.com'); 
            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('techdevice666@gmail.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 

            // Content
            $mail->ErrorInfo;
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = 'Contact from customer !';
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Customer Email</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        color: #333;
                        margin: 20px;
                    }
                    .email-container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                    }
                    h1{
                        margin-bottom: 15px;
                    }
                </style>
            </head>
            <body>
                <div class="email-container">
                    <h1>Phản hồi từ khách hàng !</h1>
                    <p><b>Gửi từ:</b> ' . $full_name . ' (' . $email . ')</p>
                    <p><b>Nội dung:</b> ' . $message . '</p>
                </div>

            </body>
            </html>
            ';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $success = 'Gửi thành công !';
        } catch (Exception $e) {
            $notification = 'Đã xảy ra lỗi vui lòng thử lại !';
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
