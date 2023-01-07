<?php

    include "mail.php";
    //send_mail($recipient, $subject, $message);
    if (count($_POST) > 0)
    {
        $recipient = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if(empty($recipient)) {
            $error .= "recipient can not be empty <br />";
        }
        if(empty($subject)) {
            $error .= "subject can not be empty <br />";
        }
        if(empty($message)) {
            $error .= "message can not be empty <br />";
        }

        // if something was posted
        if (send_mail($recipient, $subject, $message))
        {
            $successMeassage = "Message sent!";
        } else 
        {
            $successMeassage = "Message NOT sent!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>

    <!-- These links (FontAwesome and Google) are used for Icons -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />

    <!-- CSS Styling -->
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <div class="wrapper">    
    
        <form method="post">
            <header>Send Gmail</header>
            <div>
                <?php if($error != ""):?>
                    <span style="color: red;"><?=$error?></span>
                <?php endif;?>
                <?php if(send_mail($recipient, $subject, $message)):?>
                    <span style="color: #0d6efd;"><?=$successMeassage?></span>
                <?php endif;?>
            </div>
            <div class="dbl-field">       
                <div class="field">                
                    <input type="text" name="email" placeholder="Recipient's Email"><br />
                    <i class="fas fa-envelope"></i>
                </div>     
                <div class="field">                
                    <input type="text" name="sender" placeholder="Your Email"><br />
                    <i class="fas fa-envelope"></i>
                </div>     
                <div class="field">
                    <input type="text" name="subject" placeholder="Subject"><br />
                    <i class="fas fa-globe"></i>
                </div>
            </div>
            <div class="message">
                <textarea type="text" name="message" placeholder="Write your message"></textarea><br />
                <i class="material-icons">message</i>
            </div>
            <div class="button-area">
                <button type="submit">Send Message</button>
            </div>
        </form>

    </div>

    <!-- <div class="wrapper">
      <header>Send us a Message</header>
      <form action="message.php" method="POST">
        <div class="dbl-field">
          <div class="field">
            <input type="text" name="subject" placeholder="Subject" />
            <i class="fas fa-user"></i>
          </div>
          <div class="field">
            <input type="text" name="email" placeholder="Enter your email" />
            <i class="fas fa-envelope"></i>
          </div>
        </div>

        <div class="message">
          <textarea placeholder="Write your message" name="message"></textarea>
          <i class="material-icons">message</i>
        </div>
        <div class="button-area">
          <button type="submit">Send Message</button>
          <span>Sending your message...</span>
        </div>
      </form>
    </div> -->

</body>
</html>