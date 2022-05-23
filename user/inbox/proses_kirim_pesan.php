<?php 
require_once "../config/config.php";

if(isset($_POST['kirim_pesan'])) {
	$pengirim = trim(mysqli_real_escape_string($con, $_POST['nama_pengirim']));
	$penerima = trim(mysqli_real_escape_string($con, $_POST['nama_penerima']));
	$subjek = trim(mysqli_real_escape_string($con, $_POST['subjek_pesan']));
	$isi = trim(mysqli_real_escape_string($con, $_POST['isi_pesan']));
	$waktu = trim(mysqli_real_escape_string($con, $_POST['waktu_kirim_pesan']));


	mysqli_query($con, "INSERT INTO pesan (nama_pengirim, nama_penerima, subjek_pesan, isi_pesan, waktu_kirim) VALUES ('$pengirim', '$penerima', '$subjek', '$isi', '$waktu')") or die (mysqli_error($con));
	
	echo "<script>window.location='pesan_terkirim.php';</script>";
}