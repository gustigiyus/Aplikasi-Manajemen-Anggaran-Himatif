<?php 
require_once "../config/config.php";

if(isset($_POST['simpan'])) {

	$editpass = trim(mysqli_real_escape_string($con, $_POST['pass']));
	$editpass=md5($editpass);

	mysqli_query($con, "UPDATE login SET Password = '$editpass' WHERE Username = '$_SESSION[user]'") or die (mysqli_error($con));
	echo "<script>window.location='notifterkirim.php';</script>";
}
?>
