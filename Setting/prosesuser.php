<?php 
require_once "../config/config.php";

if(isset($_POST['add'])) {
	$user = trim(mysqli_real_escape_string($con, $_POST['user']));
	$email = trim(mysqli_real_escape_string($con, $_POST['email']));
	$pass = trim(mysqli_real_escape_string($con, $_POST['pass']));
	$pass=md5($pass);           
	$level = trim(mysqli_real_escape_string($con, $_POST['level']));
	$unit = trim(mysqli_real_escape_string($con, $_POST['unit']));
	$status = trim(mysqli_real_escape_string($con, $_POST['status']));

	mysqli_query($con, "INSERT INTO login (Username, email, Password, level, unit, status) VALUES ('$user', '$email', '$pass', '$level', '$unit', '$status')") or die (mysqli_error($con));
	echo "<script>window.location='settinguser.php';</script>";

} else if(isset($_POST['simpan'])) {
	$id = $_POST['id'];

	$edituser= trim(mysqli_real_escape_string($con, $_POST['user']));
	$editpass = trim(mysqli_real_escape_string($con, $_POST['pass']));

	mysqli_query($con, "UPDATE login SET Username = '$edituser', Password = '$editpass' WHERE Username = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='settinguser.php';</script>";

} else if(isset($_POST['reset'])) {
 	$id = $_GET['id'];

	$pass = trim(mysqli_real_escape_string($con, $_POST['pass']));
	$pass="poltekpos";
	$pass=md5($pass);
	
	mysqli_query($con, "UPDATE login SET Password = '$pass' WHERE unit = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='settinguser.php';</script>";
	
}
?>