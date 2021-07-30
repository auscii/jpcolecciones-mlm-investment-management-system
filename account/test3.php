<?php

$az1n1 = "299187122" ;
$az1n2 = "3fxfC1230" ;
$email = "administrator" ;
$test = $az1n1 . md5("admin". $email) . $az1n2 ;

echo $test ;

?>