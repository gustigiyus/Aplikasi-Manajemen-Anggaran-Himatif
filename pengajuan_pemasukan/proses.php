<?php 
require_once "../config/config.php";

if(isset($_POST['edit'])) {
    for ($i=0; $i<count($_POST['idket']); $i++) {
        $id = $_POST['idket'][$i];
        $sts = $_POST['status'][$i];
        mysqli_query($con, "UPDATE tb_pemasukan SET status_pem = '$sts' WHERE id_keterangan = '$id'") or die (mysqli_error($con));
    }
    echo "<script>alert('Data berhasil diedit'); window.location='data.php';</script>";
    } else {
}
?>