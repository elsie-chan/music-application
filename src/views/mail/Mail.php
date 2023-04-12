<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
class Mail
{
    public static function send_code_to_email($email, $username) {
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom(env('MAIL'), 'MISC');
            $mail->addAddress($email, $username);
            $random_number = rand(1000, 9999);
            $_SESSION['number'] = $random_number;
            $mail->isHTML(true);
            $mail->Subject = 'Verification Code';
            $mail->Body    ="<h3>Your Verification Code</h3>" . $random_number;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not sent. Mailer Error: " . $mail->ErrorInfo;
            return false;
        }
    }

}