<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// If necessary, modify the path in the require statement below to refer to the
// location of your Composer autoload.php file.
require 'phpmailer_vendor/autoload.php';

function SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $body, $attachment = NULL)
{

  // Replace smtp_username with your Amazon SES SMTP user name.
  $AWS_SMTP_UN = 'noreply@sidbi.in';
  // Replace smtp_password with your Amazon SES SMTP password.
  $AWS_SMTP_PWD = 'Siwqtejgtt$@#16548';
  $SMTP_HOST = 'smtp.office365.com';
  $SMTP_PORT = 587;

  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->isSMTP(true); // Set mailer to use SMTP
    $mail->SetFrom($send_from, $sender_name);
    $mail->Username = $AWS_SMTP_UN; // SMTP username
    $mail->Password = $AWS_SMTP_PWD; // SMTP password
    $mail->Host = $SMTP_HOST; // Specify main and backup SMTP servers
    $mail->Port = $SMTP_PORT; //  465 - https | 587 - http | 2465 - AWS CLOUD
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->AddAddress($to);
    if ($Bcc) :
      $mail->AddBcc($Bcc);
    endif;
    if ($cc) :
      $mail->addCC($cc);
    endif;
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    if ($attachment) :
      $mail->addAttachment($attachment);
    endif;
    $send = $mail->Send();
    // echo "Email sent!", PHP_EOL;
  } catch (Exception $e) {
    // echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
  } catch (Exception $e) {
    // echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
  }
}

