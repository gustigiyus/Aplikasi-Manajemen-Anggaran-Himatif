<?php 
require_once "../config/config.php";

$photo1 = move_uploaded_file($_FILES['nota1']['tmp_name'],'../../gambar/'.$_FILES['nota1']['name']);  
$photo2 = move_uploaded_file($_FILES['nota2']['tmp_name'],'../../gambar/'.$_FILES['nota2']['name']);  
$photo3 = move_uploaded_file($_FILES['nota3']['tmp_name'],'../../gambar/'.$_FILES['nota3']['name']);  
$photo4 = move_uploaded_file($_FILES['nota4']['tmp_name'],'../../gambar/'.$_FILES['nota4']['name']);  
$photo5 = move_uploaded_file($_FILES['nota5']['tmp_name'],'../../gambar/'.$_FILES['nota5']['name']);  

if(isset($_POST['add'])) {
	$renca = trim(mysqli_real_escape_string($con, $_POST['id_rencana']));
	$vitas = trim(mysqli_real_escape_string($con, $_POST['nama_aktivitas']));
	$dana_masuk = trim(mysqli_real_escape_string($con, $_POST['dana_pemasukan']));
	$dana_keluar = trim(mysqli_real_escape_string($con, $_POST['dana_pengeluaran']));
	$selisih = trim(mysqli_real_escape_string($con, $_POST['selisih']));
	$nt1 = trim(mysqli_real_escape_string($con, $_FILES['nota1']['name']));
	$nt2 = trim(mysqli_real_escape_string($con, $_FILES['nota2']['name']));
	$nt3 = trim(mysqli_real_escape_string($con, $_FILES['nota3']['name']));
	$nt4 = trim(mysqli_real_escape_string($con, $_FILES['nota4']['name']));
	$nt5 = trim(mysqli_real_escape_string($con, $_FILES['nota5']['name']));
	$ket = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
	$status = trim(mysqli_real_escape_string($con, $_POST['status']));

	mysqli_query($con, "INSERT INTO tb_penyelesaian (id_rencana_penye, nama_aktivitas, dana_pemasukan, dana_pengeluaran, selisih, nota_1, nota_2, nota_3, nota_4, nota_5, keterangan, status) VALUES ('$renca', '$vitas', '$dana_masuk', '$dana_keluar', '$selisih', '$nt1', '$nt2', '$nt3', '$nt4', '$nt5', '$ket', '$status')") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";

} else if(isset($_POST['edit'])) {
	$id = $_POST['idpenye'];

	$editrenca = trim(mysqli_real_escape_string($con, $_POST['id_rencana']));
	$vitasedit = trim(mysqli_real_escape_string($con, $_POST['nama_aktivitas']));
	$editdana_masuk = trim(mysqli_real_escape_string($con, $_POST['dana_pemasukan']));
	$editdana_keluar = trim(mysqli_real_escape_string($con, $_POST['dana_pengeluaran']));
	$editselisih = trim(mysqli_real_escape_string($con, $_POST['selisih']));
	$editnt1 = trim(mysqli_real_escape_string($con, $_FILES['nota1']['name']));
	$editnt2 = trim(mysqli_real_escape_string($con, $_FILES['nota2']['name']));
	$editnt3 = trim(mysqli_real_escape_string($con, $_FILES['nota3']['name']));
	$editnt4 = trim(mysqli_real_escape_string($con, $_FILES['nota4']['name']));
	$editnt5 = trim(mysqli_real_escape_string($con, $_FILES['nota5']['name']));
	$editket = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
	$edtstatus = trim(mysqli_real_escape_string($con, $_POST['edit_status']));

	
 	mysqli_query($con, "UPDATE tb_penyelesaian SET id_rencana_penye = '$editrenca', nama_aktivitas = '$vitasedit', dana_pemasukan = '$editdana_masuk', dana_pengeluaran = '$editdana_keluar', selisih = '$editselisih', nota_1 = '$editnt1', nota_2 = '$editnt2', nota_3 = '$editnt3', nota_4 = '$editnt4', nota_5 = '$editnt5', keterangan = '$editket', status = '$edtstatus' WHERE id_rencana_penye = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
}
?>