<?php 
require_once "../config/config.php";

if(isset($_POST['add'])) {
	$kode = trim(mysqli_real_escape_string($con, $_POST['kode_unit']));
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama_unit']));

	mysqli_query($con, "INSERT INTO tb_unit (kd_unit, nama_unit) VALUES ('$kode', '$nama')") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
	$id = $_POST['id'];

	$editkode = trim(mysqli_real_escape_string($con, $_POST['kode_unit']));
	$editnama = trim(mysqli_real_escape_string($con, $_POST['nama_unit']));

	mysqli_query($con, "UPDATE tb_unit SET kd_unit = '$editkode', nama_unit = '$editnama' WHERE kd_unit = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
}
?>