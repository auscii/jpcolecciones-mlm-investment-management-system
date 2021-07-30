<?php

$msg = '<iframe width="560" height="315" src="https://www.youtube.com/embed/ZOSDVSCgIb0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>' ;

$msg = wordwrap($msg,70);

try {
    if (mail("webmobileappdeveloper@gmail.com","Video Test", $msg) or die("Unable to send the Email")) {
        $status = 'success';
        $msg = 'Mail sent successfully.';
    } else {
        $status = 'failed';
        $msg = 'Unable to send mail.';
    }
} catch(Exception $e) {
    $msg = $e->getMessage();
}

echo $status . "<br><br><br>" . $msg ;



?>
