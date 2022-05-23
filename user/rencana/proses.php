<?php 
require_once "../config/config.php";

if(isset($_POST['add'])) {
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama_aktivitas']));
	$unit = trim(mysqli_real_escape_string($con, $_POST['kd_unit']));
	$tahun = trim(mysqli_real_escape_string($con, $_POST['tahun_anggaran']));
	$uraian = trim(mysqli_real_escape_string($con, $_POST['uraian_aktivitas']));
	$jenis = trim(mysqli_real_escape_string($con, $_POST['jenis_anggaran']));
	$plk = trim(mysqli_real_escape_string($con, $_POST['pelaksanaan']));
	$tmpt = trim(mysqli_real_escape_string($con, $_POST['tempat']));

	mysqli_query($con, "INSERT INTO tb_rencana (nama_aktivitas, kd_unit, tahun_anggaran, uraian_aktivitas, jenis_anggaran, pelaksanaan, tempat) VALUES ('$nama', '$unit', '$tahun', '$uraian', '$jenis', '$plk','$tmpt')") or die (mysqli_error($con));
	
	echo "<script>window.location='add2.php';</script>";

} else if(isset($_POST['add2'])) {
	$irec = trim(mysqli_real_escape_string($con, $_POST['id_rencanaDana']));
	$urpub = trim(mysqli_real_escape_string($con, $_POST['ur_pub']));
	$ttlpub = trim(mysqli_real_escape_string($con, $_POST['ttl_pub']));
	$urtrans = trim(mysqli_real_escape_string($con, $_POST['ur_tran']));
	$ttltrans = trim(mysqli_real_escape_string($con, $_POST['ttl_tran']));
	$urkons = trim(mysqli_real_escape_string($con, $_POST['ur_kons']));
	$ttlkons = trim(mysqli_real_escape_string($con, $_POST['ttl_kons']));
	$urmed = trim(mysqli_real_escape_string($con, $_POST['ur_med']));
	$ttlmed = trim(mysqli_real_escape_string($con, $_POST['ttl_med']));
	$urdll = trim(mysqli_real_escape_string($con, $_POST['ur_dll']));
	$ttldll = trim(mysqli_real_escape_string($con, $_POST['ttl_dll']));
	$ttlall = trim(mysqli_real_escape_string($con, $_POST['ttl_all']));

	mysqli_query($con, "INSERT INTO tb_rincian_dana (id_rencanaDana, uraian_pubdok, totda_pubdok, uraian_transportasi, totda_transportasi, uraian_konsumsi, totda_konsumsi, uraian_medik, totda_medik, uraian_lainnya, totda_lainnya, total_semuaBiaya) VALUES ('$irec', '$urpub', '$ttlpub', '$urtrans', '$ttltrans', '$urkons', '$ttlkons', '$urmed', '$ttlmed', '$urdll', '$ttldll', '$ttlall')") or die (mysqli_error($con));
	
	echo "<script>window.location='data.php';</script>";
	
} else if(isset($_POST['edit'])) {
	$id = $_POST['idrec'];

	$editnama = trim(mysqli_real_escape_string($con, $_POST['nama_aktivitas']));
	$edittahun = trim(mysqli_real_escape_string($con, $_POST['tahun_anggaran']));
	$edituraian = trim(mysqli_real_escape_string($con, $_POST['uraian_aktivitas']));
	$editjenis = trim(mysqli_real_escape_string($con, $_POST['jenis_anggaran']));
	$editplk = trim(mysqli_real_escape_string($con, $_POST['pelaksanaan']));
	$edittmpt = trim(mysqli_real_escape_string($con, $_POST['tempat']));
	$editsts = trim(mysqli_real_escape_string($con, $_POST['status']));

	mysqli_query($con, "UPDATE tb_rencana SET nama_aktivitas = '$editnama', tahun_anggaran = '$edittahun', uraian_aktivitas = '$edituraian', jenis_anggaran = '$editjenis', pelaksanaan = '$editplk', tempat = '$edittmpt', status = '$editsts' WHERE id_rencana = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";

} else if(isset($_POST['edit2'])) {
	$id = $_POST['idrec2'];

	$urpub = trim(mysqli_real_escape_string($con, $_POST['ur_pub']));
	$ttlpub = trim(mysqli_real_escape_string($con, $_POST['ttl_pub']));
	$urtrans = trim(mysqli_real_escape_string($con, $_POST['ur_tran']));
	$ttltrans = trim(mysqli_real_escape_string($con, $_POST['ttl_tran']));
	$urkons = trim(mysqli_real_escape_string($con, $_POST['ur_kons']));
	$ttlkons = trim(mysqli_real_escape_string($con, $_POST['ttl_kons']));
	$urmed = trim(mysqli_real_escape_string($con, $_POST['ur_med']));
	$ttlmed = trim(mysqli_real_escape_string($con, $_POST['ttl_med']));
	$urdll = trim(mysqli_real_escape_string($con, $_POST['ur_dll']));
	$ttldll = trim(mysqli_real_escape_string($con, $_POST['ttl_dll']));
	$ttlall = trim(mysqli_real_escape_string($con, $_POST['ttl_all']));

	mysqli_query($con, "UPDATE tb_rincian_dana SET uraian_pubdok = '$urpub', totda_pubdok = '$ttlpub', uraian_transportasi = '$urtrans', totda_transportasi = '$ttltrans', uraian_konsumsi = '$urkons', totda_konsumsi = '$ttlkons', uraian_medik = '$urmed', totda_medik = '$ttlmed', uraian_lainnya = '$urdll', totda_lainnya = '$ttldll', total_semuaBiaya = '$ttlall' WHERE id_rencanaDana = '$id'") or die (mysqli_error($con));
	echo "<script>window.location='data.php';</script>";

}
?>
