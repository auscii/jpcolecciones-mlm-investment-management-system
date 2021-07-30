<?php

$az1n1 = "299187122" ;
$az1n2 = "3fxfC1230" ;

$u = "webmobileappdeveloper@gmail.com" ;
$u = trim(htmlentities(strip_tags($u)));
$u = stripslashes($u);	

$p = "admin" ;
$p = trim(htmlentities(strip_tags($p)));	
$p = $az1n1 . hash('sha256', stripslashes($p).$u) . $az1n2 ;

echo $u . "<br>" . $p . "<br>" . "299187122a8ed4948ae3c3c6fbe7cd0b3f0ed83dc5e557ee7c302188749c46b3e824d76563fxfC1230";
?>