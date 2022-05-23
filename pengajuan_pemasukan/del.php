<?php 

require_once "../config/config.php";

$chk = @$_POST['checked'];
if(!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='action.php';</script>";
} else {
    foreach($chk as $id) {
        $sql = mysqli_query($con, "DELETE FROM tb_pemasukan WHERE id_keterangan = '$id'") or die (mysqli_error($con));
    }
    
    if ($sql) {
        echo "<script>alert('".count($chk)." data berhasil dihapus'); window.location='action.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus, silahkan coba lagi');</script>";
    }
}
?>