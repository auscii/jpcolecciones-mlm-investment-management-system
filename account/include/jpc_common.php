<?php

$az1n1 = "299187122" ;
$az1n2 = "3fxfC1230" ;
$serverdirectory="http://localhost/jpcolecciones/account/" ;
$serveremail="support@jpcolecciones.com" ;
$register="jpc_register.php" ;
$testURL = "https://jpcolecciones.com/dev-test/account/" ;

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$database="jpc"; // Database name 

// ONLINE
// $host="localhost"; // Host name 
// $username="jpcmasteruser"; // Mysql username 
// $password="DQH&Z!lu7Vwb"; // Mysql password 
// $database="jpcmlmsystem"; // Database name 
 
($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password));
@((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . $database)) or die ("Unable to select database");

?>
