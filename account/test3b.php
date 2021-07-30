<?php

$az1n1 = "299187122" ;
$az1n2 = "3fxfC1230" ;
$email = "webmobileappdeveloper@gmail.com" ;
$test = $az1n1 . hash('sha256', "admin".$email)  . $az1n2 ;

echo $test ;

?>
