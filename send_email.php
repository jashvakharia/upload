<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toEmail = $_POST['toEmail'];
    $subject = $_POST['subject'];
    $message = nl2br($_POST['message']);


    $customMessage = "<h2><strong>ssup,</strong></h2>
                      <p style='font-size: 16px;'><strong>your file is attached with whatever message you sent!</strong></p>";

    $fullMessage = $customMessage . "<p style='font-size: 14px;'>" . $message . "</p>
                                      <p><strong>ggs, <br>jash.</strong></p>";

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@example.com';
        $mail->Password = 'example123@';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('contact@example.com', 'Jash Vakharia');
        $mail->addAddress($toEmail);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $fullMessage;

        if (!empty($_FILES['attachment']['tmp_name'])) {
            $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        }

        if ($mail->send()) {
            echo "Email sent successfully!";
        } else {
            echo "Email sending failed.";
        }

    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid Request";
}
?>
