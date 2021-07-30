<?php
include "include/jpc_common.php" ;

if (isset($_POST["jpc_id"])) {
	$jpc_id = $_POST['jpc_id'];	
} else {
	$jpc_id = "";
}	

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT concat(i_firstname,' ', i_middlename,' ', i_lastname) AS membername FROM jpc_members WHERE i_id = $jpc_id");
$row = mysqli_fetch_array($result);
if ($row) {		
	$membername = $row['membername'] ;	
} else {
	$membername = "" ;
}

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['jpc_photo']['tmp_name'])) {
$sourcePath = $_FILES['jpc_photo']['tmp_name'];
$targetPath = "images/photos/".$membername."-profilephoto-".$_FILES['jpc_photo']['name'];
$sourceName = $membername."-profilephoto-".$_FILES['jpc_photo']['name'];
$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_members SET i_thumbnailphoto = '$sourceName' WHERE i_id = $jpc_id");

if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img src="<?php echo $targetPath; ?>" width="200px" height="200px" class="upload-preview" />
<?php
}
}
}

