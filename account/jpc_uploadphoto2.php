<?php
include "include/jpc_common.php" ;

if (isset($_POST["jpc_id2"])) {
	$jpc_id2 = $_POST['jpc_id2'];	
} else {
	$jpc_id2 = "";
}	

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT concat(i_firstname,' ', i_middlename,' ', i_lastname) AS membername FROM jpc_members WHERE i_id = $jpc_id2");
$row = mysqli_fetch_array($result);
if ($row) {		
	$membername = $row['membername'] ;	
} else {
	$membername = "" ;
}

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['jpc_photo2']['tmp_name'])) {
$sourcePath = $_FILES['jpc_photo2']['tmp_name'];
$targetPath = "images/photos/".$membername."-idphoto-".$_FILES['jpc_photo2']['name'];
$sourceName = $membername."-idphoto-".$_FILES['jpc_photo2']['name'];
$sql=mysqli_query($GLOBALS["___mysqli_ston"], 
				"UPDATE jpc_members SET i_profilephoto = '$sourceName' WHERE i_id = $jpc_id2");

if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img src="<?php echo $targetPath; ?>" width="200px" height="200px" class="upload-preview" />
<?php
}
}
}

