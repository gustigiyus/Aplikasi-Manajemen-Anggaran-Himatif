<?php 
require_once "../config/config.php";

if(isset($_POST['edit'])) {
	$id = $_POST['idrec'];

	$stat_ren = trim(mysqli_real_escape_string($con, $_POST['stat']));

	mysqli_query($con, "UPDATE tb_rencana SET status = '$stat_ren' WHERE id_rencana = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
} 

?>
