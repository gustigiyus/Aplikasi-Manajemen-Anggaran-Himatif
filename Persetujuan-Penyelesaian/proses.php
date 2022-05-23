<?php 
require_once "../config/config.php";

if(isset($_POST['edit'])) {
	$id = $_POST['idrenca_penye'];

	$editstatus = trim(mysqli_real_escape_string($con, $_POST['status']));

	mysqli_query($con, "UPDATE tb_penyelesaian SET status = '$editstatus' WHERE id_rencana_penye = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
}
?>