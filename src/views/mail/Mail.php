<?php
namespace App\Mail;
use App\Controller;
class Mail
{
    public function send_code_email($email) {
        if (isset($_POST['btn-signup'])) {
            // Get form data
            $to = $_POST['to'];
            $subject = $_POST['subject'];
            $body = $_POST['body'];

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'youremail@gmail.com';
            $mail->Password = 'yourpassword';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('youremail@gmail.com', 'Your Name');
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message sent!';
            }
        }
    }

}