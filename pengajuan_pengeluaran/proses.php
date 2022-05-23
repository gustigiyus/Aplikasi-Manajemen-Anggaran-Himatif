<?php 
require_once "../config/config.php";

if(isset($_POST['edit'])) {
    for ($i=0; $i<count($_POST['idpeng']); $i++) {
        $id = $_POST['idpeng'][$i];
        $sts = $_POST['status'][$i];
        mysqli_query($con, "UPDATE tb_pengeluaran SET id_pengeluaran = '$id', status_kel = '$sts' WHERE id_pengeluaran = '$id'") or die (mysqli_error($con));
    }
    echo "<script>alert('Data berhasil diedit'); window.location='data.php';</script>";
    } else {
}
?>