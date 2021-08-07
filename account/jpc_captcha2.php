<?php
include "include/jpc_common.php" ;
require_once 'securimage/securimage.php';

if (isset($_POST["jpc_membershipplan"])) {
	$membershipplan =  $_POST['jpc_membershipplan'];	
} else {
	$membershipplan = "";
}	

if (isset($_POST["jpc_firstname"])) {
	$firstname =  $_POST['jpc_firstname'];	
} else {
	$firstname = "";
}	

if (isset($_POST["jpc_lastname"])) {
	$lastname =  $_POST['jpc_lastname'];	
} else {
	$lastname = "";
}	

if (isset($_POST["jpc_middlename"])) {
	$middlename =  $_POST['jpc_middlename'];	
} else {
	$middlename = "";
}

if (isset($_POST["jpc_sponsorid"])) {
	$sponsorid =  $_POST['jpc_sponsorid'];	
} else {
	$sponsorid = "";
}	

if (isset($_POST["jpc_email"])) {
	$email = trim(htmlentities(strip_tags($_POST['jpc_email'])));
	$email = stripslashes($email);	
} else {
	$email = "";
}	

if (isset($_POST["jpc_password"])) {
	$password = trim(htmlentities(strip_tags($_POST['jpc_password'])));	
} else {
	$password = "";
}	

$image = new Securimage();
if ($image->check($_POST['captcha_code']) == true) {
  $status=1;
} else {
  $status=0;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
</head>
<body>
	<script type="text/javascript">
		var status = "<?php echo $status ; ?>" ;
		var membershipplan = "<?php echo $membershipplan ; ?>" ;
		var firstname = "<?php echo $firstname ; ?>" ;
		var lastname = "<?php echo $lastname ; ?>" ;
		var middlename = "<?php echo $middlename ; ?>" ;
		var sponsorid = "<?php echo $sponsorid ; ?>" ;
		var email = "<?php echo $email ; ?>" ;
		var password = "<?php echo $password ; ?>" ;
		var vrjpcValidationSettings_Server = "<?php echo $serverdirectory ; ?>" ;
		var register = "<?php echo $register ; ?>" ;
		var testURL = "<?php echo $testURL ; ?>" ;
		if (status==1) {
			document.location.href = testURL + 'authentication/jpc_registration.php?membershipplan=' + membershipplan + '&firstname=' + firstname + '&lastname=' + lastname + '&middlename=' + middlename + '&sponsorid=' + sponsorid + '&email=' + email + '&password=' + password ;
		} else {
			alert('Incorrect captcha. Please try again.');
			setTimeout(function() {
				document.location.href = register;
			}, 1000);
		}
	</script>
</form>
</body>
</html>