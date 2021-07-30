<?php
include "include/jpc_common.php" ;

if (isset($_POST["jpc_id3"])) {
	$jpc_id3 = $_POST['jpc_id3'];	
} else {
	$jpc_id3 = "";
}	

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT concat(i_firstname,' ', i_middlename,' ', i_lastname) AS membername FROM jpc_members WHERE i_id = $jpc_id3");
$row = mysqli_fetch_array($result);
if ($row) {		
	$membername = $row['membername'] ;	
} else {
	$membername = "" ;
}

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['jpc_photo3']['tmp_name'])) {
$sourcePath = $_FILES['jpc_photo3']['tmp_name'];
$targetPath = "images/photos/".$membername."-invoicephoto-".$_FILES['jpc_photo3']['name'];
$sourceName = $membername."-invoicephoto-".$_FILES['jpc_photo3']['name'];

$sql=mysqli_query($GLOBALS["___mysqli_ston"],  
				"UPDATE jpc_members SET i_invoicephoto = '$sourceName' WHERE i_id = $jpc_id3");

if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img src="<?php echo $targetPath; ?>" width="200px" height="200px" class="upload-preview" />
<?php
}
}
}

