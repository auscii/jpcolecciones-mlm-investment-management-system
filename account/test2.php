<?php

// $az1n1 = "299187122" ;
// $az1n2 = "3fxfC1230" ;
// $password = "izi69" ;
// $email = "webmobileappdeveloper@gmail.com" ;
// $test = $az1n1 . hash('sha256', $password.$email) . $az1n2 ;


// $az1n1 = "299187122" ;
// $az1n2 = "3fxfC1230" ;
// $password = "admin" ;
// $test = $az1n1 . hash('sha256', $password.'administrator@izi69.biz') . $az1n2 ;


//$az1n1 = "299187122" ;
//$az1n2 = "3fxfC1230" ;
//$password = "izi69" ;
//$email = "skriptninja@gmail.com" ;
//$test = $az1n1 . hash('sha256', $password.$email) . $az1n2 ;

$az1n1 = "299187122" ;
$az1n2 = "3fxfC1230" ;
$password = "izi69" ;
$email = "johnyminnen@yahoo.co.uk" ;
$test = $az1n1 . hash('sha256', $password.$email) . $az1n2 ;

echo $email . "<br><br>" ;
echo $test ;

?>
