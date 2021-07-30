<?php

$newpassword=randomPassword() ;
$emailaddress="webmobileappdeveloper@gmail.com"

$YOUR_WEBSITE = "izi69.biz";
$email_of_the_sender_from_your_website = "supportteam@izi69.biz";
$your_email_address = $emailaddress ;
$your_email_subject = "izi69 Members Forgot Password";
$message_from_the_sender_of_your_website = "This is your temporary password: $newpassword" ;
$mime_boundary = "$YOUR_WEBSITE".md5(time());
$headers = "From: ".$email_of_the_sender_from_your_website."\n";
$headers .= "Reply-To: ".$email_of_the_sender_from_your_website."\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
$message = "--$mime_boundary\n";
$message .= "Content-Type: text/plain; charset=UTF-8\n";
$message .= "Content-Transfer-Encoding: 8bit\n\n";
$message .= $message_from_the_sender_of_your_website."\n\n";
$message .= "--$mime_boundary--\n\n";
//$mail_sent = mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email");

try {
    if (mail( $your_email_address, $your_email_subject, $message, $headers ) or die("Unable to send the Email")) {
        $status = 'success';
        $msg = 'Mail sent successfully.';
    } else {
        $status = 'failed';
        $msg = 'Unable to send mail.';
    }
} catch(Exception $e) {
    $msg = $e->getMessage();
}


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
 return implode($pass); //turn the array into a string
}

?>