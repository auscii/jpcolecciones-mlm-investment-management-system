<?php
include "include/jpc_common.php" ;
require_once 'securimage/securimage.php';

if (isset($_POST["jpc_email"])) {
	$email = trim(htmlentities(strip_tags($_POST['jpc_email'])));
	$email = stripslashes($email);	
} else {
	$email = "";
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
		var email = "<?php echo $email ; ?>" ;

		var vrjpcValidationSettings_Server = "<?php echo $serverdirectory ; ?>";

		if (status==1) {
			document.location.href = vrjpcValidationSettings_Server + 'authentication/jpc_forgotpasswordverification.php?email=' + email 
		} else {
			document.location.href = vrjpcValidationSettings_Server 
		}
	</script>
</form>
</body>
</html>