<?php
date_default_timezone_set('Asia/Manila');

$firstname = "Walter";
$middlename = "Aquino";
$lastname = "Narvasa";


// $datecode1 = date("Y", mktime(0,0,0,date("m"),date("d"),date("Y")));
// $datecode2 = date("m", mktime(0,0,0,date("m"),date("d"),date("Y")));
// $datecode3 = date("d", mktime(0,0,0,date("m"),date("d"),date("Y")));
// $datecode4 = date("h", mktime(0,0,0,date("m"),date("d"),date("Y")));
// $datecode5 = date("i", mktime(0,0,0,date("m"),date("d"),date("Y")));
// $datecode6 = date("s", mktime(0,0,0,date("m"),date("d"),date("Y")));

//$dd = date("Ymdhis", mktime(0,0,0,date("m"),date("d"),date("Y")));

// $test = $firstname[0] . $datecode1 . $firstname[1] . $datecode2 . $middlename[0] . $datecode3 . $middlename[1] . $datecode4 . $lastname[0] . $datecode5 . $lastname[1] . $datecode6;

// $datecode = date("Ymdhis", mktime(0,0,0,date("m"),date("d"),date("Y")));
// $datecode = (((intval($datecode) - 888) - 888) - 888) . mt_rand(1,9) ;

// $test = $firstname[0] . $firstname[1] . $middlename[0] . $middlename[1] . $lastname[0] . $lastname[1] . $datecode;
// $test = strtoupper($test);

$datecode = date("Ymdhis", mktime(0,0,0,date("m"),date("d"),date("Y")));
	$datecode = (((intval($datecode) - 888) - 888) - 888) . mt_rand(1,9) ;
	$memberid = $firstname[0] . $firstname[1] . $middlename[0] . $middlename[1] . $lastname[0] . $lastname[1] . $datecode;
	$memberid = strtoupper($memberid);
	$memberid1 = $memberid ;
	$memberid2 = $memberid ;
	$memberid3 = $memberid ;
	$memberid4 = $memberid ;




echo $memberid1 . "<br>";
echo $memberid2 . "<br>";
echo $memberid3 . "<br>";
echo $memberid4 . "<br>";

?>