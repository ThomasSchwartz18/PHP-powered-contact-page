<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    

    function send_mail($recipient, $subject, $message) {
        // get sender's email
        $sender = $_POST['sender'];
        //create new mailer obj
        $mail = new PHPMailer();
        $mail -> isSMTP();

        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = TRUE;
        $mail ->SMTPSecure = 'tls';
        $mail ->Port = 587;
        $mail ->Host = "smtp.gmail.com";
        $mail ->Username = "thomas5818id@gmail.com";
        $mail ->Password = "waqpopmyeiagubbf";
        
        $mail ->isHTML(true);
        $mail ->addAddress($recipient, "recipient-name");
        $mail ->setFrom("thomas5818id@gmail.com", $sender);
        $mail ->Subject = $subject;
        $content = $message;

        $mail->msgHTML($content);
        if(!$mail->Send()) {
            echo '<span style="color: red;">Error while sending email.</span>';
            return false;
        } else {
            // echo "Email sent successfully!";
            return true;
        }
    }

?>