<?php
include "include/jpc_common.php" ;
require_once 'securimage/securimage.php';

if (isset($_POST["jpc_username"])) {
	$u = $_POST['jpc_username'];
	$u = stripslashes($u);	
} else {
	$u = "";
}	
	
if (isset($_POST["jpc_password"])) {
	$p = $_POST['jpc_password'];	
} else {
	$p = "";
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
		var u = "<?php echo $u ; ?>" ;
		var p = "<?php echo $p ; ?>" ;
		var vrjpcValidationSettings_Server = "<?php echo $serverdirectory ; ?>";

		if (status==1) {
			document.location.href = vrjpcValidationSettings_Server + 'authentication/jpc_verification.php?u=' + u + '&p=' + p  
		} else {
			document.location.href = vrjpcValidationSettings_Server 
		}
	</script>
</form>
</body>
</html>