<?php 
require_once "../config/config.php";

if(isset($_POST['add'])) {
    $count = $_POST['count'];
    for ($i=1; $i<=$count; $i++) {
        $idrenca = trim(mysqli_real_escape_string($con, $_POST['id_rencana-'.$i]));
        $jnsket = trim(mysqli_real_escape_string($con, $_POST['jenis_pengeluaran-'.$i]));
        $ket = trim(mysqli_real_escape_string($con, $_POST['keterangan-'.$i]));
        $jmlunt = trim(mysqli_real_escape_string($con, $_POST['jumlahunit-'.$i]));
        $hrgsat = trim(mysqli_real_escape_string($con, $_POST['hargasatuan-'.$i]));
        $ttlpeng = trim(mysqli_real_escape_string($con, $_POST['total-'.$i]));
        $stat = trim(mysqli_real_escape_string($con, $_POST['status-'.$i]));

        $sql = mysqli_query($con, "INSERT INTO tb_pengeluaran (id_rencana_kel, jenis_pengeluaran, keterangan_kel, jumlah_unit, harga_satuan, total_kel, status_kel) VALUES ('$idrenca', '$jnsket', '$ket', '$jmlunt', '$hrgsat', '$ttlpeng', '$stat')") or die (mysqli_error($con));
    }
    if ($sql) {
        echo "<script>alert('".$count." data berhasil ditambahkan'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan, coba lagi'); window.location='generate.php';</script>";
    }

} else if(isset($_POST['edit'])) {
    for ($i=0; $i<count($_POST['idpeng']); $i++) {
        $id = $_POST['idpeng'][$i];
        $idrenca = $_POST['id_rencana'][$i];
        $jnspeng = $_POST['jenis_pengeluaran'][$i];
        $ket = $_POST['keterangan'][$i];
        $jmlunt = $_POST['jmlunt'][$i];
        $hrgsat = $_POST['hrgsat'][$i];
        $ttlpeng = $_POST['ttlpeng'][$i];
        $sts = $_POST['status'][$i];
        mysqli_query($con, "UPDATE tb_pengeluaran SET id_rencana_kel = '$idrenca', jenis_pengeluaran = '$jnspeng', keterangan_kel = '$ket', jumlah_unit = '$jmlunt', harga_satuan = '$hrgsat', total_kel = '$ttlpeng', status_kel = '$sts'  WHERE id_pengeluaran = '$id'") or die (mysqli_error($con));
    }
    echo "<script>alert('Data berhasil diedit'); window.location='data.php';</script>";
    } else {
}
?>