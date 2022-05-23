<?php 
require_once "../config/config.php";

if(isset($_POST['add'])) {
    $count = $_POST['count'];
    for ($i=1; $i<=$count; $i++) {
        $idrenca = trim(mysqli_real_escape_string($con, $_POST['id_rencana-'.$i]));
        $ket = trim(mysqli_real_escape_string($con, $_POST['keterangan-'.$i]));
        $jml = trim(mysqli_real_escape_string($con, $_POST['jumlah-'.$i]));
        $harga = trim(mysqli_real_escape_string($con, $_POST['harga-'.$i]));
        $total = trim(mysqli_real_escape_string($con, $_POST['total-'.$i]));
        $stat = trim(mysqli_real_escape_string($con, $_POST['status-'.$i]));

        $sql = mysqli_query($con, "INSERT INTO tb_pemasukan (id_rencana_pem, keterangan, jumlah, harga, total, status_pem) VALUES ('$idrenca', '$ket', '$jml', '$harga', '$total', '$stat')") or die (mysqli_error($con));
    }
    if ($sql) {
        echo "<script>alert('".$count." data berhasil ditambahkan'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan, coba lagi'); window.location='generate.php';</script>";
    }

} else if(isset($_POST['edit'])) {
    for ($i=0; $i<count($_POST['idket']); $i++) {
        $id = $_POST['idket'][$i];
        $idrenca = $_POST['id_rencana'][$i];
        $ket = $_POST['keterangan'][$i];
        $jml = $_POST['jumlah'][$i];
        $harga = $_POST['harga'][$i];
        $total = $_POST['total'][$i];
        $stat = $_POST['status'][$i];
        mysqli_query($con, "UPDATE tb_pemasukan SET id_rencana_pem = '$idrenca', keterangan = '$ket', jumlah = '$jml', harga = '$harga', total = '$total', status_pem = '$stat' WHERE id_keterangan = '$id'") or die (mysqli_error($con));
    }
    echo "<script>alert('Data berhasil diedit'); window.location='data.php';</script>";
    } else {
}
?>